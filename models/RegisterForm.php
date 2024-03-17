<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $login;
    public $fio;
    public $email;
    public $phone;
    public $password;
    public $password_repeat;
    public $agree;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['login', 'fio', 'email', 'phone', 'password', 'password_repeat', 'agree'], 'required'],
            ['email', 'email'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            ['agree', 'required', 'requiredValue' => true, 'message' => 'соласие на обработку данных, надо поставить галочку'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['fio', 'match', 'pattern' => '/^[а-яё0-9]+$/i'],
            ['password', 'match', 'pattern' => '/^[a-z]+$/i'],
            ['phone', 'match', 'pattern' => '/^\+7\(\d{3}\)\-\d{3}(\-\d{2}){2}$/'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }


    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->password = $this->pass;
        }
        return $user ?? false;
    }
}
