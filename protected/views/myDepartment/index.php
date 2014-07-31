<?php
/* @var $this MyDepartmentController */
/* @var $model MyDepartment */

$this->breadcrumbs=array(
	Yii::t('myDepartment','LABEL')=>array('index'),
	$model->name,
);
?>

<h1><?php echo Yii::t('myDepartment','info'); ?></h1>

<?php $this->renderPartial('_form', array(
	'model'=>$model
)); ?>