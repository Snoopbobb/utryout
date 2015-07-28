$(function(){
	var StripeBilling = {
		init: function(){
			this.form = $('#billing-form');

			this.submitButton = this.form.find('input[type=submit]');
			this.submitButtonValue = this.submitButton.val();

			var stripeKey = $('meta[name="publishable-key"]').attr('content');
			Stripe.setPublishableKey(stripeKey);

			this.bindEvents();
		},

		bindEvents: function() {
			this.form.on('submit', $.proxy(this.sendToken, this));
		},

		sendToken: function(event) {
			this.submitButton.val('').addClass('loading').prop('disabled', true);

			Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));

			event.preventDefault();
		},

		stripeResponseHandler: function(status, response) {

			if(response.error) {

				this.form.find('.payment-errors').show().text(response.error.message);

				return this.submitButton.prop('disabled', false).val(this.submitButtonValue).removeClass('loading');
			}


			$('<input>', {
				type: 'hidden',
				name: 'stripe-token',
				value: response.id
			}).appendTo('#post-tryout');


			$('<input>', {
				type: 'hidden',
				name: 'stripe-email',
				value: $('#stripe-email').val()
			}).appendTo('#post-tryout');

			$('.modal').modal('toggle');
			
			$("#post-tryout").submit();
		}
	};

	StripeBilling.init();

	// $('#post-tryout').submit(function(event){
	//     if(true) { 
	//        event.preventDefault();  
	//     }  
 //  	});

	// $('#post-tryout').submit(function(e) {
	// 	// validation code here
	// 	e.preventDefault();

 //    	if(valid) {
 //      		event.preventDefault();
 //    	}
	// });
});
