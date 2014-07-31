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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model= MyDepartment::model()->find();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		if(isset($_POST['MyDepartment']))
		{
			$model->attributes=$_POST['MyDepartment'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model= MyDepartment::model()->find();
		$this->render('view',array(
			'model'=>$model,
		));
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
