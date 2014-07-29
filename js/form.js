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

					if (settings.timer !== undefined) {
						clearTimeout(settings.timer);
					}
					settings.submitting = true;
					if (settings.beforeValidate === undefined
						|| settings.beforeValidate($form)) {
						$.fn.yiiactiveform.validate($form, function (data) {
							var hasError = false;
							$.each(settings.attributes, function () {
								hasError = $.fn.yiiactiveform.updateInput(this, data, $form) || hasError;
							});
							$.fn.yiiactiveform.updateSummary($form, data);
							if (settings.afterValidate === undefined
								|| settings.afterValidate($form, data, hasError)) {
								if (!hasError) {
									validated = true;
									var extData = '&' + settings.ajaxVar + '=' + $form.attr('id');
									/*$.ajax({
										url: settings.validationUrl,
										type: $form.attr('method'),
										data: $form.serialize() + extData,
										dataType: 'json',
										success:function(data) {
											console.log(data);
										}
									});*/
								}
							}
							settings.submitting = false;
						});
					}
					else {
						settings.submitting = false;
					}
					$form.trigger('after.f.submit');
					return false;
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