<div class="modal fade" id="addNewRole" tabindex="-1" aria-labelledby="addNewRole" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewRole">Create Role & Permissions</h5>
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
            <tbody> @foreach (['Admin Users List', 'Admin Under Maintenance', 'Admin Email Templates', 'Admin Document Name', 'Admin Salary Certificate', 'Admin Designation Types', 'Admin Top Up', 'Admin Transaction History', 'Admin Expenses History', 'Admin Users', 'Admin Companies', 'Admin Employees', 'Admin Completed Profile', 'Admin Missing Profile', 'Admin In Process', 'Admin Dues Invoices', 'Admin Service Path', 'Admin Requests', 'Admin Global Services', 'Admin Expired Documents', 'Admin Companies Documents', 'Admin Employees Documents', 'Admin Credentials', 'Admin In Process', 'Admin Completed Request', 'Admin Cancelled Employees', 'Admin Calendar', 'Admin Login Activities'] as $page) <tr>
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