<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Image;

class UploadImage extends Model
{
    public $image;

    public function rules()
    {
        return[
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

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

    public function attributeLabels()
    {
        return[
            'image' => 'Загрузка нового изображения',
        ];
    }

    public function selectDirImage()
    {
        $list = scandir(Yii::getAlias('upload'), 0);
        unset($list[0],$list[1]);
        unset($list[count($list)-1], $list[count($list)-1]);
        return $list;
        
    }
}