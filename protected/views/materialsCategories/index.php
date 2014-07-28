<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */

$this->breadcrumbs=array(
	Yii::t('material_categories','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('material_categories','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('material_categories','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>