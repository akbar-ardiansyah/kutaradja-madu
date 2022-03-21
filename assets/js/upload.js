
//save product

// $(document).on('click', '.save', function() {
//     var $this = $(this);
//     let $data = $("#form_product").serialize();
//     // let $data = new FormData('#form_product')[0];
//     // console.log($data);
//     $.ajax({
//         type: 'post',
//         url: base_url + 'admin/upload',
//         data: $data,
//         dataType: 'json',
//         error: function() {
//             $this.prop('disabled', false).removeClass('spinner spinner-white spinner-right');
//             notifikasi('Something error', 'danger');
//         },
//         success: function(res) {
//             $this.prop('disabled', false).removeClass('spinner spinner-white spinner-right');
//             if (res.success) {
//                 notifikasi(res.msg, 'success');
//                 window.location.reload()
//             } else {
//                 $.each(res.messages, function(key, value) {
//                     var element = $('#' + key);
//                     element.closest('div.form-group')
//                         .removeClass('validated')
//                         .addClass('validated')
//                         .find('.invalid-feedback')
//                         .remove();
//                     if (value.length > 0) {
//                         let has_input_group = element.closest('div.form-group').find('div.input-group');
//                         let has_select_2 = element.closest('div.form-group').find('.select2-container');
//                         if (has_input_group.length) {
//                             has_input_group.addClass('is-invalid');
//                             $('<div class="invalid-feedback"> ' + value + ' </div>').insertAfter(has_input_group);
//                         } else if (has_select_2.length) {
//                             $('<div class="invalid-feedback"> ' + value + ' </div>').insertAfter(has_select_2);
//                         } else {
//                             $('<div class="invalid-feedback"> ' + value + ' </div>').insertAfter("#" + key);
//                         }
//                     } else {
//                         element.closest('div.form-group')
//                             .find('.invalid-feedback')
//                             .remove();
//                     }
//                 });
//                 notifikasi(res.msg, 'danger')
//             }
//         },
//         cache: false,
//         contentType: false,
//         processData: false
//     })
// })

const notif = $('.notif').data('flashdata');
    if (notif) {

        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Success ' + notif,

        });
    }

    $(document).on('click', '.edit_product', function() {
        // $('#form')[0].reset();
        $('#header-title').html('Update Produk');
        $('form').attr('action', base_url+'admin/update_product');
        $("#image-wrapper").removeClass("d-none");
        const id = $(this).data('id');

        $.ajax({
            url: base_url +'admin/get_product',
            dataType: 'json',
            data: {
                id: id
            },
            method: 'post',
            success: function(data) {
                $("#id").val(data.id_product);
                $('#namaproduk').val(data.name);
                $('#harga').val(data.price);
                $('#deskripsi').val(data.describtion);
                $("#image-wrapper").css("background-image", "url("+base_url+"assets/upload/product/" + data.image);
            }

        });
    });

    $(".deleted").on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            text: "yakin hapus data?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3599FF',
            cancelButtonColor: 'gray',
            confirmButtonText: 'yakin',
            cancelButtonText: 'batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })