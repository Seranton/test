<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "just_item_discount".
 *
 * @property integer $id
 * @property integer $item_id
 * @property integer $first_condition
 * @property integer $second_condition
 * @property double $discount
 */
class ItemDiscount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'just_item_discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id'], 'required'],
            [['item_id', 'first_condition', 'second_condition'], 'integer'],
            [['discount'], 'number'],
        ];
    }
    public function getItemName()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Товар',
            'first_condition' => 'Количество больше',
            'second_condition' => 'Количество меньше',
            'discount' => 'Скидка',
        ];
    }
}
