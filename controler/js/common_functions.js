/**
 * Created by christos on 2/16/2016.
 */
$(document).ready(function () {
    $(window).load(function () {
        var user_id = $('.username').text();
        console.log("User id = " + user_id);
        get_user_data(user_id);
        get_user_interests(user_id);//gia edit
        get_category_name();
        get_messages(user_id);
//loginfb();
    });
});

function get_user_data(user_id) {
    var choice = 0;
    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            user_id: user_id,//kanonika prepei na stelnume panta to user_id, prepei na allaksume to 4_SESSION, pu na mporeis allakse to se $_SESSION['user_id']ok
            choice: 0
        },
        cache: false,
        success: function (data) {
            console.log(data);
            var obj = jQuery.parseJSON(data);
            var name = obj.name;
            var surname = obj.surname;
            var email = obj.email;
            var admin = obj.isAdmin;
            var address=  obj.address;
            var birth = obj.birthday;
            //alert(admin);
            if (admin == 1) {
                $('#account').append('<li><a href="/viewer/admin_profile.php" id="account"><i class="fa fa-user-secret"></i><span>Admin profile</span></a></li>');
            }
            var full_name = name + " " + surname;
            $('.name').text(name);
            $('.surname').text(surname);

            $('#address').text(address);
            $('#birthday').text(birth);
            $('#name_input').val(name);
            $('#surname_input').val(surname);
            $('#email_input').val(email);
            $('.name').removeAttr("title");
            $('#email').removeAttr("title").text(email);
            $(".user").attr("src", (obj.photo));
        }
    });
}

function get_messages(user_id) {
    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            choice: 5,
            user_id: user_id
        },
        cache: false,
        success: function (data) {
            //console.log(data);
            var obj = jQuery.parseJSON(data);
            var count = obj.length;
            $('#msg_count').text(count);
            $('#msg_list').html('');

            $.each(obj, function (i, item) {
                var name = item.name + " " + item.surname;
                var msg_id = item.id;
                var user_id = item.user_id;
                var message = item.message;
                var date = item.date_sent;
                var url = '../../viewer/profile_user.php?userid=' + user_id;
                var msg = "User <a target='_blank' href=" + url + ">" + name + "</a> says:" + " <strong> " + message + "</strong> at:"
                    + "<strong>" + date + "</strong>";
                $('#msg_list').append('<li  class="list-group-item clearfix msg" id="' + msg_id + '">' + msg + '</a></li>');

            });
            $(document.body).on('click mouseover ', '.msg', function () {
                mark_as_readed($(this).attr('id'));
            });

        }
    });


}

function mark_as_readed(msg_id) {
    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            msg_id: msg_id,
            choice: 6
        },
        cache: false,
        success: function (data) {
            console.log(data);
        }
    });

}
function mark_as_readed_not(not_id) {
    $.ajax({
        type: "POST",
        url: "../model/admin_functions.php",
        data: {
            not_id: not_id,
            choice: 8
        },
        cache: false,
        success: function (data) {


            console.log(data);
        }
    });

}



function get_user_interests(user_id) {
    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            user_id: user_id,//kanonika prepei na stelnume panta to user_id, prepei na allaksume to 4_SESSION, pu na mporeis allakse to se $_SESSION['user_id']ok
            choice: 1
        },
        cache: false,
        success: function (data) {
            //   console.log(data);
            var obj = jQuery.parseJSON(data);
            var counter = 1;// = obj.length;
            $.each(obj, function (i, item) {
                i++;
                var title = item.title;
                var category = item.category_name;
                var id = item.interest_id;
                $("<tr>" +
                    "<td>" + i + "</td>" +
                    "<td><input type='text' id='" + id + "' class='edit_title' value='" + title + "'></td>" +
                    "<td><input type='text' class='edit_category' value='" + category + "'</td>" + "<td>").insertBefore("#head");
                //console.log(title);
                $('#interest_input').val($('#interest_input').val() + title + ",");
            });
        }
    });
}



$(document).ready(function(){
    $('#show_nots').popover({
        html : true,
        content: function() {
            return $('#notificationContainer').html();
        }
    });

    $('#show_nots').click(function() {
        $('#show_msg').popover('hide');
    });


});
$(document).ready(function(){
    $('#show_msg').popover({
        html : true,
        content: function() {
            return $('#messageContainer').html();
        }
    });
    $('#show_msg').click(function() {
        $('#show_nots').popover('hide');
    });
});
function get_category_name() {
    $.ajax({
        type: "POST",
        url: "../model/interests.php",
        data: {
            choice: 3
        },
        cache: false,
        success: function (data) {
            //console.log(data);
            var obj = jQuery.parseJSON(data);
            $.each(obj, function (i, item) {
                $('.interests').append('<li><a href="#">' + item.category_name + '</a></li>');

            });
            $('.dropdown-menu a').on('click', function () {
                $('.dropdown-toggle').html($(this).html() + name + '<span class="caret"></span>');
            });
        }
    });
}
