@extends('admin.layout.layout')
@section('mian-content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Users</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- end page title -->
        <x-data-table id="userTable" title="Users" :columns="['SR No.','Name','Email','Phone','Role','Profile Image','Tools']" />
    </div>
</div>
<!--- Users Model-->
<div class="modal fade" id="formModel" tabindex="-1" aria-labelledby="formModelLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="formModelLabel">Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form id="userForm" action="{{ route('admin.users.store') }}" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="hidden" name="id" id="userId" value="">
                <div class="modal-body">
                    <div class="mb-3" id="userBox">
                        <label for="userRole" class="form-label">Role</label>
                        <select class="form-control select2" name="role_id" id="userRole" required>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Role field is required
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" id="userName" name="name" class="form-control"
                            placeholder="Enter name" required data-error-message="Please enter the user name." />
                        <div class="invalid-feedback">
                            Name field is required
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter Email" required>
                        <div class="invalid-feedback">
                            Email field is required
                        </div>
                    </div>

                    <div class="row gy-4 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="userPhone" class="form-label">Phone</label>
                                <input type="number" min="0" name="phone" id="userPhone"
                                    class="form-control" placeholder="Enter Phone" required />
                                <div class="invalid-feedback">
                                    Phone field is required
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="userProfile" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" placeholder="Profile Image" id="userProfile"
                                    name="profile_img">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="userDescription" class="form-label">Description</label>
                        <textarea name="description" id="userDescription" class="form-control" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/js/custom/userManager.js') }}"></script>
@endpush