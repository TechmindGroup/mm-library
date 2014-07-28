<?php
/* @var $this MaterialsUnitsController */
/* @var $model MaterialQunits */
/* $gridDataProvider */

$this->breadcrumbs=array(
	Yii::t('material_quantity_units','LABEL')=>array('index'),
	Yii::t('app','management'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('material_quantity_units','create_new'), 'url'=>array('create')),
);
?>

<h1><?php echo Yii::t('app','management'); ?></h1>

<?php
	$this->renderPartial('_list',array('model'=>$model));
?>