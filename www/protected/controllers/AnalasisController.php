<?php

class AnalasisController extends Controller
{
	public function actionCard()
	{
		$allUsers    = User::model()->with('card', 'profile')->findAll();
		$activateNum = 0; //激活数
		$ages        = array(); //年龄情况。
		$maleNum     = 0;
		$femaleNum   = 0;
		$level[0]=0;
		$level[1]=0;
		$level[2]=0;
		for ($i = 0; $i < 10; $i ++) {
			$ages[$i] = 0;
		}

		foreach ($allUsers as $user) {
			if ($user->profile->sex == 1) {
				$maleNum ++;
			} else if($user->profile->sex == 2) {
				$femaleNum ++;
			}

			if ($user->card->activated == 1) {
				$activateNum ++;
			}

			$level[$user->profile->level] ++;

			$i_age = intval(date('Y')) - intval(substr($user->profile->birthday, 0, 4));
			//Yii::log($i_age);
			$ages[$i_age / 10] ++;
		}

		$this->render('card', array(
			'data'=>array(
				'totalNum'=>count($allUsers),
				'maleNum'=>$maleNum,
				'femaleNum'=>$femaleNum,
				'level'=>$level,
				'ages'=>$ages,
				'activateNum'=>$activateNum,
			)
		));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionPopular()
	{

		if (isset($_POST['TestForm'])){
			// Yii::log(print_r($_POST,true));
			switch ($_POST['TestForm']['dropdown']) {
				case 0: $day = 30; break;
				case 1: $day = 7; break;
				case 2: $day = 1; break;
			}

			$sales = Sale::model()->with('product')->findAll('datediff(now(),buy_time)<='.$day);
			// Yii::log(print_r($sales,true));
			if ($sales == false) {
				Yii::app()->user->setFlash('error', '还没有相关记录噢:(');
				$this->redirect('popular');
			}

			$ana = array();
			foreach ($sales as $s) {
				if (isset($ana[$s->product->product_id]))
					$ana[$s->product->product_id] += $s->amount;
				else 
					$ana[$s->product->product_id] = 0;
			}


			$id = array_search(max($ana), $ana);
			$model = Product::model()->findByPk($id);
			$this->render('popular', array('model'=>$model));
			return;
		}


		$this->render('popular');
	}

	public function actionReservation()
	{
		$this->render('reservation');
	}

	public function actionSale()
	{
		$this->render('sale');
	}

	public function actionSalepredict()
	{
		// 分析上升最快的商品
		$week_sales = Sale::model()->with('product')->findAll('datediff(now(),buy_time)<=7');
		$month_sales = Sale::model()->with('product')->findAll('datediff(now(),buy_time)<=30');
		// Yii::log(print_r($sales,true));
		if ($week_sales == false || $month_sales == false) {
			Yii::app()->user->setFlash('error', '数据太少，还没办法预测:(');
			$this->redirect('salepredict');
		}

		$w_ana = array();
		$m_ana = array();
		foreach ($week_sales as $s) {
			if (isset($w_ana[$s->product->product_id]))
				$w_ana[$s->product->product_id] += $s->amount;
			else 
				$w_ana[$s->product->product_id] = 0;
		}

		foreach ($month_sales as $s) {
			if (isset($m_ana[$s->product->product_id]))
				$m_ana[$s->product->product_id] += $s->amount;
			else 
				$m_ana[$s->product->product_id] = 0;
		}

		$intersect = array_intersect_key($w_ana, $m_ana);
		//Yii::log(print_r($intersect, true));
		$max = 0;
		$mk = 0;
		foreach ($intersect as $k=>$v) {
			if ($w_ana[$k] / $m_ana[$k] > $max) {
				$max = $w_ana[$k] / $m_ana[$k];
				$mk = $k;
			}
		}

		if ($max != 0) {
			$this->render('salepredict', array('model'=>Product::model()->findByPk($mk)));
		} else {
			Yii::app()->user->setFlash('warning', '没有找到符合条件的商品。。。');
			$this->render('salepredict');
		}

	}

	public function actionUserprefer()
	{
		$this->render('userprefer');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}