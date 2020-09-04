<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Response;
use app\models\Paying;
use app\models\UserWallet;

/**
 * Payment controller for the `admin` module
 */
class PaymentController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = Paying::find()->asArray()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', ['model' => $model]);
    }


    public function actionSelect($id)
    {
        $model=  Paying::findOne($id);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', ['model' => $model]);
        }
    }

    public function actionCreate()
    {
        if(Yii::$app->request->isAjax){

            $sum = Yii::$app->request->post('sum');
            $commision = Yii::$app->request->post('commision');

            $model = new UserWallet();
            $model->name = Yii::$app->request->post('name');
            $model->sum = Yii::$app->request->post('sum');
            $model->user_id = Yii::$app->request->post('user_id');
            $model->commision = Yii::$app->request->post('commision');
            $model->processing = '1';
            $model->created_at = date('Y-m-d H:i:s');
            if($model->save()){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['success' => true];
            }
        }
    }

    public function actionProcessed()
    {
        $model = UserWallet::find()->asArray()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('processed', ['model' => $model]);
    }
}
