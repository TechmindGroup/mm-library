!function ($){
	"use strict";

	if(typeof $.application == 'undefined'){
		$.application = {};
	}

	if(typeof $.application.form == 'undefined'){
		$.application.form = {
			ajax : {
				success : {},
				error : {}
			},
			submit : {
				before : {},
				after : {}
			}
		};
	}

	$(document)
		.ready(function(){
			$('.modal form[data-form="ajax"]')
				.on('f.submit',function(e){
					var $form = $(this);
					$form.trigger('before.f.submit');
					var settings = $form.data('settings');
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
								if (hasError == false) {
									var extData = '&' + settings.ajaxVar + '=' + $form.attr('id');
									extData += '&submit=true';
									$.ajax({
										url: settings.validationUrl,
										type: $form.attr('method'),
										data: $form.serialize() + extData,
										dataType: 'json',
										success:function(data, textStatus, jqXHR) {
											$form.trigger('success.f.ajax',[data, textStatus, jqXHR]);
										},
										error:function(jqXHR, textStatus, errorThrown) {
											$form.trigger('error.f.ajax',[jqXHR, textStatus, errorThrown]);
										}
									});
								}
							}
							settings.submitting = false;
						});
					}
					else {
						settings.submitting = false;
					}
					return false;
				})
				.on('before.f.submit',function(e){
					var $form = $(this);
					var id = $form.attr('id');
					var callback = $.application.form.submit.before;
					if(typeof callback[id] == "function"){
						callback[id].apply($form);
					}
				})
				.on('after.f.submit',function(e){
					var $form = $(this);
					var id = $form.attr('id');
					var callback = $.application.form.submit.after;
					if(typeof callback[id] == "function"){
						callback[id].apply($form);
					}
				})
				.on('success.f.ajax',function(e, data, textStatus, jqXHR){
					var callback = $.application.form.ajax.success;
					var $form = $(this);
					var id = $form.attr('id');
					if(typeof callback[id] == "function"){
						callback[id].apply($form,[data, textStatus, jqXHR]);
					}
					$form.trigger('after.f.submit');
				})
				.on('error.f.ajax',function(e,jqXHR, textStatus, errorThrown){
					var callback = $.application.form.ajax.error;
					var $form = $(this);
					var id = $form.attr('id');
					if(typeof callback[id] == "function"){
						callback[id].apply($form,[jqXHR, textStatus, errorThrown]);
					}
				});
		});
}(window.jQuery);