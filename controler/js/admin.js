/**
 * Created by christos on 10/3/2015.
 */
//FETCH PROFILE
$(document).ready(function () {
    $(window).load(function () {

        var user_id = $('.username').text();
        console.log("User id = " + user_id);

        get_interests();
        top_categories();
    });
});


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
            console.log(data);
            var obj = jQuery.parseJSON(data);
            var name = obj.name;
            var surname = obj.surname;
            var email = obj.email;

            var full_name = name + " " + surname;
            $('#name').text(full_name);

            $('#name_input').val(name);
            $('#surname_input').val(surname);

            $('#email_input').val(email);


            $('#name').removeAttr("title");
            $('#email').removeAttr("title").text(email);
            var counter=1;
            $(".user").attr("src", (obj.photo));


        }
    });
}


function get_user_data_all(user_id) {
    var choice = 9;

    $.ajax({
        type: "POST",
        url: "../model/profile.php",
        data: {
            user_id: user_id,//kanonika prepei na stelnume panta to user_id, prepei na allaksume to 4_SESSION, pu na mporeis allakse to se $_SESSION['user_id']ok
            choice: choice
        },
        cache: false,
        success: function (data) {
            console.log(data);
            var obj = jQuery.parseJSON(data);
            $.each(obj,function(i,item  ) {
                var user_id = item.user_id;
                var name = item.name;
                var surname = item.surname;
                var email = item.email;
                var admin = item.isAdmin;


                $('#table_account').bootstrapTable('append',
                    {
                        "counter": user_id,
                        "name": name,
                        surname: surname,
                        "email": email,
                        "admin": admin
                    });
            });
        }
    });
}


/*function get_category_name(){
 $.ajax({
 type: "POST",
 url: "../model/interests.php",
 data: {
 choice: 2
 },
 cache: false,
 success: function (data) {
 console.log("ok"+data);
 var obj = jQuery.parseJSON(data);
 $.each(obj,function(i,item  ) {
 var name = item.category_name;
 $('.category_row').append("<ul class='dropdown-menu category'><li><a href='#'>"+name+"</a></li></ul>");
 });
 $('.dropdown-menu a').on('click', function () {
 $('.dropdown-toggle').html($(this).html() +  name  + '<span class="caret"></span>');
 });
 }
 });
 }
 */
$(document).ready(function () {
    $('#interests').click(function () {

        $("#div_statistics").slideUp();
        $("#div_account").slideUp();
        $("#div_interests").css('visibility', 'visible');
        $("#div_interests").slideDown();
        /* affix the navbar after scroll below header */

    })
});
$(document).ready(function () {
    $('#account').click(function () {
        $("#div_account").slideUp();
        $("#div_interests").slideUp();
        $("#div_statistics").css('visibility', 'visible');
        $("#div_statistics").slideDown();
    });
});


$(document).ready(function () {
    $('#statistics').click(function () {
        $("#div_statistics").slideUp();
        $("#div_interests").slideUp();
        $("#div_account").css('visibility', 'visible');
        $("#div_account").slideDown();

    });
    /* $.getJSON("test.php", function (result) {

     var labels = [],data=[];
     for(var item in result){
     labels.push(result[item].slice(0,1).toString());
     data.push(result[item].slice(1,2).toString());
     }

     var tempData = {
     labels : labels,
     datasets : [{
     fillColor : "rgba(172,194,132,0.4)",
     strokeColor : "#ACC26D",
     pointColor : "#fff",
     pointStrokeColor : "#9DB86D",
     data : data
     }]
     };

     var temp = document.getElementById('myCart').getContext('2d');
     var lineChart = new Chart(temp).Line(tempData);

     });
     */
});
$(document).ready(function () {
    $('#myTab').tabCollapse();

});

function get_interests() {
    $.ajax({
        type: "POST",
        url: "../model/admin_functions.php",
        data: {
            choice: 1
        },
        cache: false,
        success: function (data) {
            // console.log(data);
            var obj = jQuery.parseJSON(data);
            var counter = 1;// = obj.length;
            $.each(obj, function (i, item) {
                i++;

              //
                var title = item.title;
                var category = item.category_name;
                var id = item.interest_id;
                $('#table').bootstrapTable('append',
                                            {
                                                "uniqueId":id,
                                                "counter": counter,
                                                "title": title,
                                                category: category,
                                                "edit": "<button class='btn btn-sm btn-danger edit' id='"+id+"' data-row='"+counter+"'> <span class='glyphicon glyphicon-pencil'></span></button>"});
                counter++;
            });
        }
    });
}

function top_categories() {
    $.ajax({
        type: "POST",
        url: "../model/admin_functions.php",
        data: {
            choice: 7
        },
        cache: false,
        success: function (data) {
            // console.log(data);
            var obj = jQuery.parseJSON(data);
            var counter = 0;// = obj.length;
            $.each(obj, function (i, item) {
                var title = item.title;
                var category = item.category_name;
                var id = item.interest_id;
                $("#category").append(
                    "<li>" + category + "</li>");
                if (i == 9) {
                    return false;
                }
                i++;
                console.log('i:' + i);

            });
        }
    });
}


$(document).ready(function () {
    var editing = 0;
    $('#enable_edit').click(function () {
        if (editing == 0) {//Enable it
            $('.admin_keyword').prop('disabled', false);
            $(this).removeClass("btn btn-primary").addClass("btn btn-danger").text("Edit is ON!");
            console.log('Editing is ON');
            editing = 1;
        }
        else {
            $('.admin_keyword').prop('disabled', true);
            $(this).removeClass("btn btn-danger").addClass("btn btn-primary").text("Edit is OFF!");
            console.log('Editing is OFF');
            editing = 0;
        }
    });
});

$(document).ready(function () {
    $('#save_changes').unbind().click(function () {
       /* swal({
                title: "Save Changes?",
                text: "Make sure you double-checked your changes!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, save Changes!",
                closeOnConfirm: true
            },
            function () {

                get_data();
            });
        function get_data() {

            var data = [];
            $('.admin_keyword').each(function () {
                var new_data = $(this).attr("id") + ',' + $(this).val();
                data.push(new_data);//,$('.edit_category').val());

            });
            console.log(data);
            //save_changes(data);
        }

*/
        //console.log(JSON.stringify();



    });
});


$(document).ready(function () {
    /* affix the navbar after scroll below header */
    $('#nav').affix({
        offset: {
            top: $('header').height() - $('#nav').height()
        }
    });

    /* highlight the top nav as scrolling occurs */
    $('body').scrollspy({target: '#nav'})

    /* smooth scrolling for scroll to top */
    $('.scroll-top').click(function () {
        $('body,html').animate({scrollTop: 0}, 1000);
    })

    $('#nav').affix({
        offset: {
            top: $('header').height()
        }
    });

    $('#sidebar').affix({
        offset: {
            top: 500
        }
    });
});


$(document).ready(function(){
    $(document.body).on('click', '.edit', function () {
        var int_id = $(this).attr('id');
        var a= $('#table').bootstrapTable('getRowByUniqueId',int_id );
        console.log(a);
        swal({
            title: "Edit interent",
            text: "Write something interesting:",
            type: "input",
            inputValue:a.title,
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: a.title },
            function(inputValue){
                if (inputValue !='')
                    save_changes(int_id, inputValue);
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                swal("Nice!", "You wrote: " + inputValue, "success");
            });
        function save_changes(id,value) {
            $.ajax({
                type: "POST",
                url: "../model/admin_functions.php",
                data: {
                    choice: 5,
                    id: id,
                    value:value
                },
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data == '1') {
                        swal("", "Everything is OK", "success");
                        $('#table').bootstrapTable('updateByUniqueId', {
                            id: int_id,
                            row: {
                            "title": value
                        }

                        });
                    }

                }
            });
        }
    });
});