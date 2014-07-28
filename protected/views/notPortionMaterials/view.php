<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	Yii::t('materialsOthers','LABEL')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('materialsOthers','create_new'), 'url'=>array('create')),
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

<h1><?php echo Yii::t('materials','card_remaining'); ?></h1>

<div class="well">
	<div class="row">
		<span class="pull-right"><?php echo Yii::t('materials','k. 2309/dyp'); ?></span>
	</div>
	<?php
		$this->renderPartial('view/general_info', compact('model'));
		$this->renderPartial('view/quantity_info', compact('model'));
		$this->renderPartial('view/transfers_info', compact('model'));
		$this->renderPartial('view/extra_info', compact('model'));
	?>
</div>