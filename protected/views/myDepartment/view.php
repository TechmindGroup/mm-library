<?php
/* @var $this MyDepartmentController */
/* @var $model MyDepartment */
/* @var $form TbActiveForm */

$this->breadcrumbs=array(
	Yii::t('myDepartment','LABEL')=>array('index'),
	$model->name,
);
?>

<h1><?php echo Yii::t('myDepartment','info'); ?></h1>

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