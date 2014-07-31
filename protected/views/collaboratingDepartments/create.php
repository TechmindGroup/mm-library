<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */


	$this->breadcrumbs=array(
	Yii::t('department','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

$this->menu=array(
	array('label'=>Yii::t('department','LABEL'), 'url'=>array('index')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('department','create_new'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model
)); ?>