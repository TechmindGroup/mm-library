<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */


	$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	$model->am . ' - ' . $model->description=>array('view','id'=>$model->id),
	Yii::t('app','edit'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('materialCompositions','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','view'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

	<h1><?php echo Yii::t('materialCompositions','edit_{name}',array('{name}'=>$model->description)); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>