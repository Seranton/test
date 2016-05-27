<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "just_item_image".
 *
 * @property integer $id
 * @property string $url
 * @property integer $item_id
 *
 * @property Item $item
 */
class ItemImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'just_item_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'required'],
            [['item_id'], 'integer'],
            [['url'], 'string', 'max' => 200],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
    public function unsetimage()
    {
        if (file_exists($this->url))
            unlink($this->url);
        $this->delete();
    }
}
