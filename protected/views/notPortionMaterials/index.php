<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	Yii::t('notPortionMaterials','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('notPortionMaterials','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('notPortionMaterials','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>
