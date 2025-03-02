<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DocumentNameController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Middleware\RolePermissionMiddleware;


Route::middleware(['check.auth'])->controller(CalendarController::class)->group(function () {
    Route::get('calendar', 'index')->name('calendar'); 
});

Route::middleware(['check.auth'])->controller(CompanyController::class)->group(function () {
    Route::get('general-settings', 'index')->name('general-settings'); 
    Route::get('help', 'help')->name('help'); 
    Route::post('updated-company-profile', 'updateCompanyProfile')->name('updated-company-profile');
});

Route::middleware(['check.auth'])->controller(CredentialController::class)->group(function () {
    Route::get('credentials', 'index')->name('credentials.index'); 
    Route::post('credentials', 'store')->name('credentials.store');
    Route::put('credentials/{id}', 'update')->name('credentials.update');
    Route::delete('credentials/{id}', 'destroy')->name('credentials.destroy');
});

Route::controller(CronJobController::class)->group(function () {
    Route::get('expiry-document-reminder', 'expiryDocumentReminder')->name('expiry-document-reminder');                                  // Run each 1st date of the month
    Route::get('notes-reminder', 'notesReminder')->name('notes-reminder');                                                               // Run daily
    Route::get('make-transactions-archive', 'makeTransactionsArchive')->name('make-transactions-archive');                               // Run after 60 days
    Route::get('make-orders-archive', 'makeOrdersArchive')->name('make-orders-archive');                                                 // Run after 60 days
    Route::get('delete-softdelete-orders', 'deleteSoftdeleteOrders')->name('delete-softdelete-orders');                                  // Run after 60 days
    Route::get('receive-today-transactions-history', 'receiveTodayTransactionsHistory')->name('receive-today-transactions-history');     // Run each day at 11:00 PM
    Route::get('delete-activities-log', 'deleteActivitiesLog')->name('delete-activities-log');                                           // Run each Month
});

Route::middleware(['check.auth'])->controller(DocumentNameController::class)->group(function () {
    Route::get('document-names', 'index')->name('document-names');
    Route::post('document-name', 'store')->name('document-name.store');
    Route::put('document-name/toggle/{id}', 'toggle')->name('document-name.toggle');
    Route::get('document-name/{id}/edit', 'edit')->name('document-name.edit');
    Route::put('document-name/{id}', 'update')->name('document-name.update');
    Route::delete('document-name/{id}', 'destroy')->name('document-name.destroy');
});

Route::middleware(['check.auth'])->controller(DocumentController::class)->group(function () {
    Route::get('documents', 'index')->name('documents');
    Route::post('documents/store', 'store')->name('documents.store');
    Route::delete('documents/{id}', 'destroy')->name('documents.destroy');
    Route::get('/documents/download/{id}', 'download')->name('documents.download');
});

Route::middleware(['check.auth'])->controller(EmailTemplateController::class)->group(function () {
    Route::get('email-templates', 'index')->name('email-templates'); 
    Route::post('/email-templates/store', 'store')->name('email-templates/store');
    Route::delete('/email-templates/{id}', 'destroy')->name('email-templates.destroy');
    Route::put('/email-templates/{id}', 'update')->name('email-templates.update');
    Route::get('/email-templates/{id}/edit', 'edit')->name('email-templates.edit');
});

Route::middleware(['check.auth'])->controller(ExpenseController::class)->group(function () {
    Route::get('expenses', 'index')->name('expenses');
    Route::post('expenses/store', 'store')->name('expenses.store');
    Route::delete('expenses/{expense}', 'destroy')->name('expenses.destroy');
    Route::get('expenses/{expense}/download', 'downloadFile')->name('expenses.download');
});

Route::middleware(['check.auth'])->controller(ExcelController::class)->group(function () {
    Route::get('transactions/download', 'downloadTransactions')->name('transactions.download'); 
    Route::get('expenses/download', 'downloadExpenses')->name('expenses.download'); 
});

Route::middleware(['check.auth'])->controller(GuideController::class)->group(function () {
    Route::get('guides', 'index')->name('guides');
    Route::get('guides/{id}', 'show')->name('guides.show');
    Route::post('guides', 'store')->name('guides.store');
    Route::put('guides/{id}', 'update')->name('guides.update');
    Route::delete('guides/{id}', 'destroy')->name('guides.destroy');
});

Route::middleware(['check.auth'])->controller(IndexController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::middleware(['check.auth'])->controller(NotesController::class)->group(function () {
    Route::get('notes', 'index')->name('notes');
    Route::post('note', 'store')->name('add-note');
    Route::get('notes/{id}/edit', 'edit');
    Route::put('notes/{id}', 'update');
    Route::delete('notes/{id}', 'destroy');
});

Route::middleware(['check.auth'])->controller(OrderController::class)->group(function () {
    Route::get('orders', 'showOrders')->name('orders');
    Route::get('customer-profile/{id}', 'customerProfile')->name('customer-profile');
    Route::post('orders/store', 'storeOrder')->name('orders.store'); 
    Route::delete('/orders/{id}', 'destroy')->name('orders.destroy');
    Route::get('/orders/{id}/download', 'downloadFiles')->name('orders.download');
    Route::get('/orders/{orderId}/services', 'getOrderServices')->name('orders.services');
    Route::get('/orders/{id}/edit','edit')->name('orders.edit');
    Route::put('/orders/{id}', 'update')->name('orders.update');
    Route::get('archived-orders', 'archivedOrders')->name('archived-orders');
    Route::get('all-notifications', 'allNotifications')->name('all-notifications');
    Route::post('clear-all-notifications', 'clearAllNotifications')->name('clear-all-notifications');
    Route::delete('notifications/{id}', 'deleteNotification')->name('notification.delete');
    Route::get('/export-archived-orders/{tableName}', 'exportArchivedOrders')->name('export.archived.orders');
    Route::post('delete-archived-orders-table', 'deleteArchivedOrdersTable')->name('delete-archived-orders-table');
    Route::get('/search-customers', 'searchCustomers')->name('search-customers');
});

Route::middleware(['check.auth'])->controller(PdfController::class)->group(function () {
    Route::get('invoice/download/{order_id}', 'downloadInvoice')->name('invoice.download');
});

Route::middleware(['check.auth'])->controller(ReminderController::class)->group(function () {
    Route::get('reminders', 'index')->name('reminders'); 
    Route::post('update-reminders', 'updateReminders')->name('update-reminders'); 
});

Route::middleware(['check.auth'])->controller(ServiceController::class)->group(function () {
    Route::get('services', 'index')->name('services'); 
    Route::post('service-store', 'store')->name('service-store');
    Route::delete('services/{id}', 'destroy')->name('services.destroy');
    Route::put('services/{id}', 'update')->name('services.update');
    Route::get('services/{id}/edit', 'edit')->name('services.edit');
    Route::get('/services/{serviceId}/costs', 'getServiceCosts')->name('services.costs');
});

Route::middleware(['check.auth'])->controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index')->name('tasks.index'); 
    Route::post('task', 'store')->name('task.store');
    Route::put('task/{id}', 'update')->name('task.update');
    Route::delete('task/{id}', 'destroy')->name('task.destroy');
});

Route::middleware(['check.auth'])->controller(TicketController::class)->group(function () {
    Route::get('tickets', 'index')->name('tickets'); 
    Route::post('add-tickets', 'addTicket')->name('add-ticket'); 
    Route::get('tickets/{id}/edit', 'edit')->name('edit-ticket'); 
    Route::post('update-ticket', 'updateTicket')->name('update-ticket'); 
    Route::delete('tickets/{id}', 'destroy')->name('delete-ticket'); 
    Route::get('show-tickets/{id}', 'showTicket')->name('show-tickets'); 
});

Route::middleware(['check.auth'])->controller(TransactionController::class)->group(function () {
    Route::get('transactions', 'index')->name('transactions'); 
    Route::post('/transactions/store', 'store')->name('transactions.store');
    Route::delete('/transactions/{id}', 'destroy')->name('transactions.destroy');
    Route::get('/transaction/receipt/{id}', 'downloadReceipt')->name('transaction.receipt');
    Route::get('archived-transactions', 'archivedTransactions')->name('archived-transactions');
    Route::get('invoices', 'showInvoices')->name('invoices');
    Route::get('invoice-templates', 'invoiceTemplates')->name('invoice-templates');
    Route::post('/set-active-template', 'setActiveTemplate')->name('set-active-template');
    Route::post('/transaction/update-status/{id}', 'updateStatus')->name('transaction.updateStatus');
    Route::get('/transactions/{id}/edit', 'edit')->name('transactions.edit');
    Route::post('/transactions/{id}/update', 'update')->name('transactions.update');
    Route::get('/export-archived-transactions/{tableName}', 'exportArchivedTransactions')->name('export.archived.transactions');
    Route::post('delete-archived-transactions-table', 'deleteArchivedTransactionsTable')->name('delete-archived-transactions-table');
    Route::post('/invoices/mark-paid/{id}', 'markAsPaid');
});

Route::controller(UserController::class)->group(function () {
    Route::get('login', 'showLoginPage')->name('login');
    Route::get('new-password', 'showChangePasswordPage')->name('new-password');
    Route::get('forgot-password', 'showForgotPasswordPage')->name('forgot-password');
    Route::post('login-attempt', 'handleLogin')->name('login-attempt');
    Route::post('change-password', 'handlePasswordChange')->name('change-password');
    Route::post('change-user-settings', 'changeUserSettings')->name('change-user-settings');
    Route::post('add-role-permission', 'addRolePermission')->name('add-role-permission');
    Route::get('role-permission', 'showRolePermission')->name('role-permission');
    Route::get('/edit-access-level', 'viewEditAccessLevel')->name('edit-access-level');
    Route::post('/update-user-role/{id}', 'updateUserRole')->name('update-user-role');
    Route::get('login-activities', 'loginActivities')->name('login-activities');
    Route::get('log-activities', 'logActivities')->name('log-activities');
    Route::get('logout', 'logout')->name('logout');
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'handlePasswordReset')->name('password.update'); 
    Route::get('manage-users', 'showManageUsers')->name('manage-users'); 
    Route::post('store-user', 'storeUser')->name('store-user'); 
    Route::delete('delete-role-permission/{role}', 'deleteRolePermission')->name('delete-role-permission');
    Route::put('update-role-permissions/{roleId}', 'updateRolePermissions')->name('update-role-permissions');
    Route::get('/get-role-permissions/{role}', 'getRolePermissions')->name('get-role-permissions');
    Route::delete('login-activity/{id}', 'deleteLoginActivity')->name('login-activity/{id}');
    Route::get('/users/{id}/edit','edit')->name('users.edit');
    Route::post('/users/{id}', 'update')->name('users.update');
    Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    Route::delete('deleteMultipleLoginActivities', 'deleteMultipleLoginActivities')->name('deleteMultipleLoginActivities');
});

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('website-setup', 'websiteSetup')->name('website-setup');
    Route::post('/website-setup/update', 'updateWebsiteSetup')->name('website-setup.update');
    Route::get('customer-send-email', 'customerSendEmail')->name('customer-send-email');
});

Route::fallback(function () {
    return redirect()->route('page-not-found');
});

Route::get('page-not-found', function () {
    return view('errors.error-404');
})->name('page-not-found');


Route::get('display-me-logs', function () {
    $logFile = storage_path('logs/laravel.log');
    $logs = file_exists($logFile) ? file_get_contents($logFile) : 'Log file not found.';
    return view('errors.logs', compact('logs'));
})->name('display-me-logs');


Route::post('clear-logs', function () {
    try {
        $logFile = storage_path('logs/laravel.log');
        file_put_contents($logFile, '');
        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error'], 500);
    }
})->name('clear-logs');
