
@if(Route::is(['file-manager']))
	<!-- Files Toogle Slide -->
	<div class="toggle-sidebar">
		<div class="d-flex align-items-center justify-content-between head">
			<h4>File Preview</h4>
			<div class="d-flex align-items-center">
				<a href="javascript:void(0);" class="me-2 d-flex align-items-center"><i class="fa fa-star"></i></a>
				<a href="javascript:void(0);" class="me-2 d-flex align-items-center"><i data-feather="trash-2" class="feather-16 text-center text-danger"></i></a>
				<a href="javascript:void(0);" class="sidebar-closes d-flex align-items-center" aria-hidden="true"><i data-feather="x-circle" class="feather-26 color-primary"></i></a>
			</div>
		</div>
		<div class="text-center">
			<a href="javascript:void(0);"><img src="{{ URL::asset('/build/img/file-manager/folder-lg.png')}}" alt="Folder"></a>
			<h5>Website Backup for the Design team</h5>
			<p>File Size : 616 MB</p>
		</div>

		<div class="nav nav-tabs d-flex align-items-center justify-content-between py-4 mb-4" id="nav-tab" role="tablist">
			<a class="nav-link flex-fill active btn btn-light me-2 text-center" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i data-feather="list" class="feather-16 me-2 text-center"></i>Details</a>
			<a class="nav-link flex-fill btn btn-light" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i data-feather="clock" class="feather-16 me-2"></i>Activity</a>
		</div>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<h5 class="mb-4 d-flex align-items-center"><i data-feather="edit" class="feather-20 me-2"></i>Properties</h5>
				<ul class="seprator-lg">
					<li class="mb-4">
						<h6>File Name</h6>
						<p>Website Backup for the Designteam</p>
					</li>
					<li class="mb-4">
						<h6>File Type</h6>
						<p>Folder</p>
					</li>
					<li class="mb-4">
						<h6>Size</h6>
						<p>616 MB</p>
					</li>
					<li class="mb-4">
						<h6>Created</h6>
						<p>22 July 2023, 08:30 PM</p>
					</li>
					<li class="mb-4">
						<h6>Location</h6>
						<p class="location d-inline-flex align-items-center"><i data-feather="hard-drive" class="feather-16 me-1"></i>Drive</p>
					</li>
					<li class="mb-4">
						<h6>File Name</h6>
						<p>23 July 2023, 08:30 PM</p>
					</li>
					<li class="mb-4">
						<h6>Opened On</h6>
						<p>28 July 2023, 06:40 PM</p>
					</li>
					<li>
						<div class="row">
							<!-- Editor -->
							<div class="col-lg-12">
								<div class="input-blocks summer-description-box transfer">
									<label>Description</label>
									<div id="summernote3">
									</div>
									<p>Maximum 60 Characters</p>
								</div>
							</div>
							<!-- /Editor -->
						</div>
					</li>
				</ul>
				<h5 class="mb-4 d-flex align-items-center"><i data-feather="user" class="feather-20 me-2"></i>Who has access</h5>
				<div class="d-flex align-items-center justify-content-between avatar-wrap">
					<div class="avatar-access d-flex align-items-center mb-4">
						<span>
							<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Member 1" data-bs-original-title="Member 1"><img src="{{ URL::asset('/build/img/avatar/avatar-1.jpg')}}" alt="Avatar" class="avatar-md"></a>
						</span>
						<span>
							<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Member 2" data-bs-original-title="Member 2"><img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg')}}" alt="Avatar" class="avatar-md"></a>
						</span>
						<span>
							<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Member 3" data-bs-original-title="Member 3"><img src="{{ URL::asset('/build/img/avatar/avatar-3.jpg')}}" alt="Avatar" class="avatar-md"></a>
						</span>
						<span>
						   <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Member 4" data-bs-original-title="Member 4"><img src="{{ URL::asset('/build/img/avatar/avatar-4.jpg')}}" alt="Avatar" class="avatar-md"></a>
						</span>
						<span>
						   <a href="javascript:void(0);" class="avatar-md add d-flex align-items-center justify-content-center"><i data-feather="plus" class="feather-16 me-1"></i></a>
						</span>
					</div>
				</div>
				<p>Owned by Andrew. Shared with James, Fin, Davis</p>
			</div>
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				<h5 class="mb-4 d-flex align-items-center"><i data-feather="calendar" class="feather-20 me-2"></i>This Week</h5>
				<ul class="mb-4">
					<li class="mb-4">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-1.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<p>Andrew commented on 1 items <br>3:39 PM Jul 19</p>
						</div>
						<p class="d-flex align-items-center location border-0"><img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">Website Backup for the Design team</p>
					</li>
					<li class="mb-4">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<p>Drake shared an item<br>3:39 PM Jul 19</p>
						</div>
						<p class="d-flex align-items-center location border-0"><img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">Website Backup for the Design team</p>
					</li>
					<li class="mb-2">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-3.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<div><p class="mb-0 text-secondary">Melvin</p><p class="mb-0">Commentor</p></div>
						</div>
					</li>
					<li class="mb-2">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-4.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<div><p class="mb-0 text-secondary">Drake</p><p class="mb-0">Editor</p></div>
						</div>
					</li>
				</ul>
				<h5 class="mb-4 d-flex align-items-center"><i data-feather="calendar" class="feather-20 me-2"></i>Last Month</h5>
				<ul class="mb-4">
					<li class="mb-4">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-1.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<p>Andrew commented on 1 items <br>3:39 PM Jul 19</p>
						</div>
						<p class="d-flex align-items-center location border-0"><img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">Website Backup for the Design team</p>
					</li>
					<li class="mb-4">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<p>Drake shared an item<br>3:39 PM Jul 19</p>
						</div>
						<p class="d-flex align-items-center location border-0"><img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">Website Backup for the Design team</p>
					</li>
					<li class="mb-2">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-3.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<div><p class="mb-0 text-secondary">Melvin</p><p class="mb-0">Commentor</p></div>
						</div>
					</li>
					<li class="mb-2">
						<div class="d-flex align-items-center mb-2">
							<a href="javascript:void(0);" class="me-3"><img src="{{ URL::asset('/build/img/avatar/avatar-4.jpg')}}" alt="Avatar" class="avatar-md"></a>
							<div><p class="mb-0 text-secondary">Drake</p><p class="mb-0">Editor</p></div>
						</div>
					</li>
				</ul>
				<a href="javascript:void(0);" class="text-primary show-all"><i data-feather="plus-circle" class="feather-20 me-2"></i>Show All</a>
			</div>
		</div>

	</div>
	<!-- Files Toogle Slide -->

	<!-- Upload File -->
	<div class="modal fade modal-default pos-modal upload-modal" id="upload-file" aria-labelledby="upload-file">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-4">
					<h5>Upload File</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body p-4">
					<div class="drag-drop text-center mb-4">
						<div class="upload">
							<a href="#"><img src="{{ URL::asset('/build/img/icons/drag-drop.svg')}}" alt=""></a>
							<p>Drag and drop a <a href="#">file to upload</a></p>
						</div>
						<input type="file" multiple="">
					</div>

					<div class="d-flex align-items-center justify-content-between">
						<p>3 of 1 files Uploaded</p>
						<span>70%</span>
					</div>
					<div class="progress mt-2 mb-4">
						  <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
					</div>

					<ul>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">latest-version.zip<i data-feather="check-circle" class="ms-2 feather-16"></i></a></h6>
									<span>616 MB</span>
								</div>
							</div>
							<a href="javascript:void(0);" class="text-danger text-right"><i data-feather="trash-2" class="feather-16"></i></a>
						</li>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/xls.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">Update work history.xls</a></h6>
									<span>616 MB</span>
									<div class="progress mt-2">
										  <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<a href="javascript:void(0);" class="text-danger me-2 d-flex align-items-center"><i data-feather="trash-2" class="feather-16"></i></a>
								<a href="javascript:void(0);" class="text-default d-flex align-items-center"><i data-feather="pause-circle" class="feather-16"></i></a>
							</div>
						</li>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/zip.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">Updated Project.zip</a></h6>
									<span>616 MB</span>
									<div class="progress mt-2">
										  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<a href="javascript:void(0);" class="text-danger me-2 d-flex align-items-center"><i data-feather="trash-2" class="feather-16"></i></a>
								<a href="javascript:void(0);" class="text-default d-flex align-items-center"><i data-feather="play-circle" class="feather-16"></i></a>
							</div>
						</li>
					</ul>

				</div>
			</div>
		</div>
	</div>
	<!-- /Upload File -->

	<!-- Upload Folder -->
	<div class="modal fade modal-default pos-modal upload-modal" id="upload-folder" aria-labelledby="upload-folder">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header p-4">
					<h5>Upload File</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body p-4">
					<div class="drag-drop text-center mb-4">
						<div class="upload">
							<a href="#"><img src="{{ URL::asset('/build/img/icons/drag-drop.svg')}}" alt=""></a>
							<p>Drag and drop a <a href="#">file to upload</a></p>
						</div>
						<input type="file" multiple="">
					</div>

					<div class="d-flex align-items-center justify-content-between">
						<p>3 of 3 files Uploaded</p>
						<span>100%</span>
					</div>
					<div class="progress mt-2 mb-4">
						  <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					</div>

					<ul>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/folder.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">latest-version<i data-feather="check-circle" class="ms-2 feather-16"></i></a></h6>
									<span>616 MB</span>
								</div>
							</div>
							<a href="javascript:void(0);" class="text-danger text-right"><i data-feather="trash-2" class="feather-16"></i></a>
						</li>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/xls.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">Update work history.xls<i data-feather="trash-2" class="feather-16"></i></a></h6>
									<span>16 MB</span>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<a href="javascript:void(0);" class="text-danger me-2"><i data-feather="trash-2" class="feather-16"></i></a>
								<a href="javascript:void(0);" class="text-default"><i data-feather="pause-circle" class="feather-16"></i></a>
							</div>
						</li>
						<li class="d-flex align-items-center justify-content-between">
							<div class="d-flex align-items-center w-85">
								<img src="{{ URL::asset('/build/img/icons/zip.svg')}}" alt="Folder" class="me-2">
								<div class="flex-fill">
									<h6><a href="javascript:void(0);">updated project.zip<i data-feather="trash-2" class="feather-16"></i></a></h6>
									<span>14 MB</span>
								</div>
							</div>
							<div class="d-flex align-items-center">
								<a href="javascript:void(0);" class="text-danger me-2"><i data-feather="trash-2" class="feather-16"></i></a>
								<a href="javascript:void(0);" class="text-default"><i data-feather="play-circle" class="feather-16"></i></a>
							</div>
						</li>
					</ul>

				</div>
				<div class="modal-footer d-sm-flex justify-content-end">
					 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Clear</button>
					<button type="button" class="btn btn-primary">Upload</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Upload Folder -->

	
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
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Select Role</label>
                        <select class="form-select" id="role" name="role_id" required>
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