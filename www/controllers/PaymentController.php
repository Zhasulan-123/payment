<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\LoginForm;
use app\models\Paying;


class PaymentController extends AppController
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;

        return $this->render('index', compact('session'));
    }


    public function actionAdd()
    {
        $data = Yii::$app->request->post();

        if (Yii::$app->request->isAjax) {

            $session = Yii::$app->session;
            $session->open();
            $model = new Paying();
            $model->addSum($data);
            Yii::$app->response->format = Response::FORMAT_JSON;
            $html = $this->renderPartial('add', compact('session'), true);
            return ['success' => true, 'html' => $html];
        }else{
            return ['error' => true];
        }

    }

    public function actionClear()
    {
        if (Yii::$app->request->isAjax) {
            $session =Yii::$app->session;
            $session->open();
            $session->remove('paying');
            $session->remove('paying.count');
            $session->remove('paying.price');
            Yii::$app->response->format = Response::FORMAT_JSON;
            $html = $this->renderPartial('add', [], true);
            return ['success' => true, 'html' => $html];
        }else{
            return ['error' => true];
        }
    }

    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        
        if (Yii::$app->request->isAjax) {
            $session =Yii::$app->session;
            $session->open();
            $model = new Paying();
            $model->sumсalc($id);
            Yii::$app->response->format = Response::FORMAT_JSON;
            $html = $this->renderPartial('add', compact('session'), true);
            return ['success' => true, 'html' => $html];
        }else{
            return ['error' => true];
        }
    }

    public function actionCreate()
    {
        $session =Yii::$app->session;
        $session->open();
        $sum = $session['paying'];

        if (Yii::$app->request->isAjax) {
            foreach($sum as $id => $item){
                $model = new Paying();
                $model->name = $item['name'];
                $model->sum = $item['sum'];
                $model->order_number = $item['order_number'];
                $model->signature = $item['signature'];
                $model->created_ad = date('Y-m-d H:i:s');
                $model->save();
                
            }
            return true;
       }
       
    }

    /**
     * Displays Login-page.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Action Logout.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
