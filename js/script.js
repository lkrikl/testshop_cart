var products = [];
$(document).ready(function () {
    console.log(cart_products_count);
    $('#block-cart > p').toggle(
        function () {
            $('#block-cart > div').show();
        },
        function () {
            $('#block-cart > div').hide();
        }

    );

    $('.add-tovar').click(function () {
        //var allprice = $('#block-cart span#price').attr("price");
        var allprice = $('#block-cart span#price').data("price");
        var price = $(this).data('price');
        var tovarid = $(this).data("id");

        newprice = Number(allprice) + Number(price);
        cart_products_count++;

        $('#block-cart span#price').html(newprice + ' $').attr("price", newprice);
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
            data: {"tovarid": tovarid},
            success: function (data) {
                $(".messagecart").html("Все круто!sdfsf wefr ew fef wf wf w");
                setTimeout('$(".messagecart").hide();', 1600);
            }

        });
    });
});