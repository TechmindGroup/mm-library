<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */

$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	Yii::t('app','management'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('materialCompositions','create_new'), 'url'=>array('create')),
);
?>
<h1><?php echo Yii::t('app','management'); ?></h1>

<?php
	$this->renderPartial('_list',array('model'=>$model));
?>