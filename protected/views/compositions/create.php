<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */


	$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('materialCompositions','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materialCompositions','create_new'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>