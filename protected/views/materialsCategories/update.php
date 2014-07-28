<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */
/* @var $categoriesData array */


$this->breadcrumbs=array(
	Yii::t('material_categories','LABEL')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','edit'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('material_categories','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

	<h1><?php echo Yii::t('material_categories','edit_{name}',array('{name}'=>$model->id)); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'categoriesData'=>$categoriesData
)); ?>