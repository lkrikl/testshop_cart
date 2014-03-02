var products = [];  
$(document).ready(function() {
  
    
  $('#block-cart > p').toggle(
        function() {
            $('#block-cart > div').show();
        },
        function() {
            $('#block-cart > div').hide();
        }
                  
 );
 
 
var newcount = 0;

$('.add-tovar').click(function() {
    //var allprice = $('#block-cart span#price').attr("price");
    var allprice = $('#block-cart span#price').data("price");
    var price = $(this).data('price');
    var tovarid = $(this).data("id");
    
    newprice = Number(allprice) + Number(price);
    newcount ++;
    
    if (typeof products[tovarid]  === "undefined") {
        products[tovarid] = { "price":  price, "count": newcount };
    } 
    
    
    $('#block-cart span#price').html(newprice+' $').attr("price",newprice);
    $('#block-cart span.count').html(newcount);
    
    $(document).mousemove(function(pos) {
        (".messagecart").css('left',(pos.pageX+10)+'px').css('top',(pos.pageY+10)+'px');
        
    }
            
);
 
$(".messagecart").html("Добавляю...").show(); 
$.ajax( {
    type: "POST",
    url: "/cart",
    dataType: "html",
    data: {"newprice":newprice, "count": newcount, "products" : products}, 
    success: function(data) {
        $(".messagecart").html("Все круто!sdfsf wefr ew fef wf wf w");
        setTimeout('$(".messagecart").hide();',1600);
    }

});
});
});
//var newcount = 0;
//function addToCart(tovarid, element) {
//   // console.log(products);
//    //console.log('test');
//      //var allprice = $('#block-cart span#price').attr("price");
//    var allprice = $('#block-cart span#price').data("price");
//    var price = $(element).data('price');
//    //var tovarid = $(this).data("id");
//    //console.log(tovarid);
//    
//    newprice = Number(allprice) + Number(price);
//    newcount ++;
//    
//    if (typeof products[tovarid]  === "undefined") {
//        products[tovarid] = { "price":  price, "count": newcount };
//    } else {
//        products[tovarid].count++;
//    }
//    
//    $('#block-cart span#price').html(newprice+' $').attr("price",newprice);
//    $('#block-cart span.count').html(newcount);
//    
//    $(document).mousemove(function(pos) {
//        $(".messagecart").css('left',(pos.pageX+10)+'px').css('top',(pos.pageY+10)+'px');
//        
//    }
//            
//);
// 
//$(".messagecart").html("Добавляю...").show(); 
//data = {"newprice":newprice, "count": newcount, "products" : products};
//console.log(data);
////console.log(data);
//$.ajax( {
//    type: "POST",
//    url: "/cart",
//    dataType: "html",
//    data: data, 
//    success: function(data) {
//        $(".messagecart").html("Все круто!sdfsf wefr ew fef wf wf w");
//        console.log(data);
//        setTimeout('$(".messagecart").hide();',1600);
//    }
//
//});
//}