//function show()  
//        {  
//            $.ajax({  
//                url: "/order/reloadorder",  
//                cache: false,  
//                success: function(data){  
//                    var container = $("#reloadtest")
//                    container.text('');
//                    container.append(data);  
//                    }  
//            });  
//        }  

$(document).ready(function () {
//    show();  
//    setInterval('show()',1000);  
    
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
    
    $('#choose_view_block').click(function() {
            $("#centerLayer").show();
            $("#product_block_list").hide();
    });
    $('#choose_view_list').click(function() {
            $("#centerLayer").hide();
            $("#product_block_list").show();
    });
     
    $( "#block-cart" ).focus(function() {
    alert( "Handler for .focus() called." );
    });
   
    $('#drop').change(function() {
        $('#loader').show();
        city_id = $(this).val();
        $("#Order_settlement_delivery").val(city_id);
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
                $("#Order_delivery_address").val(address);
            });
            }
        });
    });
    
    $('.remove_position').click(function () {
        var remove_id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "/cart/removeposition",
            dataType: "html",
            data: {"remove_id": remove_id},
            success: function (data) {
                $("#message_cart").html("Позиция удалена!").show();
                    setTimeout('$("#message_cart").hide();', 2600);
                    location.reload();  
            }
        });
    });
    
    $('#recalculate').click(function (e) {
        e.preventDefault();
        var recalculate_id = $('.count_product');
        recalculate_id.each(function() {
            $.ajax({
                type: "POST",
                url: "/cart/recalculate",
                dataType: "html",
                data: {"recalculate_id": $(this).data("id"), "recalculate_value": $(this).val()},
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
        location.reload();
        return false;
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
    
    $('#tabs .characteristics').click(function() {
            $("#characteristics").show();
            $("#photo_product").hide();
            $("#reviews").hide();
            $("#add_reviews_about_product").hide();
            
    });
    $('#tabs .photo_product').click(function() {
            $("#characteristics").hide();
            $("#photo_product").show();
            $("#reviews").hide();
            $("#add_reviews_about_product").hide();
    });
    $('#tabs .reviews').click(function() {
            $("#characteristics").hide();
            $("#photo_product").hide();
            $("#reviews").show();
            $("#add_reviews_about_product").show();
    });
       
    $('#send_reviews_message').click(function () {
        var product_id = $('#reviews_product_id').val();
        var reviews_message = $('#reviews_user_message').val();
        $("#message_cart").html("Добавляю.........................................").show();
            $.ajax({
            type: "POST",
            url: "/Reviews/Addcomment",
            dataType: "html",
            data: {"product_id": product_id, "reviews_message": reviews_message},
            success: function (data) {
                data = $.parseJSON(data);
                    if (data.status) {
                    $("#message_cart").html("Ошибка! Введите комментарий!").show();
                    setTimeout('$("#message_cart").hide();', 2600);
                    }
                    else {
                        $("#message_cart").html("Ваш комментарий опубликован!").show();
                        setTimeout('$("#message_cart").hide();', 2600);
                        location.reload();  
                        $("#characteristics").hide();
                        $("#photo_product").hide();
                        $("#reviews").show();
                        $("#add_reviews_about_product").show();
                    }
            }
        });
    });
    
    
    
    
    $('.user-like-product').click(function () {
        var product_id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "/cart/like",
            dataType: "html",
            data: {"product_id": product_id},
            success: function (data) {
                $("#message_cart").html("Добавлено в список желаемого товара!").show();
                    setTimeout('$("#message_cart").hide();', 2600);
            }
        });
    });
    $('#clear_like_product').click(function () {
        var clear = 1;
        $.ajax({
            type: "POST",
            url: "/cart/likeclear",
            dataType: "html",
            data: {"clear": clear},
            success: function (data) {
                    location.reload();  
            }
        });
    });
    
    $('#view_link_download_data_base').click(function () {
        var clear = 1;
        $.ajax({
            type: "POST",
            url: "/admin/settings/backupdatabase",
            dataType: "html",
            data: {"clear": clear},
            success: function (data) {
                $("#download_data_base").show();
            }
        });
    });
    
    
    
    
    
    
    
    
    
});