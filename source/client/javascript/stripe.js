var handler = StripeCheckout.configure({
    key: 'pk_test_CHVcfMnYLGNOf93388c1JSEG',
    image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
    locale: 'auto',
    token: function(token) {
      console.log("token Received:", token);

      collectPayment(token.id, token.email, cartAmountInCents);
      // You can access the token ID with `token.id`.
      // Get the token ID to your server-side code for use.
    }
  });
  
  function stripeClickHandler(e){
    // Open Checkout with further options:
    handler.open({
      name: 'Julie\'s Shop',
      description: 'E-Commerce Shopping',
      amount: cartAmountInCents
    });
    e.preventDefault();
  };
  
  // Close Checkout on page navigation:
  window.addEventListener('popstate', function() {
    handler.close();
  });