<?php
/* @var $this NotPortionMaterialsController */
/* @var $model NotPortionMaterials */
/* @var $assign_model PortionMaterials */
/* @var $assign_form TbActiveForm */

$assign_model=new PortionMaterials;

$this->breadcrumbs=array(
	Yii::t('notPortionMaterials','LABEL')=>array('index'),
	Yii::t('app','management'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('notPortionMaterials','create_new'), 'url'=>array('create')),
);
?>
<h1><?php echo Yii::t('app','management'); ?></h1>

<?php
	$this->renderPartial('_list',array('model'=>$model));

	Yii::app()->clientScript->registerScriptFile(
		Yii::app()->baseUrl.'/js/notPortionMaterials/form.js'
		,CClientScript::POS_END);

	$this->beginWidget(
	'booster.widgets.TbModal',
	array(
		'id' => 'assign-portion-modal',
		'events' => array(
			'shown.bs.modal'=>"js:function(e){
				if (e.target == this) {
					var \$this = $(this);
					var data = \$this.data('s.data');
					var \$form = \$this.find('form');
					\$form.find('[name=\"PortionMaterials[id]\"]').val(data.id);
					\$form.find('[name=\"PortionMaterials[description]\"]').val(data.description);
				}
			}",
			'hidden.bs.modal'=>"js:function(e){
				if (e.target == this) {
					var \$this = $(this);
					var \$form = \$this.find('form');
					\$form.trigger('reset');
				}
			}"
		),
		'htmlOptions' => array(
			'data-source'=>'model'
		)
	)
); ?>
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4><?php echo Yii::t('notPortionMaterials','portion_assignment')?></h4>
	</div>
	<div class="modal-body">
		<?php
			$assign_form = $this->beginWidget('booster.widgets.TbActiveForm', array(
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
		<?php echo $assign_form->errorSummary($assign_model); ?>
		<fieldset>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $assign_form->textFieldGroup($assign_model, 'description',
						array()); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<?php echo $assign_form->textFieldGroup($assign_model, 'am',
						array('size'=>20,'maxlength'=>20)); ?>
				</div>
			</div>
		</fieldset>
		<?php echo $assign_form->textField($assign_model, 'id',array('class'=>'hide')); ?>
		<?php $this->endWidget(); unset($assign_form);?>
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