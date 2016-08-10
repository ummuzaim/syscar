<?php

namespace app\controllers;

use yii;
use yii\web\Controller;

class TetsController extends Controller{

	public function actionTestOnly(){
	
		return $this->render('welcome');
	}
}