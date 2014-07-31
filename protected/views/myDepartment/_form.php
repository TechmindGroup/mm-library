<?php
/* @var $this MyDepartmentController */
/* @var $model MyDepartment */
/* @var $form TbActiveForm */
?>

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

<p class="note"><?php echo Yii::t('app','required_fields'); ?></p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->textField($model,'id',array('class'=>'hide')); ?>
	</fieldset>

	<div class="row">
		<div class="col-sm-2 pull-right">
			<div class="form-actions pull-right">
				<?php $this->widget(
					'booster.widgets.TbButtonGroup',
					array(
						'justified' => true,
						'size' => 'small',
						'buttons'=>array(
							array(
								'buttonType' => 'submit',
								'context' => 'primary',
								'icon' => 'glyphicon glyphicon-floppy-save',
								'tooltip' => true,
								'tooltipOptions' => array(
									'title'=>Yii::t('app','submit')
								)
							),
							array(
								'buttonType' => 'reset',
								'icon' => 'glyphicon glyphicon-refresh',
								'tooltip' => true,
								'tooltipOptions' => array(
									'title'=>Yii::t('app','reset')
								)
							)
						)
					)
				); ?>
			</div>
		</div>
	</div>
<?php $this->endWidget(); unset($form);?>
</div><!-- form -->