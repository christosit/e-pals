



//FETCH PROFILE
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}



$(document).ready(function() {
    $(window).load(function () {

        var user_id = getParameterByName('userid');
        console.log("User id = "+user_id);
    get_user_data(user_id);
    get_user_interests(user_id);//gia edit
    });
});



/**
 * Created by christos on 9/10/2015.
 */


function get_user_data(user_id) {
    var choice = 0;



    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            user_id: user_id,//kanonika prepei na stelnume panta to user_id, prepei na allaksume to 4_SESSION, pu na mporeis allakse to se $_SESSION['user_id']ok
            choice: choice
        },
        cache: false,
        success: function (data) {



                var obj = jQuery.parseJSON( data );
                var name = obj.name;
                var surname = obj.surname;
                var email = obj.email;
                var full_name = name+" "+ surname;
                $('#name').text(full_name);

                $('#name_input').val(name);
                $('#surname_input').val(surname);

                $('#email_input').val(email);


                $('#name').removeAttr( "title" );
                $('#email').removeAttr( "title" ).text(email);
                $(".user").attr("src",(obj.photo));
        }
    });
}




function get_user_interests(user_id) {
    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            user_id:user_id,//kanonika prepei na stelnume panta to user_id, prepei na allaksume to 4_SESSION, pu na mporeis allakse to se $_SESSION['user_id']ok
            choice: 1
        },
        cache: false,
        success: function (data) {
         //   console.log(data);
            var obj = jQuery.parseJSON( data );
            var counter = 1;// = obj.length;
            $.each(obj,function(i,item  ) {
                i++;
                var title = item.title;
                var category = item.category_name;
                var id = item.interest_id;
                var pathname = window.location.pathname;


                $("<tr>"+
                    "<td>"+i+"</td>"+
                    "<td><input disabled type='text' id='"+id+"' class='edit_title' value='"+title+"'></td>"+
                    "<td><input disabled type='text' class='edit_category' value='"+category+"'</td>"+"<td>").insertBefore("#head");
                console.log(title);

                $('#interest_input').val($('#interest_input').val()+title+",");
            });
        }
    });
}


$(document).ready(function() {

    $('#edit').click(function () {

        var username = $('.username').text();
        $.ajax({
            type: "POST",
            url: "../model/edit_profile.php",
            data: {
                username: username
            },
            cache: false,
            success: function (data)

            {
             if(data== 1){
                 swal('','Your details has changed','success');}
                /*else{
                 swal('','Your details has not change','warning')
             }*/
            }
        });
    });

});

$('#menu-action').click(function(){
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
    $(this).toggleClass('active');

    if ($('.sidebar').hasClass('active')){
        $(this).find('i').addClass('fa-close');
        $(this).find('i').removeClass('fa-bars');
    } else {
        $(this).find('i').addClass('fa-bars');
        $(this).find('i').removeClass('fa-close');
    }
});
