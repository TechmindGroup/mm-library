<?php
	/* @var $this PortionMaterialsController */
	/* @var $model Materials */
	/* @var $form TbActiveForm */
	/* @var $categoriesData array */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'materials-form',
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

	<?php
		$this->renderPartial('form/basic_fields',
			array(
				'model'=>$model,'form'=>$form,'categoriesData'=>$categoriesData
			));
		$this->renderPartial('form/quantity_fields',
			array('model'=>$model,'form'=>$form));
		$this->renderPartial('form/properties',
			array('model'=>$model,'form'=>$form));
	?>

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

<?php $this->endWidget(); unset($form);?>

</div><!-- form -->