<?php
/* @var $this CollaboratingDepartmentsController */
/* @var $model OtherDepartment */

	// $gridColumns
	$gridColumns = array(
		array('name'=>'name', 'header'=>Yii::t('department','name')),
		array(
			'htmlOptions' => array(
				'nowrap'=>'nowrap',
				'class' => 'col-sm-1'
			),
			'value'=>array($this,'renderGroupButtons'),
		),
	);

	$this->widget('booster.widgets.TbExtendedGridView', array(
		'dataProvider' => $model->search(),
		'filter' => $model,
		'id'=>'department-grid',
		'type' => 'striped bordered',
		'columns' => $gridColumns,
		'enablePagination'=>true,
		'emptyText' => Yii::t('app','zero_records'),
		'summaryText'=> Yii::t('app','total_{count}_records'),
	));