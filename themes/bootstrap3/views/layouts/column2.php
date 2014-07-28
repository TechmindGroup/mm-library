<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="row">
		<div class="col-sm-9">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- content -->
		</div>
		<div class="col-sm-3 bs-docs-sidebar"><!-- sidebar -->
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>Yii::t('app','operations'),
					'htmlOptions' => array(
						'class' => 'bs-docs-sidenav affix-top'
					),
				));
				$this->widget(
					'booster.widgets.TbMenu',
					array(
						'type' => 'list',
						'htmlOptions' => array(),
						'items' => $this->menu
					)
				);
				$this->endWidget();
			?>
		</div>
	</div>
<?php $this->endContent(); ?>