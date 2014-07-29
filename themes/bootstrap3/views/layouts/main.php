<?php /* @var $this Controller */ ?>

<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

		<!-- NOTE: Yii uses this title element for its asset manager, so keep it last -->
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<?php
			Yii::app()->booster->init();
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl.'/js/app.js',CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl.'/js/modal.js',CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl.'/js/form.js',CClientScript::POS_END);
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	</head>

	<body>

	<?php
		echo CHtml::openTag('div', array('class' => 'bs-navbar-top-example'));
		$this->widget(
			'booster.widgets.TbNavbar',
			array(
				'type' => 'inverse',
				'brandOptions' => array('style' => 'width:auto;margin-left: 0px;'),
				'fixed' => TbNavbar::FIXED_TOP,
				'fluid' => true,
				'collapse' => true, // requires bootstrap-responsive.css
				'items' => array(
					array(
						'class' => 'booster.widgets.TbMenu',
						'type' => TbMenu::TYPE_NAVBAR,
						'items' => array(
							array('label'=>Yii::t('app','home'), 'url'=>array('/site/index')),
							array(
								'label'=>Yii::t('app','materials'),
								'itemOptions' =>   array('class' => 'dropdown-submenu'),
								'items'=>array(
									array('label'=>Yii::t('app','materials_with_portion'),'url'=>'/portionMaterials'),
									array('label'=>Yii::t('app','materials_without_portion'),'url'=>'/notPortionMaterials'),
									array('label'=>Yii::t('app','units'),'url'=>'/materialsUnits'),
									array('label'=>Yii::t('app','categories'),'url'=>'/materialsCategories'),
								)
							),
							array('label'=>Yii::t('app','login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>Yii::t('app','logout {username}',array('{username}'=>Yii::app()->user->name)), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						)
					)
				)
			)
		);
		echo CHtml::closeTag('div');
	?>

	<div class="container-fluid" id="page">

		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('booster.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink' => CHtml::link(Yii::t('app','home'), Yii::app()->homeUrl),
			)); ?><!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer" class="row">
			<?php echo Yii::t('app','COPYRIGHT_TEXT'); ?>
		</div><!-- footer -->

	</div><!-- page -->

	</body>
</html>
