"use strict";
	   $(document).on('click','.btn_actions_form_update_pass',function(){
                    var $this=$(this);
                    $this.prop('disabled',true).addClass('kt-spinner kt-spinner--left kt-spinner--md kt-spinner--light');
                    let $data=$("#form_change_password").serialize();
                    $.ajax({
                        type:'POST',
                        url:base_url+'setting/change_password',
                        data:$data,
                        dataType:'json',
                        error:function(){
                            $this.prop('disabled',false).removeClass('kt-spinner kt-spinner--left kt-spinner--md kt-spinner--light');
                            notifikasi('Something error','danger');
                        },
                        success:function(res){
                            $this.prop('disabled',false).removeClass('kt-spinner kt-spinner--left kt-spinner--md kt-spinner--light');
                            if(res.success){
                                // notifikasi(res.msg,'success');
                                swal.fire({
                                  title: "Berhasil disimpan",
                                  text: "Update password berhasil!",
                                  type: "success",
                                })
                                .then((res) => {
                                  window.location.reload();
                                });
                            // window.location.href=base_url+'users/userprofile';
                            }else{
                                $.each(res.messages, function(key, value) {
                                    var element = $('#' + key);  
                                    element.closest('div.form-group')
                                    .removeClass('validated')
                                    .addClass('validated')
                                    .find('.invalid-feedback')                    
                                    .remove();
                                    if(value.length > 0){
                                        let has_input_group =element.closest('div.form-group').find('div.input-group');
                                        let has_select_2=element.closest('div.form-group').find('.select2-container');
                                        if(has_input_group.length){
                                            has_input_group.addClass('is-invalid');
                                            $('<div class="invalid-feedback"> '+value+' </div>').insertAfter( has_input_group );
                                        }else if(has_select_2.length){
                                            $('<div class="invalid-feedback"> '+value+' </div>').insertAfter( has_select_2 );
                                        }else{
                                            $('<div class="invalid-feedback"> '+value+' </div>').insertAfter( "#"+key );
                                        }                                
                                    }else{
                                        element.closest('div.form-group')
                                        .find('.invalid-feedback')                    
                                        .remove();
                                    }
                                }); 
                                notifikasi(res.msg,'danger')
                            }
                        }
                    })
    })



    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
        $("#show_hide_password_1 a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password_1 input').attr("type") == "text"){
                $('#show_hide_password_1 input').attr('type', 'password');
                $('#show_hide_password_1 i').addClass( "fa-eye-slash" );
                $('#show_hide_password_1 i').removeClass( "fa-eye" );
            }else if($('#show_hide_password_1 input').attr("type") == "password"){
                $('#show_hide_password_1 input').attr('type', 'text');
                $('#show_hide_password_1 i').removeClass( "fa-eye-slash" );
                $('#show_hide_password_1 i').addClass( "fa-eye" );
            }
        });
        $("#show_hide_password_2 a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password_2 input').attr("type") == "text"){
                $('#show_hide_password_2 input').attr('type', 'password');
                $('#show_hide_password_2 i').addClass( "fa-eye-slash" );
                $('#show_hide_password_2 i').removeClass( "fa-eye" );
            }else if($('#show_hide_password_2 input').attr("type") == "password"){
                $('#show_hide_password_2 input').attr('type', 'text');
                $('#show_hide_password_2 i').removeClass( "fa-eye-slash" );
                $('#show_hide_password_2 i').addClass( "fa-eye" );
            }
        });
    });

    // tabs
    function tabOpen(evt, asd) {
        // begin::tabs
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        // tablink
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        // show
        document.getElementById(asd).style.display = "block";
        evt.currentTarget.className += " active";
    }