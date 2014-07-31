<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */

$this->breadcrumbs=array(
	Yii::t('department','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('department','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('department','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>
