<?php include_once 'process.php'; ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
  <link rel="stylesheet" href="css/style1.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      getCartItem();
      function getCartItem(){
        $.ajax({
          url : "process.php",
          method : "POST",
          data : {getCart:1},
          success : function(data){
            $("#cart_product").html(data);
          }
        })
      }

    $("body").delegate("#remove","click",function(event){
      var remove = $(this).parent().parent().parent();
      var remove_id = remove.find("#remove").attr("remove_id");
      $.ajax({
        url : "process.php",
        method  : "POST",
        data  : {removeItemFromCart:1,rid:remove_id},
        success : function(data){
          $(".shopping-cart").html(data);
          getCartItem();
        }
      })
    })

});
</script>

</head>

<body>

  <h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div id="cart_product">
    
  </div>

<!--  
    <div class="product-image">
      <img src="images/checkout-1.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">555</div>
      <p class="product-description">55555</p>
    </div>
    <div class="product-price">1</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price"></div>
  </div> --> 


  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal"> </div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax"> </div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping"> </div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total"> </div>
    </div>
  </div> 

      <button class="checkout">Checkout</button>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/checkout.js"></script>




</body>

</html>
