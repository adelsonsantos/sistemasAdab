<?php

namespace app\models;
/**
 * This is the model class for table "public.auth_item_child".
 *
 * @property string $parent
 * @property string $child
 */
class PublicAuthItemChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'public.auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent'], 'exist', 'skipOnError' => true,  'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true,  'targetAttribute' => ['child' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssign()
    {
        return $this->hasOne(PublicAuthAssignment::className(), ['item_name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(PublicAuthItem::className(), ['name' => 'child']);
    }
}
