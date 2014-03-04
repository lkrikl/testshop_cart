$(document).ready(function () {
    

    $('.clear_cart').click(function () {
        var product_id = $(this).data("id");
        //cart_products_count++;

        //$('#block-cart span.count').html(cart_products_count);

        

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