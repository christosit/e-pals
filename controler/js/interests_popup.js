$(document).ready(function () {
    $("#other").click(function () {
        $("#text_other").show();

    });


    function toggle_visibility(id) {
        var e = document.getElementById(id);
        if(e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }

});