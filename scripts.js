jQuery(document).ready(function($) {

	$( document ).on( 'submit', '#wptt_cereal_form', function(event){

		event.preventDefault();

		var form       = $(this);
		var formaction = $(form).attr('action');

		$(form).ajaxSubmit({
			data: {
				action: formaction,
				_nonce: WPTTCereal.wptt_cereal
			}, // data
			type: 'POST',
			clearForm: false,
			dataType: 'json',
			url: WPTTCereal.ajaxurl,
			success: function( responseText, statusText, xhr, $form ){
				console.log( responseText );

			}
		}); // ajaxSubmit

	});

});
