$(function () {

var from = 0;

    /*Показать еще 3 товара*/
$('.show-more').click(function(event){
	from += 3;
	var to = 3;
	var dataAjax = 'from='+from+'&to='+to;
	$.ajax({
		  type: 'POST',
		  url: 'ajax/show_more.php',
		  data: dataAjax,
		  success: function(data){
		   if (data == 'false') {
		   alert('Что-то пошло не так, обновите страницу и попробуйте еще раз');
		   }else{
		   	var res = jQuery.parseJSON(data);

		   	for (i = 0; i <= res.length; i++) {
		   	$('.screen-main--products-template').append("<li><a href=index/single/?s="+res[i].id+"><div class='product-img'><img src=v/assets/"+res[i].path_mini+"></div><div class='product-name-and-price'><div>" +res[i].name_mini + "</div><div><span class='product-price'>&#8364;." + res[i].price + "</span><br></div></div></a></li>");
		   }
		  }
	}
		});
});

    /*Отправляем данные оформления заказа*/
$('.order_submit').click(function(event) {
    event.preventDefault();
    cartCookie = $.cookie('cart');
    var serializeForm = $("#order_form").serialize() + '&ord=' + cartCookie;
    
       $.ajax({
          type: 'POST',
          url: '/my_shop/ajax/go_order.php',
          data: serializeForm,
          success: function(data){
             if (data[0] == 'О') {
                popUpErrorMessage(data);
            }else{
                popUpMessage(data);
                $('#order_form')[0].reset();
                $.cookie('cart', ' ', {
                    expires: -1,
                    path: '/'
                });
            }
          }
        });
    });

    

	$(".minus").click(function(event) {
		countInput = $(this).index();
		valInput = +($(this).parents().eq(countInput).find('input').attr("value"));
		if (valInput <= 1) {
			return;
		}else{
			valInput -= 1;
			$(this).parents().eq(countInput).find('input').attr("value", valInput);
			$(this).parent().parent().find('.add').attr("how", valInput);
		}
	});
	$(".plus").click(function(event) {
		countInput = $(this).index();
		valInput = +($(this).parents().eq(countInput).find('input').attr("value"));
		if (valInput >= 99) {
			return;
		}else{
			valInput += 1;
			$(this).parents().eq(countInput).find('input').attr("value", valInput);
			$(this).parent().parent().find('.add').attr("how", valInput);
		}
	});
    
    function popUpMessage(message){
		$(".pop-message").html(message);
		$(".pop-message").fadeIn('300', function() {
			$(".pop-message").delay(3000).fadeOut('300', function() {
				$(".pop-message").html('');
			});
		});
	}
     function popUpErrorMessage(message){
		$(".error-message").html(message);
		$(".error-message").fadeIn('300', function() {
			$(".error-message").delay(3000).fadeOut('300', function() {
				$(".error-message").html('');
			});
		});
	}

    
    var cartCookie = $.cookie('cart');
    var cartArray, productListIndex;
    var splitCartArray;
    var redactCountProd;

if (cartCookie == undefined) {
	$(".cart-count-index").html("0");
}else{
	cartCookie = $.cookie('cart');
	cartArray = cartCookie.split(",");
	$(".cart-count-index").html(cartArray.length);
}

	$(".add").click(function(event) {
		var idProd = $(this).attr('id');
		var howProduct = $(this).attr('how');
		var setCartCookie = idProd+":"+howProduct;
		
		if (cartCookie == undefined) {
			$.cookie('cart', setCartCookie, {
				expires: 7,
				path: '/'
			});
			cartCookie = $.cookie('cart');
			cartArray = cartCookie.split(",");
			$(".cart-count-index").html(cartArray.length);
			popUpMessage('Товар добавлен в корзину');
		}else{
			cartCookie = $.cookie('cart');	
			var oldCartCookie = cartCookie;
			var updateCartCookie = oldCartCookie+","+setCartCookie;

			$.cookie('cart', updateCartCookie, {
				expires: 7,
				path: '/'
			});
			cartCookie = $.cookie('cart');
			cartArray = cartCookie.split(",");
			$(".cart-count-index").html(cartArray.length);
			popUpMessage('Товар добавлен в корзину');
		}
	});
    
    $(".cart-delete-prod").click(function(event) {
		cartCookie = $.cookie('cart');
		cartArray = cartCookie.split(",");
		if (cartArray.length <= 1) {
			$.cookie('cart', ' ', {
				expires: -1,
				path: '/'
			});
			location.reload();
		}else{
			var deleteIndexProd = $(this).parents('.cart--list').find('.cart--list-counter').attr('count');
            alert(deleteIndexProd);
			cartCookie = $.cookie('cart');
			cartArray = cartCookie.split(",");
			cartArray.splice(deleteIndexProd, 1);
			var redactCartArray = cartArray.join();
			$.cookie('cart', redactCartArray, {
					expires: 7,
					path: '/'
				});
			/*location.reload();*/
			/*$('.cart--list').eq(deleteIndexProd).remove();*/
            $(this).parents('.cart--list').remove();
			$(".cart-count-index").html(cartArray.length);
			/*getAllPrice();*/
		}
	});
    
    /*Манипулируем кукисом при изменении кличества товара*/
	$(".cart-minus").click(function(event) {
		countInput = $(this).index();
		productListIndex = $(this).parents('.cart--list-counter').attr('count');
		valInput = +($(this).parents().eq(countInput).find('input').attr("value"));
		if (valInput <= 1) {
			return;
		}else{
			valInput -= 1;
			$(this).parents().eq(countInput).find('input').attr("value", valInput);
			cartCookie = $.cookie('cart');
			cartArray = cartCookie.split(",");
			splitCartArray = cartArray[productListIndex].split(":");
			splitCartArray[1] = valInput;
			cartArray[productListIndex] = splitCartArray[0]+":"+splitCartArray[1];
			redactCountProd = cartArray.join();
			/*cartCookie = $.cookie('cart');*/
			$.cookie('cart', redactCountProd, {
				expires: 7,
				path: '/'
			});
			/*getAllPrice();*/
			/*$(this).parent().parent().find('.add').attr("how", valInput);*/
		}
	});
	$(".cart-plus").click(function(event) {
		countInput = $(this).index();
		productListIndex = $(this).parents('.cart--list-counter').attr('count');
		valInput = +($(this).parents().eq(countInput).find('input').attr("value"));
		if (valInput >= 99) {
			return;
		}else{
			valInput += 1;
			$(this).parents().eq(countInput).find('input').attr("value", valInput);
			cartCookie = $.cookie('cart');
			cartArray = cartCookie.split(",");
			splitCartArray = cartArray[productListIndex].split(":");
			splitCartArray[1] = valInput;
			cartArray[productListIndex] = splitCartArray[0]+":"+splitCartArray[1];
			redactCountProd = cartArray.join();
			/*cartCookie = $.cookie('cart');*/
			$.cookie('cart', redactCountProd, {
				expires: 7,
				path: '/'
			});
			/*getAllPrice();*/
			/*$(this).parent().parent().find('.add').attr("how", valInput);*/
		}
	});
    
    $(".order_status_submit").click(function(event) {
		event.preventDefault(); 
		var serializeOrderForm = $(this).parents('#order_status_form').serialize();
		var getUpdateId = $(this).attr('update-id');
		var dataForUpdateOrder = serializeOrderForm + '&update-id=' + getUpdateId;
		
		$.ajax({
		  type: 'POST',
		  url: '/my_shop/ajax/update_order_status.php',
		  data: dataForUpdateOrder,
		  success: function(data){
		   popUpMessage(data);
		  }
		});

	});
	

	


});
