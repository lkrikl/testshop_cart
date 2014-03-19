$(document).ready(function () {
    
        

     $('#clear_looking').click(function () {
        $.ajax({
            type: "POST",
            url: "/looking/clear",
            dataType: "html",
            success: function (data) {
                location.reload();  
            }
        }); 
    });
    
    $('.clear_cart').click(function () {
        var product_id = $(this).data("id");
        var count = 0;
        var price = 0;
        $('#block-cart span.count').html(count);
        $('#price').text(price);
        

        $(".messagecart").html("Подготовка...").show();
        $.ajax({
            type: "POST",
            url: "/cart/clear",
            dataType: "html",
            data: {"tovarid": product_id},
            success: function (data) {
                $(".messagecart").html("Корзина очищена!");
                setTimeout('$(".messagecart").hide();', 1600);
            }

        });
    });
});