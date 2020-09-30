<?php
    namespace app\models;
    use Yii;
    use yii\base\Model;

    class Currencies extends Model
    {
        public function getCurrency($id){
            include(Yii::getAlias('@app/config/api.php'));
            $languages = simplexml_load_file($api['currency']);
            // if(isset($_COOKIE['exchangeRate'])){
            //     $saveCoefficient =  $_COOKIE['exchangeRate'];
            // }
            foreach($languages->Valute as $lang){
                if($lang["ID"] == $id){
                    $coefficient = round(str_replace(',','.',$lang->Value), 2);
                    $saveCoefficient = $coefficient;
                    //setcookie('exchangeRate', $saveCoefficient, time() + 3600 * 12);   
                }
            }
            
            return $saveCoefficient;
        }
    } 
?>