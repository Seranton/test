<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "just_category".
 *
 * @property integer $id
 * @property string $label
 * @property integer $parent_id
 *
 * @property Category $parent
 * @property Category[] $categories
 * @property ItemCategory[] $itemCategories
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'just_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['label'], 'string', 'max' => 50],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Название категории',
            'parentname' => 'Название родительской категории',
            'parent_id' => 'Родительская категория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
    public function getParentname()
    {
        if ($this->parent_id){
            $parent=$this->parent;
            if ($parent){
                return ($parent->label);
            }
        }
        return ('');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemCategories()
    {
        return $this->hasMany(ItemCategory::className(), ['category_id' => 'id']);
    }
}
