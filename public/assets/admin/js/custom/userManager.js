class UserManager {
    constructor() {
        this.init();
    }

    init() {
        $(document).ready(() => {
            this.setupModalReset();
            this.setupUserFormSubmission();
            this.setupEditButtonClick();
            this.initializeDataTable();
            this.setupCheckAllCheckbox();
            this.setupDeleteSelectedCategories();
            this.setupSingleDeleteUser();
        });
    }

    setupModalReset() {
        $(document).on('hidden.bs.modal', '.modal', function () {
            const form = $(this).find('form');
            form[0].reset();
            form.find('#userId').val('');
            $(this).find('.invalid-feedback').remove();
            $(this).find('input, select').removeClass('is-invalid');
            form.removeClass('was-validated');
        });
    }

    setupUserFormSubmission() {
        $('#userForm').on('submit', (e) => {
            e.preventDefault();
            const form = e.target;
            if (form.checkValidity() === false) {
                e.stopPropagation();
                form.classList.add('was-validated');
            } else {
                $('.invalid-feedback').remove();
                $('input, select').removeClass('is-invalid');

                const formData = new FormData(form);

                const url = $(form).attr('action');
                const method = $(form).find('input[name="_method"]').val() || 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if (response.status === 'success') {
                            $('#formModel').modal('hide');
                            form.reset();
                            $(form).removeClass('was-validated');
                            $('#userTable').DataTable().ajax.reload();
                            successToast(response.message);
                        }
                    },
                    error: (response) => {
                        if (response.status === 422) {
                            const errors = response.responseJSON.errors;
                            $.each(errors, (key, value) => {
                                const inputField = $('[name="' + key + '"]');
                                inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                                inputField.addClass('is-invalid');
                            });
                        } else {
                            console.error('An unexpected error occurred:', response);
                        }
                    }
                });
            }
        });
    }


    setupEditButtonClick() {
        $(document).on('click', '.editBtn', (e) => {
            const id = $(e.currentTarget).data('id');
            const url = "edit-users/" + id;

            $.get(url, (data) => {
                $('#userId').val(data.user.id);
                $('#userRole').val(data.user.role_id).trigger('change');
                $('#userName').val(data.user.name);
                $('#userEmail').val(data.user.email);
                $('#userPhone').val(data.user.phone);
                $('#userProfile').prop('required', false);
                $('#userDescription').val(data.user.description);
                $('#formModel').modal('show');
            });
        });
    }

    setupDeleteSelectedCategories() {
        $('#deleteSelected').on('click', () => {
            const selectedCategories = $('.user-checkbox:checked').map(function () {
                return $(this).val();
            }).get();
            if (selectedCategories.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No users selected',
                    text: 'Please select at least one user to delete.',
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
                        url: "users/destroy",
                        method: 'get',
                        data: { ids: selectedCategories },
                        success: (response) => {
                            if (response.status === 'success') {
                                $('#userTable').DataTable().ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete users. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: (response) => {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting users.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }

    setupSingleDeleteUser() {
        $(document).on('click', '.deleteSingleBtn', function () {
            let userId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will permanently delete the user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "users/destroy-single/" + userId,
                        method: 'get',
                        success: (response) => {
                            if (response.status === 'success') {
                                $('#userTable').DataTable().ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to delete the user. Please try again.',
                                    'error'
                                );
                            }
                        },
                        error: (response) => {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the user.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }

    initializeDataTable() {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ajax: "get-users",
            columns: [
                { data: 'check_box', orderable: false },
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'role_id', name: 'role_id' },
                { data: 'profile_img', name: 'profile_img' },
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

new UserManager();