var MIN_LENGTH = 1;
$(document).ready(function() {
            $(document.body).on('keyup', '.admin_keyword', function () {

                var keyword = $(this).val();
                var id = $(this).attr("id");//2
                var selector = '#'+id+'.results';
                if (keyword.length >= MIN_LENGTH) {
                    $.ajax({
                        type: "POST",
                        url: "../model/interests.php",
                        data: {
                            keyword: keyword,
                            choice: 2
                        },
                        cache: false,
                        success: function (data) {


                            console.log(data);
                            $(selector).html('');
                            var results = jQuery.parseJSON(data);
                            $(results).each(function (key, value) {
                                $(selector).append('<div class="item">' + value + '</div>');
                            });

                            $('.item').click(function () {
                                $('#'+id+'.admin_keyword').val($(this).html());
                                $('.item').hide();
                            })

                        }
                    });
                } else {
           return;

        }


        $("#keyword").blur(function () {
                $(".results").fadeOut(500);
            })
            .focus(function () {
                $(".results").show();
            });
    });
});