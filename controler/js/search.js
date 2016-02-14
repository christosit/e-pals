/**
 * Created by christos on 2/14/2016.
 */

$(document).ready(function(){
    $(".search").keyup(function()
    {
        var inputSearch = $(this).val();
        var dataString = 'searchword='+ inputSearch;
        if(inputSearch!='')
        {
            $.ajax({
                type: "POST",
                url: "../model/search.php",
                data: {query:inputSearch},
                cache: false,
                success: function(html)
                {
                   // console.log(html);
                    var data = $.parseJSON(html);
                    //$('.divResult').css('display:block');
                    $('#divResult').show();


                    $.each(data, function(i,item){
                        var photo = item.photo;
                        var name = item.name +' '+item.surname;
                        console.log(name);
                        $("#divResult").append(
                            '<div class="display_box" align="left"><img src="'+photo+'" class="searchImg"/><span class="name">'+name+'</span></div>');
                    });
                }
            });
        }return false;
    });
});

    $("#divResult").on("click",function(e){
        var $clicked = $(e.target);
        var $name = $clicked.find('.name').html();
        var decoded = $("<div/>").html($name).text();
        $('#inputSearch').val(decoded);
    });
    $(document).on("click", function(e) {
        var $clicked = $(e.target);
        if (! $clicked.hasClass("search")){
            jQuery("#divResult").fadeOut();
        }
    });
    $('#inputSearch').on(function(){
        jQuery("#divResult").fadeIn();
    });
