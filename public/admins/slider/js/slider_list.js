$(function () {
    $(document).on('click', '.action_delete', actionDelete)
})

function actionDelete(e) {
    e.preventDefault();

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            let urlRequest = $(this).data('url');
            let that = $(this);
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {

                    if (data.code == 200) {

                        that.parent().parent().remove();

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });

                    }

                },
                error: function () {

                }
            });



        }
    });

    // const swalWithBootstrapButtons = Swal.mixin({
    //     customClass: {
    //         confirmButton: "btn btn-success",
    //         cancelButton: "btn btn-danger"
    //     },
    //     buttonsStyling: false
    // });
    // swalWithBootstrapButtons.fire({
    //     title: "Are you sure?",
    //     text: "You won't be able to revert this!",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonText: "Yes, delete it!",
    //     cancelButtonText: "No, cancel!",
    //     reverseButtons: true
    // }).then((result) => {
    //     if (result.isConfirmed) {

    //         let urlRequest = $(this).data('url');
    //         let that = $(this);
    //         $.ajax({
    //             type: 'GET',
    //             url: urlRequest,
    //             success: function (data) {

    //                 if (data.code == 200) {

    //                     that.parent().parent().remove();

    //                     swalWithBootstrapButtons.fire({
    //                         title: "Deleted!",
    //                         text: "Your file has been deleted.",
    //                         icon: "success"
    //                     });

    //                 }

    //             },
    //             error: function () {

    //             }
    //         });

    //     } else if (
    //         /* Read more about handling dismissals below */
    //         result.dismiss === Swal.DismissReason.cancel
    //     ) {
    //         swalWithBootstrapButtons.fire({
    //             title: "Cancelled",
    //             text: "Your imaginary file is safe :)",
    //             icon: "error"
    //         });
    //     }
    // });
}
