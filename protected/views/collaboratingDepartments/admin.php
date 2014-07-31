<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */

$this->breadcrumbs=array(
	Yii::t('department','LABEL')=>array('index'),
	Yii::t('app','management'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('department','create_new'), 'url'=>array('create')),
);
?>
<h1><?php echo Yii::t('app','management'); ?></h1>

<?php
	$this->renderPartial('_list',array('model'=>$model));
?>