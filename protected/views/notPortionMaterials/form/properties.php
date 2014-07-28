<?php
	/* @var $this NotPortionMaterialsController */
	/* @var $model Materials */
	/* @var $form TbActiveForm */

	$switchGroupOptions = array(
		'labelOptions' => array(
			'class' => 'col-sm-12',
		),
		'widgetOptions' => array(
			'options'=>array(
				'size' => 'small',
				'offText' => Yii::t('app','no'),
				'onText' => Yii::t('app','yes'),
				'onColor' => 'success',
				'offColor' => 'warning'
			)
		)
	);
?>

<fieldset>
	<legend><?php echo Yii::t('materials','properties'); ?></legend>
	<div class="row">
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'collection'
				,$switchGroupOptions); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'controlled'
				,$switchGroupOptions); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'attractive'
				,$switchGroupOptions); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'ammunition_baseload'
				,$switchGroupOptions); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'ammunition_ekp'
				,$switchGroupOptions); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'task_completion',
				$switchGroupOptions); ?>
		</div>
		<div class="col-sm-3">
			<?php echo $form->switchGroup($model, 'weapon',$switchGroupOptions); ?>
		</div>
	</div>
</fieldset>