$(document).ready(function () {
    $('#block-cart > p').toggle(
        function () {
            $('#block-cart > div').show();
        },
        function () {
            $('#block-cart > div').hide();
        }

    );

    $('.add-tovar').click(function () {
        var product_id = $(this).data("id");
        cart_products_count++;

        $('#block-cart span.count').html(cart_products_count);

        $(document).mousemove(function (pos) {
                (".messagecart").css('left', (pos.pageX + 10) + 'px').css('top', (pos.pageY + 10) + 'px');
            }
        );

        $(".messagecart").html("Добавляю...").show();
        $.ajax({
            type: "POST",
            url: "/cart",
            dataType: "html",
            data: {"tovarid": product_id},
            success: function (data) {
                $(".messagecart").html("Все круто!sdfsf wefr ew fef wf wf w");
                setTimeout('$(".messagecart").hide();', 1600);
            }

        });
    });
});