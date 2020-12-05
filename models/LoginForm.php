<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Класс модели для обеспечение работы формы авторизации пользователя 
 * 
 * @property User|null
 */
class LoginForm extends Model
{
    public $username; // Логин пользователя 
    public $password; // Пароль пользователя 

    public $rememberMe = true; // Логика запоминания данных профиля пользователя
    private $_user = false; // Логика авторизованного пользователя


    /**
     * Установка правил валидации для полей
     * 
     * @return array
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
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
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }

    /**
     * Проверка введенного пользователем пароля при авторизации
     * 
     * @param string 
     * @param array
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Авторизация пользователя в системе новостного портала
     * 
     * @return bool
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Получение данных авторизованного пользователя
     * 
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}