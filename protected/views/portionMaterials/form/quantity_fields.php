<?php
	/* @var $this PortionMaterialsController */
	/* @var $model Materials */
	/* @var $form TbActiveForm */

	$unit_code = (!$model->isNewRecord)?$model->quantityUnit->code:"&nbsp;";
?>

<fieldset>
	<legend><?php echo Yii::t('materials','quantity_fields'); ?></legend>
	<div class="row">
		<div class="col-sm-4">
			<?php echo $form->select2Group($model,'quantity_unit',
				array(
					'widgetOptions' => array(
						'data' => CHtml::listData(
								MaterialQunits::model()->findAll(), 'id', 'name'),
						'htmlOptions' => array(
							'min'=>1,
							),
						'options'=> array(
							'placeholder'=>Yii::t('materials','please_select_a_quantity_unit'),
						),
						'events' =>array(
							'change'=>"js:function(e){
								var id = e.added.id;
								var \$this = \$(this);
								$.ajax({
									'type':'post',
									'contentType': 'application/json',
									'data': JSON.stringify({'id':id}),
									'url': '".$this->createUrl("materialsUnits/getCode")."',
									'success': function(resp) {
										var code = resp.code;
										var \$container = \$this.closest('form');
										\$container.find('[data-unit-label=\"true\"]').html(code);
									}
								});
							}"),
					)
				)
			);?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<?php echo $form->numberFieldGroup($model,'quantity',
				array(
					'append' => $unit_code,
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'min' => 0,
						)
					),
					'appendOptions' => array(
						'data-unit-label'=>'true'
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-9',
					),
				)); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->numberFieldGroup($model,'quantity_prov',
				array(
					'append' => $unit_code,
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'min' => 0
						)
					),
					'appendOptions' => array(
						'data-unit-label'=>'true'
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-9',
					),
				)); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->numberFieldGroup($model,'charged',
				array(
					'append' => $unit_code,
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'min' => 0
						)
					),
					'appendOptions' => array(
						'data-unit-label'=>'true'
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-9',
					),
				)); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->numberFieldGroup($model,'quantity_diff',
				array(
					'append' => $unit_code,
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-9',
					),
					'appendOptions' => array(
						'data-unit-label'=>'true'
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'disabled' => true,
							'min' => 0
						)
					)
				)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<?php echo $form->numberFieldGroup($model,'quantity_last_year',
				array(
					'append' => $unit_code,
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'min' => 0
						)
					),
					'appendOptions' => array(
						'data-unit-label'=>'true'
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-9',
					),
				)); ?>
		</div>
		<div class="col-sm-3 col-sm-offset-6">
			<?php echo $form->numberFieldGroup($model,'price',
				array(
					'append' => '&euro;',
					'labelOptions' => array(
						'class' => 'col-sm-12',
					),
					'widgetOptions' => array(
						'htmlOptions' => array(
							'min' => 0,
							'step' => 0.01
						)
					),
					'wrapperHtmlOptions' => array(
						'class' => 'col-sm-12',
					),
				)); ?>
		</div>
	</div>
</fieldset>