window.addEventListener('DOMContentLoaded', function() {
  var orderIdInput = document.getElementById('order_id');
  var productValueInput = document.getElementById('product-value');

  // Generate random order ID with 6 digits
  var orderId = Math.floor(Math.pow(10, 5) + Math.random() * 9 * Math.pow(10, 5));
  
  // Set the values of the input fields
  orderIdInput.value = orderId;
  productValueInput.value = '₹499';
});