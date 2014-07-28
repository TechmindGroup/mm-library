!function ($){
	"use strict";

	$(document)
		.ready(function(){
			$('.grid-view [data-need-confirm="true"]')
				.on('click',function(e) {
					var $this = $(this);
					var $confirmation = $this.data('confirmationMessage')
					if(!confirm($confirmation)){
						return false;
					}
					var afterDelete = function(){};
					var $grid = $this.closest('.grid-view');
					$grid.yiiGridView('update', {
						type: 'POST',
						url: jQuery(this).data('url'),
						success: function(data) {
							$grid.yiiGridView('update');
							afterDelete(th, true, data);
						},
						error: function(XHR) {
							return afterDelete(th, false, XHR);
						}
					});

				});
		});
}(window.jQuery);