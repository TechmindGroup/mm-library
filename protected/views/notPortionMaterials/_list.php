<?php
/* @var $this NotPortionMaterialsController */
/* @var $model Materials */

	// $gridColumns
	$gridColumns = array(
		array('name'=>'description', 'header'=>Yii::t('materials','description')),
		array('name'=>'nominal_number', 'header'=>Yii::t('materials','nominal_number')),
		array('name'=>'code', 'header'=>Yii::t('materials','code')),
		array(
			'name'=>'category',
			'header'=>Yii::t('materials','category'),
			'value'=>'$data->category0->name'
		),
		array(
			'name'=>'collection',
			'header'=>Yii::t('materials','collection'),
			'value'=>'($data->collection == 1)?Yii::t(\'app\',\'yes\'):"-";'
		),
		array(
			'htmlOptions' => array(
				'nowrap'=>'nowrap',
				'class' => 'col-sm-1'
			),
			'value'=>array($this,'renderGroupButtons'),
		),
	);

	$this->widget('booster.widgets.TbExtendedGridView', array(
		'dataProvider' => $model->with(array('category0',array('select','name')))->search(),
		'filter' => $model,
		'id'=>'material-grid',
		'type' => 'striped bordered',
		'columns' => $gridColumns,
		'enablePagination'=>true,
		'emptyText' => 'empty text',
		'summaryText'=> Yii::t('app','total_{count}_records'),
	));