<?php
namespace app\controllers;
use Yii;
use app\models\Orders;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Orderdetails;
/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orders();
        $modelOrderdetail = new Orderdetails();
       if($model->load(Yii::$app->request->post()) && $model->validate() && $modelOrderdetail->validate()){
             $model->save();    
             $modelOrderdetail->orderNumber=$model->orderNumber;
             $modelOrderdetail->quantityOrdered='12';
            if($modelOrderdetail->load(Yii::$app->request->post())
             && $modelOrderdetail->save()){
                return $this->redirect(['view', 'id' => $model->orderNumber]);
        
         
            }else{
            //     $errors=$modelOrderdetail->errors;
            // print_r($errors);
                  return $this->render('create', [
                'model' => $model,'modelOrderdetail'=>$modelOrderdetail
            ]);
            }
    
         } else {
            return $this->render('create', [
                'model' => $model,'modelOrderdetail'=>$modelOrderdetail
            ]);
        }
    }
    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Orders::findOne($id);
        if(!$model){
            throw new NotFoundHttpException("The user was not found.");
        }
        
        $modelOrderdetail = Orderdetails::findOne($model->orderNumber);
        if(!$modelOrderdetail){
            throw new NotFoundHttpException("The user was not found.");
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->orderNumber]);


        } else {
            return $this->render('update', [
                'model' => $model,
                'modelOrderdetail'=>$modelOrderdetail
            ]);
        }
    }
    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}