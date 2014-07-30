<?php

class MyDepartmentController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create'),
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
		$model=new MyDepartment;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['MyDepartment']))
		{
			$model->attributes=$_POST['MyDepartment'];
			$model->save();
		}

		$this->render('index',array(
			'model'=>$model
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new MyDepartment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MyDepartment']))
			$model->attributes=$_GET['MyDepartment'];

		if (Yii::app()->getRequest()->getIsAjaxRequest() &&
			(isset($_GET['ajax']) && $_GET['ajax']==='department-grid'))
		{
			$this->renderPartial('_index', compact('model'));
			Yii::app()->end();
		}
		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MyDepartment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MyDepartment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,Yii::t('app_error','404'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MyDepartment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='department-form')
		{
			echo TbActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
