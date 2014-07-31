<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */

$this->breadcrumbs=array(
	Yii::t('department','LABEL')=>array('index'),
	$model->name
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('department','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','edit'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','delete'), 'url'=>'#',
		'linkOptions'=>array(
			'submit'=>array(
				'delete','id'=>$model->id),
			'confirm'=>Yii::t('app','delete_confirmation')
		)),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('department','card_remaining'); ?></h1>

<div class="form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'department-form',
		'htmlOptions'=>array('class'=>'well'),
		'enableClientValidation'=>true,
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>true,
		)
	)); ?>

	<fieldset>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model, 'name',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model, 'abbreviation',
					array('maxlength'=>255)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model, 'administration',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model,'administration_abbreviation',
					array('maxlength'=>255)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model,'formation',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->textFieldGroup($model,'code',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->textFieldGroup($model,'code_completion',
					array('maxlength'=>255)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model,'address',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->textFieldGroup($model,'city',
					array('maxlength'=>255)); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->textFieldGroup($model,'ea',
					array('maxlength'=>255)); ?>
			</div>
		</div>
	</fieldset>
	<?php $this->endWidget(); unset($form);?>
</div><!-- form -->