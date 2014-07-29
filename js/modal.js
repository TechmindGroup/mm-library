!function ($){
	"use strict";
	$(document)
		.ready(function(){
			$('.modal[data-source="model"]')
				.on('show.bs.modal',function(e){
					if (e.target == this) {
						var $this = $(this);
						var $source = $(e.relatedTarget);
						var data = $source.data('model');
						$this.data('s.data',data);
					}
				})
				.on('hidden.bs.modal',function(e){
					if (e.target == this) {
						var $this = $(this);
						$this.data('s.data',false);
					}
				});
		});
}(window.jQuery);