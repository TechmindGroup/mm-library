<?php
/* @var $this MaterialsUnitsController */
/* @var $model MaterialQunits */

$this->breadcrumbs=array(
	Yii::t('material_quantity_units','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('material_quantity_units','create_new'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>