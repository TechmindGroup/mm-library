<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */
/* @var $material_model PortionMaterials */
/* @var $form TbActiveForm */
/* @var $materialData array */


$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('materialCompositions','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);

$material_model = new PortionMaterials;
?>

<h1><?php echo Yii::t('materialCompositions','create_new'); ?></h1>

<div class="form">

	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
		'id'=>'composition-form',
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
		<legend><?php echo Yii::t('materialCompositions','basic_fields'); ?></legend>
		<div class="row">
			<div class="col-sm-12">
				<?php echo $form->select2Group($model,'material_id',
					array(
						'widgetOptions' => array(
							'data' => $materialData,
							'htmlOptions' => array(
								'min'=>1,
								'placeholder'=>Yii::t('materialCompositions','please_select_a_material'),
							)
						)
					)
				);?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php echo $form->textFieldGroup($material_model, 'am',
					array(
						'wrapperHtmlOptions' => array(
							'class' => 'col-sm',
						),
						'widgetOptions' => array(
							'htmlOptions' => array('disabled' => true)
						)
					)); ?>
			</div>
			<div class="col-sm-9">
				<?php echo $form->textFieldGroup($material_model,'description',
					array(
						'wrapperHtmlOptions' => array(
							'class' => 'col-sm',
						),
						'widgetOptions' => array(
							'htmlOptions' => array('disabled' => true)
						)
					)); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-6"></div>
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

	<?php $this->endWidget(); unset($form);?>

</div><!-- form -->