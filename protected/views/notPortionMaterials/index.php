<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	Yii::t('materialsOthers','LABEL'),
);

$this->menu=array(
	array('label'=>Yii::t('materialsOthers','create_new'), 'url'=>array('create')),
	array('label'=>Yii::t('app','management'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('materialsOthers','LABEL'); ?></h1>

<?php
	$this->renderPartial('_index',array('model'=>$model));
?>
