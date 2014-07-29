<?php
	/* @var $this PortionMaterialsController */
	/* @var $model Materials */
?>

<div class="row">
	<div class="col-sm-4">
		<label><?php
				echo Yii::t('materials','1.signature_of_issuing_officer'); ?>
			<br/><?php echo Yii::t('materials','stamp_unit'); ?></label>
		<p></p>
	</div>
	<div class="col-sm-8">
		<div class="row">
			<div class="col-sm-7">
				<label for="2.nominal_number" class="col-sm-12"><?php echo Yii::t('materials','2.nominal_number'); ?></label>
				<span id="2.nominal_number" class="col-sm-12"><?php echo $model->nominal_number; ?></span>
			</div>
			<div class="col-sm-5">
				<label for="3.nominal_number" class="col-sm-12"><?php echo Yii::t('materials','3.portion_number'); ?></label>
				<span id="3.portion_number" class="col-sm-12"><?php echo $model->am; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<label for="4.description" class="col-sm-12"><?php echo Yii::t('materials','4.description'); ?></label>
				<span id="4.description" class="col-sm-12"><?php echo $model->description; ?></span>
			</div>
			<div class="col-sm-5">
				<label for="5.material_position" class="col-sm-12"><?php echo Yii::t('materials','5.material_position'); ?></label>
				<span id="5.material_position" class="col-sm-12"><?php echo ''; ?></span>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-7">
				<label for="6.manufacture_code" class="col-sm-12"><?php echo Yii::t('materials','6.manufacture_code'); ?></label>
				<span id="6.manufacture_code" class="col-sm-12"><?php echo $model->code; ?></span>
			</div>
			<div class="col-sm-5">
				<label for="7.special_edition_information" class="col-sm-12"><?php echo Yii::t('materials','7.special_edition_information'); ?></label>
				<span id="7.special_edition_information" class="col-sm-12"><?php echo ''; ?></span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<label for="8.used" class="col-sm-12"><?php echo Yii::t('materials','8.used'); ?></label>
		<span id="8.used" class="col-sm-12"><?php echo ''; ?></span>
	</div>
	<div class="col-sm-4">
		<label for="9.major" class="col-sm-12"><?php echo Yii::t('materials','9.major_group'); ?></label>
		<span id="9.major" class="col-sm-12"><?php echo $model->major; ?></span>
	</div>
	<div class="col-sm-2">
		<label for="10.code" class="col-sm-12"><?php echo Yii::t('materials','10.code'); ?></label>
		<span id="10.code" class="col-sm-12"><?php echo ''; ?></span>
	</div>
	<div class="col-sm-2">
		<label for="11.code" class="col-sm-12"><?php echo Yii::t('materials','11.code'); ?></label>
		<span id="11.code" class="col-sm-12"><?php echo ''; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<label for="12.material_unit" class="col-sm-12"><?php echo Yii::t('materials','12.material_unit'); ?></label>
		<span id="12.material_unit" class="col-sm-12"><?php echo $model->quantityUnit->name; ?></span>
	</div>
	<div class="col-sm-4">
		<label for="13.quantity" class="col-sm-12"><?php echo Yii::t('materials','13.quantity'); ?></label>
		<span id="13.quantity" class="col-sm-12"><?php echo $model->quantity; ?></span>
	</div>
	<div class="col-sm-2">
		<label for="14.unit_price" class="col-sm-12"><?php echo Yii::t('materials','14.unit_price'); ?></label>
		<span id="14.unit_price" class="col-sm-12"><?php echo $model->price; ?></span>
	</div>
	<div class="col-sm-2">
		<label for="15.responsibility" class="col-sm-12"><?php echo Yii::t('materials','15.responsibility'); ?></label>
		<span id="15.responsibility" class="col-sm-12"><?php echo ''; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<label for="16.preferred_material" class="col-sm-12"><?php echo Yii::t('materials','16.preferred_material'); ?></label>
		<span id="16.preferred_material" class="col-sm-12"><?php echo ''; ?></span>
	</div>
	<div class="col-sm-4">
		<label for="17.exchangers" class="col-sm-12"><?php echo Yii::t('materials','17.exchangers'); ?></label>
		<span id="17.exchangers" class="col-sm-12"><?php echo ''; ?></span>
	</div>
	<div class="col-sm-2">
		<label for="18.substitutes" class="col-sm-12"><?php echo Yii::t('materials','18.substitutes'); ?></label>
		<span id="18.substitutes" class="col-sm-12"><?php echo ''; ?></span>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<label><?php echo Yii::t('materials','19.planned'); ?></label>
	</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3"></div>
</div>
<div class="row">
	<div class="col-sm-3">
		<label><?php echo Yii::t('materials','date'); ?></label>
	</div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3"></div>
</div>
<div class="row">
	<div class="col-sm-6">
		<label class="20.expected"><?php echo Yii::t('materials','20.expected'); ?></label>
		<span id="20.expected"><?php echo $model->quantity_prov; ?></span>
	</div>
	<div class="col-sm-6">
		<label class="21.due"><?php echo Yii::t('materials','21.due'); ?></label>
		<span id="21.due"><?php echo $model->charged; ?></span>
	</div>
</div>