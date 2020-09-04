<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class AppController extends Controller{

   public function actionAddUser($email, $password, $username, $fullname)
   {
        $security = Yii::$app->security;

        $user = new User();
        $user->email = $email;
        $user->password = $security->generatePasswordHash($password);
        $user->username = $username;
        $user->fullname = $fullname;
        $user->auth_key = $security->generateRandomString(255);
        if ($user->save()) {
            Console::output('saved');
        } else {
            var_dump($user->errors);
            Console::output("not saved");
        }
   }

}