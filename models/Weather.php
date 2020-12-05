<?php
namespace app\models;

use FFI\Exception;
use Yii;
use yii\base\Model;

/**
 * Класс модели для получения данных при помощи технологий API
 * Информация о геолокации и геоданных для новстного портала
 * 
 */
class Weather extends Model
{
    public $kelvinConst = 273.15; // Константа для геоданных 

    /**
     * Получение данных о геолокации (город)
     * 
     * @return mixed
     */
    public function getGeolocation()
    {
        include(Yii::getAlias('@app/config/api.php'));
        $ip = $_SERVER['REMOTE_ADDR'];
        if (($ip == '127.0.0.1') || ($ip == null)){ $ip = $api['ip-Moscow']; }
        $query = @unserialize(file_get_contents($api['ip-api'].$ip));
        if($query && $query['status'] == 'success') {
            return $query['city'];
        }
        else{
            return null;
        }
    }

    /**
     * Получение и редактирование данных о геоданных (погода)
     * 
     * @return mixed
     */
    public function getWeather()
    {
        include(Yii::getAlias('@app/config/api.php'));
        $key = $api['weatherOpenKey'];
        $city = $this->getGeolocation();
        $url = $api['openweathermap'].$city.'&appid='.$key;
        try{
            $crequest = curl_init();
                curl_setopt($crequest, CURLOPT_HEADER, 0);
                curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($crequest, CURLOPT_URL, $url);
                curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($crequest, CURLOPT_VERBOSE, 0);
                curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($crequest);

            curl_close($crequest);
            $data = json_decode($response);

            $data->main->temp_min = $data->main->temp_min - $this->kelvinConst;
            $data->main->temp_max = $data->main->temp_max - $this->kelvinConst;
            
            return $data;
        }
        catch(Exception $e){
            return false;
        }
    }
}