<?php

namespace app\models;

/**
 * This is the model class for table "public.auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 * @property integer $sistema_id
 */
class PublicAuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public.auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id', 'sistema_id'], 'required'],
            [['created_at', 'sistema_id'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name'], 'exist', 'skipOnError' => true,  'targetAttribute' => ['item_name' => 'name']],
            [['sistema_id'], 'exist', 'skipOnError' => true, 'targetAttribute' => ['sistema_id' => 'sistema_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Item Name',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'sistema_id' => 'Sistema ID',
        ];
    }
}
