<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "just_item".
 *
 * @property integer $id
 * @property string $label
 * @property integer $quantity
 *
 * @property ItemCategory[] $itemCategories
 * @property ItemImage[] $itemImages
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $images;
    
    public static function tableName()
    {
        return 'just_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label'], 'required'],
            [['quantity'], 'integer'],
            [['label'], 'string', 'max' => 100],
            [['images'], 'file', 'skipOnEmpty' => true,'maxFiles' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Название товара',
            'quantity' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function updateImages()
    {
        foreach ($this->images as $image)
        {
            $path='img/' .$this->id.'_'.$image->baseName . '.' . $image->extension;
            $itemimage=new \app\models\ItemImage;
            $itemimage->url=$path;
            $itemimage->item_id=$this->id;
            if ($itemimage->save()){
                $image->saveAs('img/' .$this->id.'_'.$image->baseName . '.' . $image->extension);
            }
        }
    }
    public function getItemCategories()
    {
        return $this->hasMany(ItemCategory::className(), ['item_id' => 'id']);
    }
    public function recursename($category)
    {
        if (empty($category->label)) return '';
        $text='('.$category->label;
        if (!empty($category->parent_id)){
            $text.=$this->recursename($category->parent);
        }
        return $text.')';
    }
    public function getCategories_name()
    {
        $text="";
        foreach ($this->itemCategories as $category){
            if (!empty($text)) $text.=', ';
            $text.=$category->category->label;
            if (!empty($category->category->parent_id)){
                $text.=$this->recursename($category->category->parent);
            }
        }
        return ($text);
    }
    public function setCategories($id,$data)
    {
        \app\models\ItemCategory::deleteAll(['item_id'=>$id]);
        foreach ($data as $category_id) {
            if ($category_id){
                $category=new \app\models\ItemCategory;
                $category->item_id=$id;
                $category->category_id=$category_id;
                $category->save();
            }
                
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemImages()
    {
        return $this->hasMany(ItemImage::className(), ['item_id' => 'id']);
    }
    public function clearimages($data=[]) {
        if (empty($data)){
            $images=$this->itemImages;
        }
        else {
            $images= \app\models\ItemImage::find()->where('id in ('.implode(',',$data).')')->all();
        }
        
        foreach ($images as $image){
            $image->unsetimage();
        }
        
    }
    
}
