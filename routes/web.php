<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ApplicationFlowController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DocumentNameController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\RolePermissionMiddleware;

Route::controller(IndexController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('services', 'index')->name('services'); 
    Route::post('service-store', 'store')->name('service-store');
    Route::delete('services/{id}', 'destroy')->name('services.destroy');
    Route::put('services/{id}', 'update')->name('services.update');
    Route::get('services/{id}/edit', 'edit')->name('services.edit');
});


Route::controller(ReminderController::class)->group(function () {
    Route::get('reminders', 'index')->name('reminders'); 
    Route::post('update-reminders', 'updateReminders')->name('update-reminders'); 
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
});

Route::controller(TransactionController::class)->group(function () {
    Route::get('transaction-history', 'showTransactionHistory')->name('transaction-history'); 
    Route::post('applications', 'store')->name('applications.store');
    Route::put('applications/{id}', 'update')->name('applications.update');
    Route::delete('applications/{id}', 'destroy')->name('applications.destroy');
    Route::get('archived-transactions', 'archivedTransactions')->name('archived-transactions');
    Route::get('invoices', 'showInvoices')->name('invoices');
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('general-settings', 'index')->name('general-settings'); 
    Route::post('updated-company-profile', 'updateCompanyProfile')->name('updated-company-profile');
});

Route::controller(TicketController::class)->group(function () {
    Route::get('tickets', 'index')->name('tickets'); 
    Route::post('add-tickets', 'addTicket')->name('add-ticket'); 
    Route::get('tickets/{id}/edit', 'edit')->name('edit-ticket'); 
    Route::post('update-ticket', 'updateTicket')->name('update-ticket'); 
    Route::delete('tickets/{id}', 'destroy')->name('delete-ticket'); 
    Route::get('show-tickets/{id}', 'showTicket')->name('show-tickets'); 
});

Route::controller(OrderController::class)->group(function () {
    Route::get('orders', 'showOrders')->name('orders'); 
});

Route::controller(ExpenseController::class)->group(function () {
    Route::get('expenses', 'index')->name('expenses');
    Route::post('expenses/store', 'store')->name('expenses.store');
    Route::delete('expenses/{expense}', 'destroy')->name('expenses.destroy');
    Route::get('expenses/{expense}/download', 'downloadFile')->name('expenses.download');
});


Route::controller(CredentialController::class)->group(function () {
    Route::get('credentials', 'index')->name('credentials.index'); 
    Route::post('credentials', 'store')->name('credentials.store');
    Route::put('credentials/{id}', 'update')->name('credentials.update');
    Route::delete('credentials/{id}', 'destroy')->name('credentials.destroy');
});


Route::controller(GuideController::class)->group(function () {
    Route::get('guides', 'index')->name('guides');
    Route::get('guides/{id}', 'show')->name('guides.show');
    Route::post('guides', 'store')->name('guides.store');
    Route::put('guides/{id}', 'update')->name('guides.update');
    Route::delete('guides/{id}', 'destroy')->name('guides.destroy');
});


Route::controller(EmailTemplateController::class)->group(function () {
    Route::get('email-templates', 'index')->name('email-templates'); 
    Route::post('guide', 'store')->name('guide.store');
    Route::put('guide/{id}', 'update')->name('guide.update');
    Route::delete('guide/{id}', 'destroy')->name('guide.destroy');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('tasks', 'index')->name('tasks.index'); 
    Route::post('task', 'store')->name('task.store');
    Route::put('task/{id}', 'update')->name('task.update');
    Route::delete('task/{id}', 'destroy')->name('task.destroy');
});

Route::controller(ExcelController::class)->group(function () {
    Route::get('download-expenses-excel', 'downloadExpensesExcel')->name('download-expenses-excel'); 
    Route::get('download-applications-excel', 'downloadApplicationsExcel')->name('download-applications-excel'); 
});

Route::controller(PdfController::class)->group(function () {
    Route::get('download-expenses-pdf', 'downloadExpensesPdf')->name('download-expenses-pdf'); 
    Route::get('download-applications-pdf', 'downloadApplicationsPdf')->name('download-applications-pdf'); 
});

Route::controller(NotesController::class)->group(function () {
    Route::get('notes', 'index')->name('notes');
    Route::post('note', 'store')->name('add-note');
    Route::get('notes/{id}/edit', 'edit');
    Route::put('notes/{id}', 'update');
    Route::delete('notes/{id}', 'destroy');
});


Route::controller(DocumentNameController::class)->group(function () {
    Route::get('document-names', 'index')->name('document-names');
    Route::post('document-name', 'store')->name('document-name.store');
    Route::put('document-name/toggle/{id}', 'toggle')->name('document-name.toggle');
    Route::get('document-name/{id}/edit', 'edit')->name('document-name.edit');
    Route::put('document-name/{id}', 'update')->name('document-name.update');
    Route::delete('document-name/{id}', 'destroy')->name('document-name.destroy');
});

Route::controller(DocumentsController::class)->group(function () {
    Route::get('documents', 'index')->name('documents');
    Route::post('documents/store', 'store')->name('documents.store');
    Route::delete('documents/{id}', 'destroy')->name('documents.destroy');
});


Route::controller(CalendarController::class)->group(function () {
    Route::get('calendar', 'index')->name('calendar'); 
});

Route::controller(AssetController::class)->group(function () {
    Route::get('assets', 'index')->name('assets'); 
});

Route::controller(ApplicationFlowController::class)->group(function () {
    Route::get('applications-flow', 'index')->name('applications-flow');
    Route::post('applications-parent', 'storeParent')->name('applications-parent.store');
    Route::post('applications-child', 'storeChild')->name('applications-child.store');
    Route::put('applications-parent/{id}', 'updateParent')->name('applications-parent.update');
    Route::put('applications-child/{id}', 'updateChild')->name('applications-child.update');
    Route::delete('applications-child/{id}', 'destroyChild')->name('applications-child.destroy');
});

Route::controller(CronJobController::class)->group(function () {
    Route::put('expiry-document-reminder', 'expiryDocumentReminder')->name('expiry-document-reminder');
    Route::put('application-follow-up-reminder', 'applicationFollowUpReminder')->name('application-follow-up-reminder');
});


