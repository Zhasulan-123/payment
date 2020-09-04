<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $fullname;
    public $email;
    public $password;
    public $auth_key;
    public $rememberMe = false;

    private $_user = false;


    public function rules()
    {
        return [
            [['password', 'email'], 'required'],
            [['username', 'fullname', 'password', 'email'], 'string', 'max' => 255],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Имя'),
            'fullname' => Yii::t('app', 'Фамилия'),
            'password' => Yii::t('app', 'Пороль'),
            'email' => Yii::t('app', 'E-mail'),
            'rememberMe' => Yii::t('app', 'Запомнить меня'),
        ];
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'Логин/Пороль введены не верно!!!'));
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            if($this->rememberMe){
                $u = $this->getUser(); 
                $u->generateAuthKey();
                $u->save();
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->email);
        }

        return $this->_user;
    }
}