var handler = StripeCheckout.configure({
  key: 'pk_test_CHVcfMnYLGNOf93388c1JSEG',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    console.log(token);
    var data = {

      stripeToken: token.id,
      email: token.email,
      amount: 999

    };

    httpRequest('POST', '/payment/', data, function (response) {
      console.log('Response from server: ', response)    
    });

  }
});

// You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Julie\'s Shop',
    description: 'Hot dog lunch',
    zipCode: true,
    amount: 999
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});