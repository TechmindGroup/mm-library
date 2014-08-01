<?php
require(dirname(__FILE__).'/PortionMaterialsController.php');

class NotPortionMaterialsController extends PortionMaterialsController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete, assignPortion', // we only allow deletion,assignPortion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'assignPortion'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new NotPortionMaterials;
		$this->performAjaxValidation($model);

		if(isset($_POST['NotPortionMaterials']))
		{
			$model->attributes=$_POST['NotPortionMaterials'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('create',array(
			'model'=>$model,
			'categoriesData'=>MaterialCategories::model()->getGroupArray()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['NotPortionMaterials']))
		{
			$model->attributes=$_POST['NotPortionMaterials'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			'categoriesData'=>MaterialCategories::model()->getGroupArray()
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])){
			$this->redirect(isset($_POST['returnUrl'])
				? $_POST['returnUrl'] : array('admin'));
		}

		$model=new NotPortionMaterials('search');
//		header( 'Content-type: application/json' );
		$this->renderPartial('_list', array('model'=>$model));
		Yii::app()->end();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new NotPortionMaterials('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NotPortionMaterials']))
			$model->attributes=$_GET['NotPortionMaterials'];

		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			(isset($_GET['ajax']) && $_GET['ajax']==='material-grid'))
		{
//			header( 'Content-type: application/json' );
			$this->renderPartial('_index', compact('model'));
			Yii::app()->end();
		}
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NotPortionMaterials('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NotPortionMaterials']))
			$model->attributes=$_GET['NotPortionMaterials'];

		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			(isset($_GET['ajax']) && $_GET['ajax']==='material-grid'))
		{
//			header( 'Content-type: application/json' );
			$this->renderPartial('_list', compact('model'));
			Yii::app()->end();
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 *
	 * @throws CHttpException
	 * @return string the JSON
	 */
	public function actionAssignPortion()
	{
		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			Yii::app()->getRequest()->getIsPostRequest())
		{
			$data = Yii::app()->getRequest()->getRestParams();
			if(isset($data['PortionMaterials'])){
				$model=PortionMaterials::model()->resetScope()->
					findByPk($data['PortionMaterials']['id']);
				if($model===null){
					throw new CHttpException(404,Yii::t('app_error','404'));
				}
				if(!(isset($data['submit']) && $data['submit'] == 'true')){
					$this->performAjaxValidation($model);
				}

				$model->attributes=$data['PortionMaterials'];
				$rs = array('error'=>true);
				if($model->save()){
					$rs['error'] = false;
				}
				echo CJSON::encode($rs);
				Yii::app()->end();
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return NotPortionMaterials the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=NotPortionMaterials::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app_error','404'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PortionMaterials $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='materials-form')
		{
			echo TbActiveForm::validate($model);
			Yii::app()->end();
		}
		elseif(isset($_POST['ajax']) && $_POST['ajax']==='assign-portion-form')
		{
			echo TbActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function renderGroupButtons($data, $row)
	{
		$items = array();
		$items[] = array(
			'label' => Yii::t('app','view'),
			'icon'=>'glyphicon glyphicon-eye-open',
			'url' => Yii::app()->controller->createUrl("view",array("id"=>$data->id))
		);

		if($this->Action->Id == 'admin')
		{
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl.'/js/button.actions.js',CClientScript::POS_END);

			$items[] = array(
				'label' => Yii::t('app','edit'),
				'icon'=>'glyphicon glyphicon-edit',
				'url' => Yii::app()->controller->
						createUrl("update",array("id"=>$data->id))
			);
			$items[] = array(
				'buttonType' => 'button',
				'label' => Yii::t('notPortionMaterials','portion_assignment'),
				'icon'=>'glyphicon glyphicon-magnet',
				'url' => '#',
				'linkOptions' => array(
					'data-toggle' => 'modal',
					'data-target' => '#assign-portion-modal',
					'data-model' => CJSON::encode(
							array("id"=>$data->id,"description"=>$data->description))
				)
			);
			$items[] = array(
				'buttonType' => 'button',
				'label' => Yii::t('app','delete'),
				'icon'=>'glyphicon glyphicon-trash',
				'url' => '#',
				'linkOptions' => array(
					'data-url' => Yii::app()->controller->
							createUrl("delete", array("id"=>$data->id)),
					'data-need-confirm'=>'true',
					'data-confirmation-message'=>Yii::t('app','delete_confirmation_message')
				)
			);
		}
		$this->widget(
			'booster.widgets.TbButtonGroup',
			array(
				'context'=>'default',
				'size' => 'small',
				'buttons' => array(
					array('label' => null,'icon'=>'wrench', 'url' => '#'),
					array(
						'items' => $items
					)
				),
			)
		);
	}
}
