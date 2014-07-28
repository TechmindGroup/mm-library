<?php
/* @var $this MaterialsController */
/* @var $model Materials */
/* @var $categoriesData array */


	$this->breadcrumbs=array(
	Yii::t('materials','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('materials','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materials','create_new'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'categoriesData'=>$categoriesData
)); ?>