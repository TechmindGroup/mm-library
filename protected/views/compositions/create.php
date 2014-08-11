<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */
/* @var $cm_model MaterialCompositionItems */
/* @var $form TbActiveForm */
/* @var $material_form TbActiveForm */

$cm_model = new MaterialCompositionItems;
$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	Yii::t('app','creation'),
);
$this->menu=array(
	array('label'=>Yii::t('materialCompositions','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
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
							'data' => CHtml::listData(
									PortionMaterials::model()->has_composition()->findAll(), 'id', 'listName'),
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
				<?php echo $form->textFieldGroup($model, 'material_am',
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
				<?php echo $form->textFieldGroup($model,'material_description',
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
			<div class="col-sm-6">
				<?php echo $form->select2Group($model,'department_id',
					array(
						'widgetOptions' => array(
							'data'=>CHtml::listData(
								Departments::model()->findAll(), 'id', 'listName'),
							'htmlOptions' => array(
								'min'=>1,
								'placeholder'=>Yii::t('materialCompositions','please_select_a_department'),
							)
						)
					)
				);?>
			</div>
			<div class="col-sm-6">
				<?php echo $form->textFieldGroup($model, 'documentary_number',
					array(
						'wrapperHtmlOptions' => array(
							'class' => 'col-sm',
						),
						'widgetOptions' => array(
							'htmlOptions' => array()
						)
					)); ?>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend><?php echo Yii::t('materialCompositions','materials_fields'); ?></legend>
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
									'buttonType' => 'button',
									'context' => 'primary',
									'icon' => 'glyphicon glyphicon-plus-sign',
									'htmlOptions'=>array(
										'data-toggle' => 'modal',
										'data-target' => '#new-material',
										'title'=>Yii::t('materialCompositions','add_new_material')
									)
								)
							)
						)
					);
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php
					$this->widget(
						'booster.widgets.TbGridView',
						array(
							'type' => 'striped',
							'dataProvider' => new CArrayDataProvider(array()),
							'template' => "{items}",
							'columns' => array(
								array('name'=>'nominal_number', 'header'=>'nominal_number'),
								array('name'=>'lastName', 'header'=>'Last name'),
								array('name'=>'language', 'header'=>'Language'),
								array('name'=>'hours', 'header'=>'Hours worked'),
								array(
									'htmlOptions' => array('nowrap'=>'nowrap'),
									'class'=>'booster.widgets.TbButtonColumn',
									'viewButtonUrl'=>null,
									'updateButtonUrl'=>null,
									'deleteButtonUrl'=>null,
								)
							),
						)
					);
				 ?>
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
	<?php $this->endWidget(); unset($form);?>
</div><!-- form -->

<?php $this->beginWidget(
	'booster.widgets.TbModal',
	array('id' => 'new-material')
); ?>
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4><?php echo Yii::t('materialCompositions','composition_material'); ?></h4>
	</div>
	<div class="modal-body">
		<?php
			$material_form = $this->beginWidget('booster.widgets.TbActiveForm', array(
					'id' => 'assign-portion-form',
					'action'=>Yii::app()->controller->createUrl("assignPortion"),
					'htmlOptions' => array(
						'class' => 'well',
						'data-form'=>'ajax'
					),
					'enableClientValidation'=>true,
					'enableAjaxValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
						'validateOnChange'=>true,
					)
				)
			);
		?>
		<p class="note"><?php echo Yii::t('app','required_fields'); ?></p>
		<?php echo $material_form->errorSummary($cm_model); ?>
		<fieldset>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $material_form->textFieldGroup($cm_model, 'nominal_number',
						array()); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php echo $material_form->textFieldGroup($cm_model, 'description',
						array()); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $material_form->select2Group($cm_model,'quantity_unit',
						array(
							'widgetOptions' => array(
								'data'=>CHtml::listData(
										MaterialQunits::model()->findAll(), 'id', 'name'),
								'htmlOptions' => array(
									'min'=>1,
								),
								'options' => array(
									'placeholder'=>Yii::t('materialCompositionItems','please_select_a_quantity_unit'),
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
							)));?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $material_form->numberFieldGroup($cm_model,'quantity_expected',
						array(
							'append' => "&nbsp;",
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
				<div class="col-sm-6">
					<?php echo $material_form->numberFieldGroup($cm_model,'quantity_not_charged',
						array(
							'append' => "&nbsp;",
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
			</div>
		</fieldset>
		<?php echo $material_form->textField($cm_model, 'id',array('class'=>'hide')); ?>
		<?php $this->endWidget(); unset($material_form);?>
	</div>
	<div class="modal-footer">
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
									'context' => 'primary',
									'icon' => 'glyphicon glyphicon-floppy-save',
									'tooltip' => true,
									'tooltipOptions' => array(
										'title'=>Yii::t('app','submit')
									),
									'htmlOptions'=>array(
										'data-form-submit'=>'#assign-portion-form'
									)
								),
								array(
									'icon' => 'glyphicon glyphicon-remove',
									'htmlOptions' => array('data-dismiss' => 'modal'),
									'tooltip' => true,
									'tooltipOptions' => array(
										'title'=>Yii::t('app','close')
									)
								)
							)
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>