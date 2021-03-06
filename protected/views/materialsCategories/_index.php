<?php
/* @var $this MaterialsCategoriesController */
/* @var $model MaterialCategories */

	// $gridColumns
	$gridColumns = array(
		array('name'=>'name', 'header'=>Yii::t('material_categories','name')),
		array('name'=>'parent_id',
			'header'=>Yii::t('material_categories','parent_category'),
			'value'=>'$data->parentCategory->name'
		),
	);

	$this->widget('booster.widgets.TbExtendedGridView', array(
		'dataProvider' => $model->
				with(array('parentCategory',array('select','name')))->
				userCategories()->
				search(),
		'filter' => $model,
		'id'=>'material-categories-grid',
		'type' => 'striped bordered',
		'columns' => $gridColumns,
		'enablePagination'=>true,
		'emptyText' => Yii::t('app','zero_records'),
		'summaryText'=> Yii::t('app','total_{count}_records'),
	));