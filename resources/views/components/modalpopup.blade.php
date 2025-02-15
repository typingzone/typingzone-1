@if(Route::is(['documents']))
<div class="modal fade modal-default pos-modal add-document-modalx" id="add-document-modal" aria-labelledby="upload-file">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5>Upload File</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label for="documentName">Select File *</label>
                    <input type="file" class="form-control" id="fileInput" name="fileInput" required>
                </div>
                <div class="mb-3">
                    <label for="documentName">Document Name *</label>
                    <select class="mySelect2 form-control" id="documentName" name="documentName" required>
                        @php $documentNames = \App\Models\DocumentName::all(); @endphp
                        @foreach($documentNames as $documentName)
                            <option value="{{ $documentName->id }}">{{ $documentName->document_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="expiryDate">Expiry Date</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiryDate">
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif






@if(Route::is(['role-permission']))
<div class="modal fade" id="add-role-permission-modal" tabindex="-1" aria-labelledby="add-role-permission-modal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add-role-permission-modal">Create Role & Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('add-role-permission') }}" method="POST"> @csrf <div class="mb-4">
            <label for="roleName" class="form-label">Role Name <em data-bs-toggle="tooltip" data-bs-placement="top" title="A role represents a set of permissions and responsibilities assigned to users within the system.">
                <i class="fa fa-info-circle text-info"></i>
              </em>
            </label>
            <input type="text" class="form-control" maxlength="35" placeholder="Enter role name i.e: Writer, Manager, Supervisor ..." id="roleName" name="roleName" required>
          </div>
          <table class="table table-striped table-hover table-sm">
            <thead>
              <tr>
                <th>
                  <input type="checkbox" id="select-all"> Select All
                </th>
                <th>
                  <input type="checkbox" id="select-all-view" data-action="view"> View
                </th>
                <th>
                  <input type="checkbox" id="select-all-add" data-action="add"> Add
                </th>
                <th>
                  <input type="checkbox" id="select-all-edit" data-action="edit"> Edit
                </th>
                <th>
                  <input type="checkbox" id="select-all-delete" data-action="delete"> Delete
                </th>
                <th>
                  <input type="checkbox" id="select-all-download" data-action="download"> Download
                </th>
              </tr>
            </thead>
            <tbody> @foreach (['Expiry Documents', 'Calendar', 'Transaction Types', 'Transaction History', 'Archived Transactions', 'Invoices', 'Documents', 'Document Names', 'Orders', 'Tools', 'Color Picker', 'Invoice Templates', 'Manage Users', 'Roles & Permissions', 'General Settings', 'Notification Preferences', 'Guide', 'Email Template', 'Reminders', 'Office Assets', 'Login Activities'] as $page) <tr>
                <td>
                  <input type="checkbox" class="page-select" data-page="{{ $page }}"> {{ $page }}
                </td>
                <td>
                  <input type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" title="View" name="permissions[{{ $page }}][]" value="{{ $page }} view" class="page-checkbox view-checkbox">
                </td>
                <td>
                  <input type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" name="permissions[{{ $page }}][]" value="{{ $page }} add" class="page-checkbox add-checkbox">
                </td>
                <td>
                  <input type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" name="permissions[{{ $page }}][]" value="{{ $page }} edit" class="page-checkbox edit-checkbox">
                </td>
                <td>
                  <input type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" name="permissions[{{ $page }}][]" value="{{ $page }} delete" class="page-checkbox delete-checkbox">
                </td>
                <td>
                  <input type="checkbox" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" name="permissions[{{ $page }}][]" value="{{ $page }} download" class="page-checkbox download-checkbox">
                </td>
              </tr> @endforeach </tbody>
          </table>
          <div class="d-grid gap-2">
            <br>
            <br>
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
@endif



@if(Route::is(['role-permission']))
<div class="modal fade" id="edit-role-permission-modal" tabindex="-1" aria-labelledby="edit-role-permission-modal" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-role-permission-modal">Edit Role & Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  	<form id="edit-role-permission-form" action="{{ route('update-role-permissions', ['roleId' => '1']) }}" method="POST">
		  @csrf 
          @method('PUT')
          <input type="hidden" name="roleId" id="editRoleId">
          <div class="mb-4">
            <label for="editRoleName" class="form-label">Role Name</label>
            <input type="text" class="form-control" maxlength="35" name="roleName" id="editRoleName" required>
          </div>

          <table class="table table-striped table-hover table-sm">
            <thead>
              <tr>
                <th><input type="checkbox" id="edit-select-all"> Select All</th>
                <th>View</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Download</th>
              </tr>
            </thead>
            <tbody id="edit-permissions-body">
              <!-- Permissions checkboxes will be dynamically inserted here -->
            </tbody>
          </table>

          <div class="d-grid gap-2">
            <button type="submit" id="updateRolePermission" class="btn btn-primary btn-lg">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endif






@if(Route::is(['manage-users']))
<div class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Select Profile Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store-user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="profileImage" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" id="profileImage" name="profile_photo" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter email address" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select class="mySelect2 form-control" id="role" name="role_id" required>
                            <option value="">Select Role</option>
                            @php 
                                $roles = DB::table('roles')->get();
                            @endphp
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" id="edit-user-id">
                    <div class="mb-3">
                        <label for="editProfileImage" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" id="editProfileImage" name="profile_photo">
                    </div>
                    <div class="mb-3">
                        <label for="editUsername" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="editUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editRole" class="form-label">Select Role</label>
                        <select class="form-select" id="editRole" name="role_id" required>
                            <option value="">Select Role</option>
                            @php 
                                $roles = DB::table('roles')->get();
                            @endphp
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif




@if(Route::is(['tickets']))
<div class="modal fade" id="add-ticket-modal" tabindex="-1" aria-labelledby="add-ticket-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-ticket-modal">Add New Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add-ticket') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">Ticket Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit-ticket-modal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
			<form id="edit-ticket-form" action="{{ route('update-ticket') }}" method="POST">
				@csrf
                    <input type="hidden" name="ticket_id" id="ticket_id">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-ticket-modal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewTicketModalLabel">Ticket Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Description:</strong> <span id="ticket-description"></span></p>
                <p><strong>Date:</strong> <span id="ticket-date"></span></p>
            </div>
        </div>
    </div>
</div>
@endif

@if(Route::is(['notes']))
<div class="modal fade" id="add-note-modal" tabindex="-1" aria-labelledby="add-note-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-note-modal">Add New Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add-note') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Note Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title for your note">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note Description</label>
                        <textarea name="note" id="note" class="form-control" rows="3" placeholder="Enter the content of your note"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="reminder_date" class="form-label">Reminder Date</label>
                        <input type="date" name="reminder_date" id="reminder_date" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-note-modal" tabindex="-1" aria-labelledby="edit-note-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-note-modal-label">Edit Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-note-form">
                    @csrf
                    <input type="hidden" id="edit-note-id">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="editTitle" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="edit-note-body" class="form-label">Note Body</label>
                        <textarea class="form-control" id="edit-note-body" rows="3" name="editNote" placeholder="Enter your note"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-reminder-date" class="form-label">Reminder Date</label>
                        <input type="date" class="form-control" name="editReminder_date" id="edit-reminder-date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@if(Route::is(['guides']))
<!-- Add Guide Modal -->
<div class="modal fade" id="add-guide-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Guide</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="add-guide-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter the title of the guide" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="Enter the description of the guide" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Guide Modal -->
<div class="modal fade" id="edit-guide-modal" tabindex="-1" aria-labelledby="edit-guide-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-guide-modalLabel">Edit Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-guide-form">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter the new title of the guide" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter the new description of the guide" required></textarea>
                    </div>
                    <input type="hidden" name="id" id="guide-id">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


@if(Route::is(['document-names']))
<!-- Add Document Name Modal -->
<div class="modal fade" id="add-document-name-modal" tabindex="-1" role="dialog" aria-labelledby="add-document-name-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-document-name-modalLabel">Add Document Name</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form id="add-document-name-form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" name="document_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Expiry Reminder</label>
                            <select name="expiry_reminder" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Document Name Modal -->
<div class="modal fade" id="edit-document-name-modal" tabindex="-1" role="dialog" aria-labelledby="edit-document-name-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-document-name-modal-label">Edit Document Name</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-document-name-form">
                    @csrf
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="document_name">Document Name</label>
                        <input type="text" class="form-control" id="document_name" name="document_name" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


@if(Route::is(['expenses']))
<div class="modal fade" id="add-expense-modal" tabindex="-1" role="dialog" aria-labelledby="add-expense-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-expense-modal-label">Add Expense</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-expense-modal-form">
                    @csrf
                    <input type="hidden" name="id" value="">

                    <div class="form-group mb-3">
                        <label for="name">Expense Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter expense name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="vat">VAT</label>
                        <select class="form-control" id="vat" name="vat" required>
                            <option value="0">Not Applicable</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="amount">Amount *</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" placeholder="Enter amount" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif


@if(Route::is(['services']))
<div class="modal fade" id="add-service-modal" tabindex="-1" role="dialog" aria-labelledby="add-service-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-service-modal-label">Add Service</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-service-modal-form">
                    @csrf
                    <input type="hidden" name="id" value="">

                    <div class="form-group mb-3">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Enter service name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="govt_cost">Govt Cost</label>
                        <input type="number" class="form-control" id="govt_cost" name="govt_cost" step="0.01" placeholder="Enter amount" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="service_cost">Service Cost</label>
                        <input type="number" class="form-control" id="service_cost" name="service_cost" step="0.01" placeholder="Enter service cost" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-service-modal" tabindex="-1" role="dialog" aria-labelledby="edit-service-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-service-modal-label">Edit Service</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-service-modal-form">
                        @csrf
                        <input type="hidden" name="id" id="edit-service-id">

                        <div class="form-group mb-3">
                            <label for="edit-service-name">Service Name</label>
                            <input type="text" class="form-control" id="edit-service-name" name="service_name" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit-govt-cost">Govt Cost</label>
                            <input type="number" class="form-control" id="edit-govt-cost" name="govt_cost" step="0.01" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit-service-cost">Service Fee</label>
                            <input type="number" class="form-control" id="edit-service-cost" name="service_cost" step="0.01" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endif




@if(Route::is(['orders']))
<div class="modal fade" id="add-order-modal" tabindex="-1" role="dialog" aria-labelledby="add-order-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-order-modal-label">Add New Order</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-order-modal-form" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="customer_name" class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter customer name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="services" class="form-label">Services *</label>
                                @php $services = \App\Models\Service::all(); @endphp
                                <select class="mySelect3 form-control" id="services" name="services[]" multiple required>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="files" class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="files" name="files[]" multiple>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="assign_to" class="form-label">Assign To *</label>
                                <select class="mySelect2 form-control" id="assign_to" name="assign_to" required>
                                    @php $users = \App\Models\User::all(); @endphp
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-order-modal" tabindex="-1" role="dialog" aria-labelledby="edit-order-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-order-modal-label">Edit Order</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-order-modal-form" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_order_id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="edit_customer_name" class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="edit_customer_name" name="customer_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="edit_phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Enter phone number" id="edit_phone_number" name="phone_number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="edit_email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter email address" id="edit_email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="edit_services" class="form-label">Services *</label>
                                <select class="mySelect5 form-control" id="edit_services" name="services[]" multiple required>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ in_array($service->id, old('services', $order->service_ids ?? [])) ? 'selected' : '' }}>
                                            {{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="edit_assign_to" class="form-label">Assign To *</label>
                                <select class="mySelect4 form-control" id="edit_assign_to" name="assign_to" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="edit_description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_description" placeholder="Enter description" name="description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif



@if(Route::is(['transactions']))
<div class="modal fade" id="add-transaction-modal" tabindex="-1" role="dialog" aria-labelledby="add-transaction-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-transaction-modal-label">Add New Transaction</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-transaction-modal-form" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="order_id" class="form-label">Select Customer <span class="text-danger">*</span></label>
                                <select class="mySelect2 form-control" id="order_id" name="order_id" required>
                                    @php  $orders = \App\Models\Order::where('assign_to', \Illuminate\Support\Facades\Auth::id())->where('status', 'pending')->get(); @endphp
                                    <option></option>
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="service_id" class="form-label">Select Service <span class="text-danger">*</span></label>
                                <select class="mySelect3 form-control" id="service_id" name="service_id" required>
                                    <!-- Services options will be populated here -->
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="application_no" class="form-label">Application Number <span class="text-danger">*</span></label>
                               <input type="text" class="form-control" id="application_no" name="application_no" placeholder="Enter application number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="govt_cost" class="form-label">Govt Cost <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="govt_cost" name="govt_cost" placeholder="Enter govt cost" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="service_cost" class="form-label">Service Cost <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="service_cost" name="service_cost" placeholder="Enter service cost" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="receipt" class="form-label">Receipt</label>
                                <input type="file" class="form-control" id="receipt" name="receipt">
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="paid_by" class="form-label">Paid By <span class="text-danger">*</span></label>   
                                <select class="mySelect4 form-control" id="paid_by" name="paid_by" required>
                                    <option value="Card">Card</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Transaction Modal -->
<div id="edit-transaction-modal" class="modal fade" tabindex="-1" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-transaction-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="transaction_id" id="edit_transaction_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_order_id" class="form-label">Select Customer</label>
                                <select class="mySelect7 form-control" id="edit_order_id" name="order_id" required>
                                    @foreach($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->customer_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_service_id" class="form-label">Select Service</label>
                                <select class="mySelect8 form-control" id="edit_service_id" name="service_id" required>
                                    <!-- Options will be populated via JS -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_application_no" class="form-label">Application Number</label>
                                <input type="text" class="form-control" id="edit_application_no" name="application_no" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_govt_cost" class="form-label">Govt Cost</label>
                                <input type="text" class="form-control" id="edit_govt_cost" name="govt_cost" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_service_cost" class="form-label">Service Cost</label>
                                <input type="text" class="form-control" id="edit_service_cost" name="service_cost" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_receipt" class="form-label">Receipt</label>
                                <input type="file" class="form-control" id="edit_receipt" name="receipt">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="edit_paid_by" class="form-label">Paid By</label>
                                <select class="mySelect9 form-control" id="edit_paid_by" name="paid_by" required>
                                    <option value="Card">Card</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="edit_description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endif


@if(Route::is(['email-templates']))
<!-- Modal -->
<div class="modal fade" id="add-template-modal" tabindex="-1" aria-labelledby="add-template-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-template-modal-label">Add Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="template-form">
                    <div class="mb-3">
                        <label for="template-name" class="form-label">Template Name</label>
                        <input type="text" class="form-control" id="template-name" placeholder="Enter template name" required>
                    </div>
                    <div class="mb-3">
                        <label for="template-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="template-subject" placeholder="Enter subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="template-email-body" class="form-label">Email Body</label>
                        <textarea id="template-email-body" class="form-control" rows="5" placeholder="Enter email body"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-template">Save Template</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit-template-modal" tabindex="-1" aria-labelledby="edit-template-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-template-modal-label">Edit Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-template-form">
                    <input type="hidden" id="edit-template-id">
                    <div class="mb-3">
                        <label for="edit-template-name" class="form-label">Template Name</label>
                        <input type="text" class="form-control" id="edit-template-name" placeholder="Enter template name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-template-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="edit-template-subject" placeholder="Enter subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-template-email-body" class="form-label">Email Body</label>
                        <textarea id="edit-template-email-body" class="form-control" rows="5" placeholder="Enter email body"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-edit-template">Save Changes</button>
            </div>
        </div>
    </div>
</div>
@endif
