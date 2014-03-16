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
            $("#Order_type_of_delivery").val("Новая Почта"); 
            $("#Order_user_address").val("Доставка Новой Почтой в ближайшее отделение");
        }
         else {
            $("#new_mail_delivery").hide();
            $("#Order_type_of_delivery").val("");
            $("#Order_settlement_delivery").val("");
            $("#Order_delivery_address").val("");
            $('#drop').val("");
            $('#warehouses').val("");
            $('#Order_user_address').val("");
        }
    });
    
    $('#drop').change(function() {
        city_id = $(this).val();
        $("#Order_settlement_delivery").val(city_id);
    });
    
    $('#drop').change(function() {
        $('#loader').show();
        city_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "/novaposhta/warehouse",
            dataType: "html",
            data: {"city_id": city_id},
            success: function (data) {
                $('#loader').hide();
                var container = $('#warehouseContainer');
                container.text('');
                container.append(data);
                $('#warehouses').change(function() {
                address = $(this).val();
                console.log(address);
                $("#Order_delivery_address").val(address);
            });
            }
        });
    });
    
    $('#remove_position').click(function () {
        var remove_id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "/cart/removeposition",
            dataType: "html",
            data: {"remove_id": remove_id},
            success: function (data) {
                $("#message_cart").html("Позиция удалена!").show();
                    setTimeout('$("#message_cart").hide();', 2600);
            }
        });
    });
    
    $('#recalculate').click(function () {
        var recalculate_id = $('#count_product').data("id");
        var recalculate_value = $('#count_product').val();
            $.ajax({
            type: "POST",
            url: "/cart/recalculate",
            dataType: "html",
            data: {"recalculate_id": recalculate_id, "recalculate_value": recalculate_value},
            success: function (data) {
                data = $.parseJSON(data);
                if (data.status) {
                     $('#total_price').text(data.total);
                     $('#count').text(data.count);
                     $('#price').text(data.total);
                     $('#block-cart span.count').text(data.count);                  
                }
            }
       });
    });

    $('.add-product').click(function () {
        var product_id = $(this).data("id");
        $("#message_cart").html("Добавляю.................").show();
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
                    $("#message_cart").html("Добавлено в корзину!").show();
                    setTimeout('$("#message_cart").hide();', 2600);
                }
            }
        });
    });
});