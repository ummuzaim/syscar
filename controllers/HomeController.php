<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider; /*guna bila nak ambil data dari API atau dari tempat lain*/
use app\models\Employees;

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWelcome()
    {
        return $this->render('welcome');
    }


public function actionEmployees()
    {
        
//utk keluarkan data dlm btk form
        //query=nama model::func
        $query=Employees::find();

     /*   echo "<pre>";
        print_r($query);
        echo "</pre>";  */

        $provider=new ActiveDataProvider([
        	'query'=>$query,
        	'pagination'=>['pagesize'=>10]
        	]);

        $d['dataProvider']=$provider;



        return $this->render('employees',$d);
    }

public function actionEmployees2()
    {
        
//utk keluarkan data dlm btk form
        //query=nama model::func
        $query=Employees::find()->all();

     /*   echo "<pre>";
        print_r($query);
        echo "</pre>";  */

        $provider=new ArrayDataProvider([
        	'allModels'=>$query,
        	'pagination'=>['pagesize'=>20]
        	]);

        $d['dataProvider']=$provider;



        return $this->render('employees',$d);
    }
}
