<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */

$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('materialCompositions','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materialCompositions','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>
