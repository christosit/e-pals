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
$(document).ready(function(){
    $("#toTop").click(function() {
        $('html, body').animate({
            scrollTop: $(".article_profile").offset().top
        }, 1000);
    });
});
