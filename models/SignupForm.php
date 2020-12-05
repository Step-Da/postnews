<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Класс модели для обеспечение работы формы регистрации пользователя 
 * 
 */
class SignupForm extends Model
{
    public $username; // Новый логин пользователя
    public $email; // Новый адрес электронной почты пользователя
    public $password; // Новый пароль пользователя


    /**
     * Установка правил валидации для полей
     * 
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такое логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такая почта уже занята.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Установка наименования полей таблицы в клиентской части
     * 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return[
            'username' => 'Имя пользователя',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
        ];
    }

    /**
     * Регистрация нового профиля пользователя новстного портала
     * 
     * @return User|null
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = "Author";
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}