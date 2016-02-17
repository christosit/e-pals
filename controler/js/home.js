/**
 * Created by christos on 10/28/2015.
 */
//FETCH PROFILE
$(document).ready(function() {
    $(window).load(function () {
        var user_id = $('.username').text();
        get_all_posts();
    });
});
//Insert Post
$(document).ready(function() {
   $("#submit").click(function(){
           var title =  $('#post_title').val();
       var msg =  $('#text-box').val();
       var user_id = $('.username').text();


       /*if(title == ''){
           //elegcos
           alert("error");
           return;
       }*/
       if(msg == ''){
           //elegcos
           alert("error");
           return;
       }
       save_post(title,msg,user_id);
});
});

function save_post( title, msg, user_id) {
    alert("id"+user_id);
    $.ajax({
        type: "POST",
        url: "../../model/home.php",
        data: {
            user_id: user_id,
            title:title,
            msg: msg,
            choice: 0
        },
        cache: false,
        success: function (data) {
            if (data !='error'){
                var obj = jQuery.parseJSON(data);
                //swal("Great","Nice post! :)","success");
                var id = obj.post_id;
                get_post(id);
            }
            else{
                swal("Error!","Something went wrong :(","warning");
            }
        }
    });
}
function get_post(post_id) {
    $.ajax({
        type: "POST",
        url: "../../model/home.php",
        data: {
            choice: 1,
            post_id: post_id
        },
        cache: false,
        success: function (data) {
            console.log(data);
            var obj = $.parseJSON(data);
                var id = obj.id;
                var msg = obj.mesage;
                var user_id = obj.from_user;
                var date = obj.date_posted;
                var name = obj.name;

                var postTimestamp = 'Posted on: ' + new Date().toUTCString();
                $( "#news" ).first().prepend("<div class='feed-item blog'>" +
                    "<div class='icon-holder'><div class='icon'>" +
                    "<img src='https://lh3.googleusercontent.com/-Az9OhFIaxEY/AAAAAAAAAAI/AAAAAAAAAAA/iHtDLHxQMFc/photo.jpg' class='icon user'></div>" +
                    "</div>" +
                    "<div class='text-holder col-3-5'>" +
                    "<div class='feed-title'>" + name + "</div>" +
                    "<div class='feed-description'>" + msg + "</div>" + "<p class='post-timestamp'>" + postTimestamp + "</p>" +
                    "</div><!--End of Text Holder-->"
                ).fadeIn();
            $('#text-box').val('');
        }
    });
}



function get_all_posts(){
    $.ajax({
        type: "POST",
        url: "../../model/home.php",
        data: {
            choice: 4
        },
        cache: false,
        success: function (data) {
        //    console.log(data);
            var d = $.parseJSON(data);

            $.each(d,function(i,obj  ) {
                var id = obj.id;
                var msg = obj.mesage;
                var user_id = obj.from_user;
                var date = obj.date_posted;
                var name = obj.name;
                $('#news').append("<div class='feed-item blog'>" +
                    "<div class='icon-holder'><div class='icon'>" +
                    "<img src='https://lh3.googleusercontent.com/-Az9OhFIaxEY/AAAAAAAAAAI/AAAAAAAAAAA/iHtDLHxQMFc/photo.jpg' class='icon user'></div>" +
                    "</div>" +
                    "<div class='text-holder col-3-5'>" +
                    "<div class='feed-title'>" + name + "</div>" +
                    "<div class='feed-description'>" + msg + "</div>" + "<p class='post-timestamp'>" + date + "</p>" +
                    "</div><!--End of Text Holder-->"
                );

            });
        }
    });
}

$(document).ready(function(){
    $("#toTop").click(function() {
        $('html, body').animate({
            scrollTop: $(".article_profile").offset().top
        }, 1000);
    });
});
