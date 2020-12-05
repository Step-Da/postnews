<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Класс модели для получения данных при помощи технологий API
 * Информация курсов валют для новостного портала
 * 
 */
class Currencies extends Model
{   
    /**
     * Формирования запроса и получение данных курсов валют для новостного портала
     * 
     * @param integer
     * @return mixed
     */
    public function getCurrency($id)
    {
        include(Yii::getAlias('@app/config/api.php'));
        $languages = simplexml_load_file($api['currency']);

        foreach($languages->Valute as $lang){
            if($lang["ID"] == $id){
                $coefficient = round(str_replace(',','.',$lang->Value), 2);
                $saveCoefficient = $coefficient;
            }
        }
        
        return $saveCoefficient;
    }
} 