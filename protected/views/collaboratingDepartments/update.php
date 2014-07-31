<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */


	$this->breadcrumbs=array(
	Yii::t('department','LABEL')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	Yii::t('app','edit'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('department','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','view'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

	<h1><?php echo Yii::t('department','edit_{name}',array('{name}'=>$model->description)); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model
)); ?>