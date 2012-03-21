<?php

class ScardController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Scard'),
		));
	}

	public function actionCreate() {
		$model = new Scard;


		if (isset($_POST['Scard'])) {
			$model->setAttributes($_POST['Scard']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Scard');


		if (isset($_POST['Scard'])) {
			$model->setAttributes($_POST['Scard']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Scard')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Scard');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Scard('search');
		$model->unsetAttributes();

		if (isset($_GET['Scard']))
			$model->setAttributes($_GET['Scard']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}