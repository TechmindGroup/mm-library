<?php
require(dirname(__FILE__).'/PortionMaterialsController.php');

class NotPortionMaterialsController extends PortionMaterialsController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new NotPortionMaterials;

		// Uncomment the following line if AJAX validation is needed
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
			(isset($_GET['ajax']) && $_GET['ajax']==='material-grid')) {
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
			(isset($_GET['ajax']) && $_GET['ajax']==='material-grid')) {
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
}
