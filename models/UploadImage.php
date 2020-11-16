<?php
namespace app\models;

use Yii;
use yii\base\Model;

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
        if($this->validate()){
            $this->image->saveAs("upload/{$this->image->baseName}.{$this->image->extension}");
        }
        else{ 
            return false; 
        }
    }

    public function selectDirImage()
    {
        $list = scandir(Yii::getAlias('upload'), 0);
        unset($list[0],$list[1]);
        unset($list[count($list)-1], $list[count($list)-1]);
        return $list;
    }
}