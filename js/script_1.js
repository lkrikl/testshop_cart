$(document).ready(function () {
    $('#block-cart > p').toggle(
        function () {
            $('#block-cart > div').show();
        },
        function () {
            $('#block-cart > div').hide();
        }
       
    );
    
    $('#choice_of_delivery').click(function() {
        if ($(this).is(':checked')) {
            $("#new_mail_delivery").show();
        }
         else {
            $("#new_mail_delivery").hide();
        }
    });

    $('#drop').change(function() {
        $('#loader').show();
        // @todo show loader.
        city_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/novaposhta/warehouse",
            dataType: "html",
            data: {"city_id": city_id},
            success: function (data) {
                $('#loader').hide();
                // @todo hide loader.
                var container = $('#warehouseContainer');
                container.text('');
                container.append(data);
            }

        });
    });

    $('.add-product').click(function () {
        var product_id = $(this).data("id");
        //cart_products_count++;

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
                    $('#block-cart span.count').text(data.count);
                    $(".messagecart").html("Добавлено в корзину!");
                    setTimeout('$(".messagecart").hide();', 1600);
                }
            }

        });
    });
});