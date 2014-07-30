<?php
/* @var $this MyDepartmentController */
/* @var $model MyDepartment */

	$this->breadcrumbs=array(
	Yii::t('myDepartment','LABEL')=>array('index'),
	Yii::t('app','creation'),
);

?>

<?php $this->renderPartial('_form', array(
	'model'=>$model
)); ?>