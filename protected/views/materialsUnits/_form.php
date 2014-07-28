<?php
/* @var $this MaterialsUnitsController */
/* @var $model MaterialQunits */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'material-qunits-form',
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
					array('size'=>60,'maxlength'=>255)); ?>
			</div>
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model, 'code',
					array('size'=>3,'maxlength'=>3)); ?>
			</div>
		</div>
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
				);
				?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->