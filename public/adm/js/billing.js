$(document).ready(function(){
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
				name: 'stripeToken',
				value: response.id
			}).appendTo(this.form);

			// this.form[0].submit();
		}
	};

	StripeBilling.init();

	// $('#submit-button').submit(function(event) {
	// 	// validation code here
 //    	if(valid) {
 //      		event.preventDefault();
 //    	}
	// });
});
