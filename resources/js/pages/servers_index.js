function remove() {
    $(document).on('click', '.btn-delete', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: 'This operation is irreversible, the server will be gone.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continue',
            cancelButtonText: 'Abort'
        }).then(function (response) {
            if(response.isConfirmed) {
                $.post(route('app.admin.server.delete'), {
                    _method: 'delete',
                    serverId: id,
                }).then(function (resp) {
                    if(resp.status === 200) {
                        Swal.fire({
                            title: 'Server was deleted!',
                            icon: 'success',
                        });
                        $('tr[data-id="'+id+'"]').remove();
                    }
                    else {
                        Swal.fire({
                            title: "Something went wrong.",
                            icon: 'error',
                        });
                    }
                });
            }
        });
    });
}

$(document).ready(function () {
    remove();
});
