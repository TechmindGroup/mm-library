<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */
/* @var $categoriesData array */


	$this->breadcrumbs=array(
	Yii::t('material_categories','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('material_categories','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('material_categories','create_new'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'categoriesData'=>$categoriesData
)); ?>