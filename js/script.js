$(document).ready(function () {
    $('#block-cart > p').toggle(
        function () {
            $('#block-cart > div').show();
        },
        function () {
            $('#block-cart > div').hide();
        }

    );

    $('.add-product').click(function () {
        var product_id = $(this).data("id");
        cart_products_count++;

        $('#block-cart span.count').html(cart_products_count);
        
        $(".messagecart").html("Добавляю...").show();

        $.ajax({
            type: "POST",
            url: "/cart",
            dataType: "html",
            data: {"product_id": product_id},
            success: function (data) {
                data = $.parseJSON(data);
                if (data.status) {
                    $('#price').text(data.total);
                    $(".messagecart").html("Добавлено в корзину!");
                    setTimeout('$(".messagecart").hide();', 1600);
                }
            }

        });
    });
});