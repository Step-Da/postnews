<?php
    namespace app\models;
    use Yii;
    use yii\base\Model;

    class Weather extends Model
    {
        public function getGeolocation()
        {
            include(Yii::getAlias('@app/config/api.php'));

            $ip = $_SERVER['REMOTE_ADDR'];
            if (($ip == '127.0.0.1') || ($ip == null)){ $ip = $api['ip-Moscow']; }
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
            if($query && $query['status'] == 'success') {
                return $query['city'];
            }
            else{
                return null;
            }
        }

        public function getWeather()
        {
            include(Yii::getAlias('@app/config/api.php'));
            $key = $api['weatherOpenKey'];
            $city =  $this->getGeolocation();

            $url = $api['openweathermap'].$city.'&appid='.$key;

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

            return $data;
        }
    }
?>