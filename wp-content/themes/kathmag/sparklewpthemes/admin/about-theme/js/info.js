( function( $ ) {

	'use strict';

	$(document).ready(function($){

		$('.sparkle-info-notice .btn-dismiss').on('click',function(e) {

			e.preventDefault();

			var $this = $(this);

			var userid = $(this).data('userid');
			var nonce = $(this).data('nonce');

			$.ajax({
				type     : 'GET',
				dataType : 'json',
				url      : ajaxurl,
				data     : {
					'action'   : 'education_web_dismiss',
					'userid'   : userid,
					'_wpnonce' : nonce
				},
				success  : function (response) {
					if ( true === response.status ) {
						$this.parents('.sparkle-info-notice').fadeOut('slow');
					}
				}
			});
		});
	});

} )( jQuery );
