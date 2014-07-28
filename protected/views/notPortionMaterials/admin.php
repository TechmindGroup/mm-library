<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */

$this->breadcrumbs=array(
	Yii::t('materialsOthers','LABEL')=>array('index'),
	Yii::t('app','management'),
);

$this->menu=array(
	array('label'=>Yii::t('app','view_all'), 'url'=>array('index')),
	array('label'=>Yii::t('materialsOthers','create_new'), 'url'=>array('create')),
);
?>
<h1><?php echo Yii::t('app','management'); ?></h1>

<?php
	$this->renderPartial('_list',array('model'=>$model));
?>