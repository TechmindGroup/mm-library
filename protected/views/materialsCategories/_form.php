<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */
/* @var $form TbActiveForm */
/* @var $categoriesData array */
?>

<div class="form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'material-categories-form',
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
				<?php echo $form->select2Group($model,'parent_id',
					array(
						'widgetOptions' => array(
							'data' => $categoriesData,
							'htmlOptions' => array(
								'min'=>1,
								'placeholder'=>Yii::t('material_categories','please_select_a_parent_category'),
							),
							'options' => array()
						)
					)
				);?>
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