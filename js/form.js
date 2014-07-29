!function ($){
	"use strict";
	$(document)
		.ready(function(){
			$('.modal form')
				.on('f.submit',function(e){
					var $form = $(this);
					$form.trigger('before.f.submit');
					var settings = $form.data('settings');
					var validated = false;
					$.fn.yiiactiveform.validate($form, function (data){
						var hasError = false;
						$.each(settings.attributes, function () {
							hasError = $.fn.yiiactiveform.updateInput(this, data, $form)
								|| hasError;
						});
						$.fn.yiiactiveform.updateSummary($form, data);
						if (settings.afterValidate === undefined
							|| settings.afterValidate($form, data, hasError)) {
							if (!hasError) {
								validated = true;
							}
						}
					});
					console.log(validated);
					$.ajax({
						'url':$form.data('url'),
						'data':$form.serialize(),
						'type':'post',
						'dataType':'json',
						'success':function(data) {
							console.log('test');
						}
					});
					$form.trigger('after.f.submit');
				})
				.on('before.f.submit',function(e){
					console.log('before');
				})
				.on('after.f.submit',function(e){
					console.log('after');
				})
			;
		});
}(window.jQuery);