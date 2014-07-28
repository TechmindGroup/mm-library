<?php
/* @var $this MaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	Yii::t('materials','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('materials','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materials','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>
