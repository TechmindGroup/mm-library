<?php
	/* @var $this CompositionsController */
	/* @var $model MaterialCompositions */

	// $gridColumns
	$gridColumns = array(
		array(
			'name'=>'material',
			'header'=>Yii::t('materialCompositions','material'),
			'value'=>'$data->material->am'
		),
		array(
			'name'=>'department',
			'header'=>Yii::t('materialCompositions','department'),
			'value'=>'$data->department->name'
		),
		array(
			'name'=>'documentary_number',
			'header'=>Yii::t('materialCompositions','documentary_number')
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
		'dataProvider' => $model->with(
				array('material',array('select','am,name')),
				array('department',array('select','name'))
			)->search(),
		'filter' => $model,
		'id'=>'composition-grid',
		'type' => 'striped bordered',
		'columns' => $gridColumns,
		'enablePagination'=>true,
		'emptyText' => Yii::t('app','zero_records'),
		'summaryText'=> Yii::t('app','total_{count}_records'),
	));