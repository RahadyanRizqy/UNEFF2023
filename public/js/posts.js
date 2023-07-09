$(document).ready(function() {
    $('input[name="type-chosen"]').on('change', function() {
        var value = $(this).val();
        if (value == 'file') {
            $('#file-input').removeClass('d-none');
            $('#url-input').addClass('d-none');
        } else {
            $('#url-input').removeClass('d-none');
            $('#file-input').addClass('d-none');
        }
    });

    if ($('#file-picture').is(":checked")) {
        $('#file-input').removeClass('d-none');
        $('#url-input').addClass('d-none');
    }
    if ($('#url-picture').is(":checked")) {
        $('#url-input').removeClass('d-none');
        $('#file-input').addClass('d-none');
    }

    $('.delete-btn').click(function(event) {
        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        
        const form = $(this).closest('form');
        const checkbox = $('#confirm-delete');
        const isCheckboxChecked = checkbox.is(':checked');
        
        swalWithBootstrapButtons.fire({
            title: 'Bener nih mo hapus postingan? 🤔',
            text: "G bisa dibalikin loh...",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Iyadah!',
            cancelButtonText: 'Gajadi hehe...',
            reverseButtons: true,
            html: `
            <div>
                <label for="radio-option" class="d-flex justify-content-center">
                    <input type="checkbox" name="delete-media" value="delete" id="confirm-delete">
                    <p id="confirm-delete-text" class="mb-0 ml-2">Apus juga file di Media</p>
                </label>
            </div>
            `
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Selesai',
                    'Postingan sudah dihapus 😊',
                    'success'
                );
                form.find('input[name="deleted"]').val(isCheckboxChecked ? 'true' : 'false');
                form.unbind('submit').submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Dibatalin',
                    'Postingan tidak terhapus 😊',
                    'error'
                );
            }
        });
    });
});