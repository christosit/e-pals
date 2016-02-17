//FETCH PROFILE
$(document).ready(function () {
    $(window).load(function () {
        var msg = $('#message_body').val();
        var receiver = $('.send').attr('id');
        var user_id = $('.username').text();
        console.log("User id = " + user_id);
        get_user_interests(user_id);//gia edit
        get_category_name();
        get_messages(user_id);
//loginfb();
    });
});


//$(document).ready(function(){

/**
 * Created by christos on 9/10/2015.
 */

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
$(document).ready(function () {
    $('#edit').click(function () {
        var username = $('.username').text();
        $.ajax({
            type: "POST",
            url: "../model/edit_profile.php",
            data: {
                username: username
            },
            cache: false,
            success: function (data) {
                if (data == 1) {
                    swal('', 'Your details has changed', 'success');
                }
                else {
                    swal('', 'Your details has not change', 'warning')
                }
            }
        });
    });

});


$('#menu-action').click(function () {
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
    $(this).toggleClass('active');

    if ($('.sidebar').hasClass('active')) {
        $(this).find('i').addClass('fa-close');
        $(this).find('i').removeClass('fa-bars');
    } else {
        $(this).find('i').addClass('fa-bars');
        $(this).find('i').removeClass('fa-close');
    }
});

// Add hover feedback on menu


$(document).ready(function () {

    $('.dropdown-menu a').on('click', function () {
        $('.dropdown-toggle').html($(this).html() + '<span class="caret"></span>');
    })

});


var interest_counter = 1;
$(document).ready(function () {

    $('#add').click(function () {
        var interest = $('#keyword').val();
        var interest_cat = $('#category').text();
        if (interest != '') {

            $('#table').bootstrapTable('append',
                {
                    "title": interest,
                    category: interest_cat
                });
            $('#keyword').val('');
        }
    });
});


$(document).ready(function () {
    $('#save_interest').unbind().click(function () {
        var title = [];
        var user_id = $('.username').text();
        $('#keyword').each(function () {
            var ti = $('#keyword').val();
            title.push(ti);
        });
        var category = [];

        $("#category").each(function () {
            var t = $(this).text();
            var id = $(this).attr('id');
            category.push(t);
            //interests.split(',');
        });
        console.log(title, category);
        save_interests(user_id, title, category)
    });
});


function save_interests(user_id, title, category) {
    $.ajax({
        type: "POST",
        url: "../model/interests.php",
        data: {
            choice: 0,
            user_id: user_id,
            interest: title,
            category: category
        },
        cache: false,
        success: function (data) {
            console.log(data)
            if (data == 1) {
                swal('', 'Your details has changed', 'success');
                $("#interest").modal("hide");
            }
            else {
                alert();
            }
        }
    });
}


$(document).ready(function () {
    $("#manage_interest").click(function () {
        $("#edit").modal("hide");
    });
});
$(document).ready(function () {
    $("#manage").unbind().click(function () {
        var Interest_title = [];
        $('.edit_title').each(function () {
            Interest_title.push($(this).val());//,$('.edit_category').val());
        });

        var Interest_cat = [];
        $('.edit_category').each(function () {
            Interest_cat.push($(this).val());//,$('.edit_category').val());
        });

        var Interest_id = [];
        $('.edit_title').each(function () {
            Interest_id.push($(this).attr('id'));//,$('.edit_category').val());
        });

        //    console.log(Interest_cat);
        //console.log(Interest_id);
//
        var user_id = $('.username').text();

        $.ajax({
            type: "POST",
            url: "../model/profile.php",
            data: {
                choice: 2,
                user_id: user_id,
                interest_title: Interest_title,
                interest_cat: Interest_cat,
                interest_id: Interest_id
            },
            cache: false,
            success: function (data) {
                //console.log(data);
                /*if(data== 1){
                 swal('','Your details has changed','success');}
                 else{
                 swal('','Your details has not change','warning')}*/
            }
        });
    });
});


$(document).ready(function () {
    $('.user').mouseover(function (e) {
        e.preventDefault();
        $('.update').css('visibility', 'visible');

    });
});


$(document).ready(function () {
    $(document.body).on('click', '.send_msg', function () {
        $('#myModal').modal();
        var receiver_id = $(this).attr('id');
        $('.send').attr('id', receiver_id);
    })
});

//Function send msg

$(document).ready(function () {
    //$(document.body).bind().on('click', '.send', function () {
    $('.send').unbind().click(function () {
        $.ajax({
            type: "POST",
            url: "../model/profile.php",
            data: {
                choice: 4,
                sender: $('.username').text(),
                receiver: $('.send').attr("id"),
                msg: $('#message_body').val()
            },
            cache: false,
            success: function (data) {
                console.log(data);

            }
        });


    });
});


$(document).ready(function () {
    $(document.body).on('click mouseover ', '.not', function () {
        mark_as_readed_not($(this).attr('id'));
    });
});