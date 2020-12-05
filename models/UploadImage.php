<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Image;

/**
 * Класс модели для обеспечение работы формы загрузки изображения в галерею
 * 
 */
class UploadImage extends Model
{
    public $image; // данные загружаемого изображения

    /**
     * Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return[
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * Зашрузка новго изображения на сервер и в базу данных
     * 
     * @return Response
     */
    public function upload()
    {
        $Image = new Image;

        if($this->validate()){
            $this->image->saveAs("upload/{$this->image->baseName}.{$this->image->extension}");
            
            $Image->nameImage = $this->image->name;
            $Image->pathImage = '/upload/'.$this->image->name;
            $Image->type = $this->image->type;
            $Image->size =  $this->image->size;
            $Image->id_user = Yii::$app->user->identity->id;

            $Image->save();
        }
        else{ 
            return false; 
        }   
    }

    /**
     * Установка наименования полей таблицы в клиентской части
     * 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return[
            'image' => 'Загрузка нового изображения',
        ];
    }

    /**
     * Формирование списка изображений пользователя в сиситеме новостного поратала
     * 
     * @return string
     */
    public function selectDirImage()
    {
        $gallery = Image::find()->where(['id_user' => Yii::$app->user->identity->id])->all();

        $list = scandir(Yii::getAlias('upload'), 0);
        unset($list[0],$list[1]);
        unset($list[count($list)-1], $list[count($list)-1]);
           
        foreach($gallery as $image){
            foreach($list as $data){
                if ($image['nameImage'] == $data){
                    $path[] = $data;
                }
            }
        }
        return $path;
    }
}