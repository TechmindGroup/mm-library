<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */

$this->breadcrumbs=array(
	Yii::t('material_categories','LABEL')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('material_categories','create_new'), 'url'=>array('create')),
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

<h1><?php echo Yii::t('material_categories','view_{name}',array('{name}'=>$model->id)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
