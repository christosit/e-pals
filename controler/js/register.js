//REGISTER FUNCTION

$(document).ready(function()
{
    $( "#register").unbind().click(function(e)
    {
        e.preventDefault();
        var form = $(this).parents('form');


        var name =$('#name').val();
        var surname =$('#surname').val();
        var email =$('#email').val();
        var conf_email =$('#conf_email').val();
        var pass =$('#password').val();
        var address =$('#address').val();
        var genre =$('input[name=genre]:checked').val();
        var birthday =$('.birthday').val();
        console.log(genre);


        if(	email!='' && pass!='' && name!='' && surname!='' && address!=''){
            swal({
                title: "Please Wait",
                timer: 2000,
                imageUrl: "images/ajax_loader.gif",
                showConfirmButton: false });
           // $('#required').show();

            $.ajax({
                type: "POST",
                url: "../model/register_functions.php",
                data:
                {
                    email:email,
                    password:pass,
                    name:name,
                    surname:surname,
                    address:address,
                    genre:genre,
                    birthday:birthday

                },
                cache: false,
                success:function(data)
                {
                   console.log(data);
                    if(data==1)//Succesfull
                    {

                        swal({
                                title: "Register Successfully",
                                text: "Do you want to login now?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes",
                                closeOnConfirm: false },

                            function() {
                                window.location.href = '../../viewer/login.php';

                            });

                    }
                    else
                    {
                        swal('Fail','  f','error');
                    }
                }
            });
        }
        else
        {
            $('#myForm').validator()

        }
        $("[name='my-checkbox']").bootstrapSwitch();

    });
    /*$('form').validate({
        rules: {
            firstname: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            lastname: {
                minlength: 3,
                maxlength: 15,
                required: true
            }
        },
        highlight: function(element) {
      /      $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });*/

});
jQuery(document).ready(function () {
    "use strict";
    var options = {};
    options.ui = {
        showPopover: true,
        showErrors: true,
        showProgressBar: false
    };
    options.rules = {
        activated: {
            wordTwoCharacterClasses: true,
            wordRepetitions: true
        }
    };
    $('#password').pwstrength(options);
});
$(document).ready(function () {
    $(".birthday").dateDropdowns();

});

