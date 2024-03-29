<?php

class ProductManageController extends Controller
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
				'actions'=>array('index','view', 'search'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($product_id)
	{
		$model=new ProductManage;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductManage']))
		{
			//$model->attributes=$_POST['ProductManage'];
			
			$start_date = $_POST['start_date'];
			$end_date = $_POST['end_date'];

			for ($idate = strtotime($start_date); $idate <= strtotime($end_date); $idate += 3600*24) {
				$date = date('Y-m-d', $idate);

				$imodel = new ProductManage;
				$imodel->attributes=$_POST['ProductManage'];
				$imodel->date = $date;
				$imodel->product_id = $product_id;
				
				$imodel->save();
			}
			//$model->product_id = $product_id;
			/*$check = ProductManage::model()->findByAttributes(array('product_id'=>$product_id, 'date'=>$_POST['ProductManage']['date']));
			if ($check != false){
				$check->amount += $_POST['ProductManage']['amount'];
				$check->save();
				$this->redirect(array('view','id'=>$check->id));
			}*/
			$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model' =>$model,
			'pid'   =>$product_id,
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductManage']))
		{
			$model->attributes=$_POST['ProductManage'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider(ProductManage::model()->today()->with('product'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductManage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductManage']))
			$model->attributes=$_GET['ProductManage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionSearch($key) {
		$model = array();
		$product = Product::model()->findAll("name LIKE '%$key%'");
		foreach ($product as $p) {
			$model[] = ProductManage::model()->findByAttributes(array('product_id'=>$p->id, 'date'=>date('Y-m-d')));
		}
		//Yii::log(print_r($model,true));

		$dataProvider=new CArrayDataProvider($model, array(
		    'id'=>'search_result',
		    /*'sort'=>array(
		        'attributes'=>array(
		             'id', 'username', 'email',
		        ),
		    ),*/
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'title' => "“{$key}”的搜索结果",
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=ProductManage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-manage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
