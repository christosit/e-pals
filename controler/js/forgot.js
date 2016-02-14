$(document).ready(function() {
    $('#forgot').click(function () {

        var pass = $('#password').val();//Dame valeis to id tou textbox
        var conf_pass = $('#conf_password').val();//Dame valeis to id tou textbox
        var code =getUrlParameter('code');

        if (pass == conf_pass) {
        $.ajax(
            {
                type: 'POST',
                url: '../model/forgot_pass.php',
                data:{
                    pass:pass,
                    code:code
                },
                success: function(data){
                    swal({
                        title: "Do you to go login?",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes",
                        closeOnConfirm: false },

                        function() {
                            window.location.href = '../../viewer/index.php';

                         });
                }


            });

    }
    });
});



function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
