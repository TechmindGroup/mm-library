<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */
/* @var $categoriesData array */


	$this->breadcrumbs=array(
	Yii::t('notPortionMaterials','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('notPortionMaterials','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('notPortionMaterials','create_new'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'categoriesData'=>$categoriesData
)); ?>