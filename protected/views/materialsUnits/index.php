<?php
/* @var $this MaterialsUnitsController */
/* @var $model MaterialQunits */

$this->breadcrumbs=array(
	Yii::t('material_quantity_units','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('material_quantity_units','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('material_quantity_units','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>