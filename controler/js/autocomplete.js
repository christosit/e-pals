var MIN_LENGTH = 1;

$( document ).ready(function() {
    $("#keyword").click(function() {
        console.log("come");
        var keyword = $(this).val();

            $.ajax({
                type: "POST",
                url:"../model/interests.php",
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
                        //$('.results').append('<div class="item">' + value + '</div>');
                    });

                    $('.item').click(function() {
                        var text = $(this).html();
                        $('#keyword').val(text);
                    })

                }
            });



        $("#keyword").blur(function(){
            $(".results").fadeOut(500);
        })
            .focus(function() {
                $(".results").show();
            });
    });
});