<?php

class MaterialsUnitsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'postOnly + getCode', // we only allow getCode via POST request
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
			array('allow',
				'actions'=>array('index','getCode'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionCreate()
	{
		$model=new MaterialQunits;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['MaterialQunits']))
		{
			$model->attributes=$_POST['MaterialQunits'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['MaterialQunits']))
		{
			$model->attributes=$_POST['MaterialQunits'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('update',array(
			'model'=>$model,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}

		$model=new MaterialQunits('search');
//		header( 'Content-type: application/json' );
		$this->renderPartial('_list', array('model'=>$model));
		Yii::app()->end();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new MaterialQunits('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MaterialQunits']))
			$model->attributes=$_GET['MaterialQunits'];

		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			(isset($_GET['ajax']) && $_GET['ajax']==='material-qunits-grid')) {
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
		$model=new MaterialQunits('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MaterialQunits']))
			$model->attributes=$_GET['MaterialQunits'];

		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			(isset($_GET['ajax']) && $_GET['ajax']==='material-qunits-grid')) {
//			header( 'Content-type: application/json' );
			$this->renderPartial('_list', compact('model'));
			Yii::app()->end();
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MaterialQunits the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MaterialQunits::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app_error','404'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MaterialQunits $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='material-qunits-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function renderGroupButtons($data, $row) {
		$items = array();

		if($this->Action->Id == 'admin'){
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->baseUrl.'/js/button.actions.js',CClientScript::POS_END);

			$items[] = array(
				'label' => Yii::t('app','edit'),
				'icon'=>'glyphicon glyphicon-edit',
				'url' => Yii::app()->controller->createUrl("update",array("id"=>$data->id))
			);
			$items[] = array(
				'buttonType' => 'button',
				'label' => Yii::t('app','delete'),
				'icon'=>'glyphicon glyphicon-trash',
				'url' => '#',
				'linkOptions' => array(
					'data-url' => Yii::app()->controller->createUrl("delete", array("id"=>$data->id)),
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

	public function actionGetCode() {
		$data = null;
		$id = null;
		if(Yii::app()->request->isAjaxRequest && Yii::app()->request->getIsPostRequest()){
			$data = Yii::app()->request->getRawBody();
			$data = CJSON::decode($data);
			$id = $data['id'];
			$model = MaterialQunits::model()->findByPk($id);
			header( 'Content-type: application/json' );
			echo json_encode(array('code'=>$model->code));
			Yii::app()->end();
		}
		return false;
	}
}
