<?php
	/* @var $this MaterialsController */
	/* @var $model Materials */
	/* @var $form TbActiveForm */
	/* @var $categoriesData array */

?>

<fieldset>
	<legend><?php echo Yii::t('materials','basic_fields'); ?></legend>
	<div class="row">
		<div class="col-sm-6">
			<?php echo $form->textFieldGroup($model, 'am',
				array('size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-4 col-sm-offset-2">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<?php echo $form->textFieldGroup($model, 'code',
				array('size'=>20,'maxlength'=>20)); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textFieldGroup($model,'nominal_number',
				array('size'=>60,'maxlength'=>255)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<?php echo $form->select2Group($model,'category',
				array(
					'widgetOptions' => array(
						'data' => $categoriesData,
						'htmlOptions' => array(
							'min'=>1,
							'placeholder'=>Yii::t('materials','please_select_a_category'),
						),
						'options' => array()
					)
				)
			);?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textFieldGroup($model,'major',
				array('size'=>6,'maxlength'=>6)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php echo $form->textFieldGroup($model,'description',
				array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->textAreaGroup($model,'comment',
				array('rows'=>6)); ?>
		</div>
	</div>
</fieldset>