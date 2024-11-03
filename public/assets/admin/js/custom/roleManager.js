class RoleManager {
    constructor() {
        this.init();
    }

    init() {
        $(document).ready(() => {
            this.setupModalReset();
            this.setupRoleFormSubmission();
            this.setupEditButtonClick();
            this.initializeDataTable();
            this.setupCheckAllCheckbox();
            this.setupDeleteSelectedRoles();
            this.setupSingleDeleteRoles();
        });
    }

    setupModalReset() {
        $(document).on('hidden.bs.modal', '.modal', function () {
            const form = $(this).find('form');
            form[0].reset();
            form.find('#roleId').val('');
            $(this).find('.invalid-feedback').remove();
            $(this).find('input, select').removeClass('is-invalid');
            form.removeClass('was-validated');
        });
    }

    setupRoleFormSubmission() {
        $('#roleForm').on('submit', (e) => {
            e.preventDefault();
            const form = e.target;

            if (form.checkValidity() === false) {
                e.stopPropagation();
                form.classList.add('was-validated');
            } else {
                $('.invalid-feedback').remove();
                $('input, select').removeClass('is-invalid');

                const formData = $(form).serialize();
                const url = $(form).attr('action');
                const method = $(form).find('input[name="_method"]').val() || 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    success: (response) => {
                        if (response.status === 'success') {
                            $('#formModel').modal('hide');
                            form.reset();
                            $(form).removeClass('was-validated');
                            $('#roleTable').DataTable().ajax.reload();
                            successToast(response.message);
                        }
                    },
                    error: (response) => {
                        if (response.status === 422) {
                            const errors = response.responseJSON.errors;
                            $.each(errors, (key, value) => {
                                const inputField = $('[name="' + key + '"]');
                                inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                                inputField.next('.invalid-feedback').show();
                            });
                        }
                    }
                });
            }
        });
    }

    setupEditButtonClick() {
        $(document).on('click', '.editBtn', (e) => {
            const id = $(e.currentTarget).data('id');
            const url = "edit-roles/" + id;

            $.get(url, (data) => {
                $('#roleId').val(data.role.id);
                $('#roleName').val(data.role.name);
                $('#formModel').modal('show');
            });
        });
    }

    setupDeleteSelectedRoles() {
        $('#deleteSelected').on('click', () => {
            const selectedRoles = $('.role-checkbox:checked').map(function () {
                return $(this).val();
            }).get();
            if (selectedRoles.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No role selected',
                    text: 'Please select at least one role to delete.',
                });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "roles/destroy",
                        method: 'get',
                        data: { ids: selectedRoles },
                        success: (response) => {
                            if (response.status === 'success') {
                                $('#roleTable').DataTable().ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete roles. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: (response) => {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting roles.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }

    setupSingleDeleteRoles() {
        $(document).on('click', '.deleteSingleBtn', function () {
            let roleId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will permanently delete the role!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "roles/destroy-single/" + roleId,
                        method: 'get',
                        success: (response) => {
                            if (response.status === 'success') {
                                $('#roleTable').DataTable().ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete the role. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: (response) => {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the role.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }

    initializeDataTable() {
        $('#roleTable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ajax: "get-roles",
            columns: [
                { data: 'check_box', orderable: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'tools', name: 'tools', orderable: false, searchable: false },
            ],
            order: [[1, 'asc']]
        });
    }

    setupCheckAllCheckbox() {
        $('#checkAll').on('click', function () {
            $('.form-check-input:checkbox').not(this).prop('checked', this.checked);
        });
    }
}

new RoleManager();