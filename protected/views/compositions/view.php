<?php
/* @var $this CompositionsController */
/* @var $model MaterialCompositions */

$this->breadcrumbs=array(
	Yii::t('materialCompositions','LABEL')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('materialCompositions','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','edit'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('app','delete'), 'url'=>'#',
		'linkOptions'=>array(
			'submit'=>array(
				'delete','id'=>$model->id),
			'confirm'=>Yii::t('app','delete_confirmation')
		)),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materialCompositions','card_remaining'); ?></h1>

<div class="well">
	<div class="row">
		<span class="pull-right"><?php echo Yii::t('materialCompositions','dyp/130'); ?></span>
	</div>
</div>