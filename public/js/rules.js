$(document).ready(function() {
    $('.editable-item').on('click', function() {
        $(this).attr('contenteditable', true).focus();
    });
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('#save-button').on('click', function() {
        var newData = {
            'Rules': {
                'ExternalFormLink': $('#gform-link').text(),
                'Title': $('#title').text(),
                'Section': []
            }
        };

        $('.sections').each(function() {
            var sectionTitle = $(this).find('.section-title').text();
            var sectionList = [];

            $(this).find('.section-list li').each(function() {
                sectionList.push($(this).text());
            });

            newData['Rules']['Section'].push({
                'Title': sectionTitle,
                'List': sectionList
            });
        });

        var jsonData = {
            'Rules': newData['Rules']
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: '/rules/update',
            type: 'PUT',
            data: JSON.stringify(jsonData),
            contentType: 'application/json',
            success: function(response) {
                console.log('JSON file updated successfully');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log('Error updating JSON file:', error);
            }
        });

        $('.editable-item').attr('contenteditable', false);
    });

    $('#add-section-btn').click(function() {
        var newElement = $('<div class="sections"><div class="d-flex align-items-center"><h3 class="fw-normal editable-item section-title">Jadi gini..</h3><i class="ml-3 fa-regular fa-trash-can"></i></div><ol class="section-list"><div class="d-flex align-items-center"><li class="editable-item">Kan kita udah lama...</li><i class="ml-1 fa-solid fa-circle-minus"></i></div><div class="d-flex align-items-center"><li class="editable-item">Trus?</li><i class="ml-1 fa-solid fa-circle-minus"></i></div><div class="d-flex align-items-center"><li class="editable-item">Ya nggapapa...</li><i class="ml-1 fa-solid fa-circle-minus"></i></div><div class="d-flex align-items-center"><li class="editable-item">Lah...</li><i class="ml-1 fa-solid fa-circle-minus"></i></div><i class="fa-solid fa-circle-plus"></i></ol></div>');
        $(this).before(newElement);
    });
});

$(document).on('click', '.fa-circle-minus', function() {
    $(this).parent().remove();
});

$(document).on('click', '.fa-circle-plus', function() {
    var newElement = $('<div class="d-flex align-items-center"><li class="editable-item">Tambahin sendiri wkwk...</li><i class="ml-1 fa-solid fa-circle-minus"></i></div>');
    $(this).before(newElement);
});

$(document).on('click', '.editable-item', function() {
    $(this).attr('contenteditable', true).focus();
});

$(document).on('click', '.fa-trash-can', function() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Affah iyh mo hapus section? 🤔',
        text: "G bisa dibalikin loh...",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Iyadah!',
        cancelButtonText: 'Gajadi hehe...',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: 'Selesai',
                text: 'Section sudah dihapus 😊',
                icon: 'success',
                confirmButtonText: 'Okey',
        })
            $(this).parent().parent().remove();

            setTimeout(() => {
                $('#save-button').click();
            }, 1000);
        } 
        else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire({
            title: 'Dibatalin',
            text: 'Section tidak terhapus 😊',
            icon: 'error',
            confirmButtonText: 'Okey',
        })
        }
    });
});