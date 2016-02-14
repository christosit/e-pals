$(document).ready(function()
{
    $(window).load(function() {

    });
    $(document).ready(function(){
        $('.main-form').keypress(function(e){
            if(e.keyCode==13)
                $('#login').click();
        });
    });
});
$(document).ready(function()
{
    $( "#login" ).click(function()
    {
        swal('ok');
        var email =$('#email').val();
        var user_id =$('.username').text();
        var pass = $('#password').val();
        var	keep_me = 0;

        if (keep_me = $("#keep_me").is(":checked"))
        {
            	keep_me = 1;
        }

        if(pass!='' && email!='')
        {

            swal({
                title: "Please wait...",
                time:200000,
                imageUrl:"images/ajax_loader.gif"
            });

            $.ajax({
                type: "POST",
                url: "../model/login_function.php",
                data:
                {
                    email:email,
                    password:pass,
                    user_id:user_id,
                    keep_me:keep_me
                },
                cache: false,
                success:function(data)
                {
                 //   alert(data);
                    var obj = jQuery.parseJSON( data );

                    if(obj.status==1){
                        //alert(obj.admin);
                        if(obj.admin==1) {
                            swal({
                                    title: "It seems that you an Administrator",
                                    text: "Continue as a User or as Admin",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-primary",
                                    confirmButtonText: "Yes, as a administrator",
                                    cancelButtonText: "No, as a User ",
                                    closeOnConfirm: false,
                                    closeOnCancel: false
                                },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        location.href = "admin_profile.php";
                                    }
                                    else {
                                        location.href = "profile.php";
                                    }
                                });
                        }else {
                            location.href = "profile.php";
                        }

                    }




                    //if status==1 ok
                    //if status==2 check email


                    else
                    if(obj.status==0)//Wrong Credidentials
                    {
                        $('#email').val('');
                        $('#password').val('');
                        swal('','Invalid Username/Password','warning');

                    }
                    else
                    if(obj.status==2)//Wrong Credidentials
                    {
                        swal({
                                title: "Please verigfy your account, at"+email,
                                text: "Verify now!",
                                type: "warning",
                                imageUrl:"images/ajax_loader.gif",
                                showCancelButton: true,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Yes!!",
                                cancelButtonText: "No, later ",
                                closeOnConfirm: false,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    window.open('https://mail.google.com/mail/u/0/', '_blank');
                                }
                            });
                        $('#email').val(email);
                        $('#password').val('');
                    }
                }
            });
        }
        else
        {
            swal('','Provide Username and Password','warning');
        }
    });
});


//Forgot Pass
$(document).ready(function() {
    $('#forgot').click(function () {

        var email = $('#email_forgot').val();//Dame valeis to id tou textbox
        var user =$('#email').val();
        var pass =$('#password').val();

        if (email == '') {
            $('#required').show(500);
            return;
        }
        $.ajax(
            {
                url: '../model/check_email.php',
                type: 'POST',
                data: {
                    name:user,
                    pass:pass,
                    email: email

                },	//Tin variable_email na tin xrisimopoiiseis me to idio onoma je mesa stin forgot_email.php
                success: function (data) {
                    if( data == 1){
                        $.ajax(
                            {
                                url: '../model/forgot_function.php',
                                type: 'POST',
                                data: {

                                    email: email
                                },	//Tin variable_email na tin xrisimopoiiseis me to idio onoma je mesa stin forgot_email.php
                                success: function (data) {

                                        swal('Success','An email has been sent to \n' + email,'success');

                                }
                            });

                    }

                    else
                     {
                     swal('Error','An email has not been sent to \n' + email,'warning');
                     }


                }

            });

    });
});

//END

