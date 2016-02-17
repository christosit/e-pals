var MIN_LENGTH = 1;
var url = "../model/interests.php";
$( document ).ready(function() {
    $("#keyword").keyup(function() {
        var keyword = $("#keyword").val();

        if (keyword.length >= MIN_LENGTH) {
            $.ajax({
                type: "POST",
                url:url,
                data: {
                    keyword: keyword,
                    choice: 1
                },
                cache: false,
                success: function (data) {
                    console.log(data);
                    $('.results').html('');
                    var results = jQuery.parseJSON(data);
                    $(results).each(function(key, value) {
                        $('.results').append('<div class="item">' + value + '</div>');
                    });

                    $('.item').click(function() {
                        var text = $(this).html();
                        $('#keyword').val(text);
                    })

                }
            });
        } else {
            $('.results').html('');
        }



        $("#keyword").blur(function(){
                $(".results").fadeOut(500);
            })
            .focus(function() {
                $(".results").show();
            });
    });
});