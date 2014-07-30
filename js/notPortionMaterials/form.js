!function ($){
	"use strict";

	$(document)
		.ready(function(){
			$.application.form.ajax.success['assign-portion-form'] =
				function(data, textStatus, jqXHR){
					if(data.error == false){
						/*var $form = $(this);
						var $modal = $form.closest('.modal');
						$modal.modal('hide');*/
						window.location.reload();
					}
				};
		});
}(window.jQuery);