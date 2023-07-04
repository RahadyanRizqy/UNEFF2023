$(document).ready(function () {
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
    
    $("#deleteForm").submit(function(event) {
    });

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    
    // swalWithBootstrapButtons.fire({
    //     title: 'Bener nih mo hapus postingan? 🤔',
    //     text: "G bisa dibalikin loh...",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonText: 'Iyadah!',
    //     cancelButtonText: 'Gajadi hehe...',
    //     reverseButtons: true
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //       swalWithBootstrapButtons.fire(
    //         'Selesai',
    //         'Postingan sudah dihapus 😊',
    //         'success'
    //       )
    //     } else if (
    //       /* Read more about handling dismissals below */
    //       result.dismiss === Swal.DismissReason.cancel
    //     ) {
    //       swalWithBootstrapButtons.fire(
    //         'Dibatalin',
    //         'Postingan tidak terhapus 😊',
    //         'error'
    //       )
    //     }
    // });

    $("#deleteForm").submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting immediately

      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
      });

      swalWithBootstrapButtons.fire({
          title: 'Bener nih mo hapus postingan? 🤔',
          text: "G bisa dibalikin loh...",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Iyadah!',
          cancelButtonText: 'Gajadi hehe...',
          reverseButtons: true
      }).then((result) => {
          if (result.isConfirmed) {
              swalWithBootstrapButtons.fire(
                'Selesai',
                'Postingan sudah dihapus 😊',
                'success'
              )
              $(this).unbind('submit').submit();
          } 
          else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
              'Dibatalin',
              'Postingan tidak terhapus 😊',
              'error'
            )
          }
      });
  });
});