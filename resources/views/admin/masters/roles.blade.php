@extends('admin.layout.layout')
@section('mian-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Roles</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <x-data-table id="roleTable" title="Roles" :columns="['SR No.', 'Name','Tools']" />
        </div>
    </div>
    <!--- Category Model-->
    <div class="modal fade" id="formModel" tabindex="-1" aria-labelledby="formModelLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="formModelLabel">Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form id="roleForm" action="{{ route('admin.roles.store') }}" class="needs-validation" method="post"
                    novalidate>
                    @csrf
                    <input type="hidden" name="id" id="roleId" value="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Name</label>
                            <input type="text" id="roleName" name="name" class="form-control"
                                placeholder="Enter name" required data-error-message="Please enter the role name." />
                                <div class="invalid-feedback">
                                Name field is required
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/custom/roleManager.js') }}"></script>
@endpush
