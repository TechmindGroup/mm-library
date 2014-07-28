<?php
	/* @var $this MaterialsUnitsController */
	/* @var $model MaterialQunits */
?>
<?php

	// $gridColumns
	$gridColumns = array(
		array('name'=>'name', 'header'=>Yii::t('material_quantity_units','name')),
		array('name'=>'code', 'header'=>Yii::t('material_quantity_units','code')),
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
		'id'=>'material-qunits-grid',
		'type' => 'striped bordered',
		'columns' => $gridColumns,
		'enablePagination'=>true,
		'emptyText' => 'empty text',
		'summaryText'=> Yii::t('app','total_{count}_records'),
	));

?>