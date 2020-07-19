<?php

namespace app\modules\order\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $user
 * @property string $link
 * @property int $quantity
 * @property int $service_id
 * @property int $status 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
 * @property int $created_at
 * @property int $mode 0 - Manual, 1 - Auto
 */
class Order extends \yii\db\ActiveRecord
{
    public const ATTR_ID = 'id';
    public const ATTR_USER = 'user';
    public const ATTR_LINK = 'link';
    public const ATTR_QUANTITY = 'quantity';
    public const ATTR_SERVICE_ID = 'service_id';
    public const ATTR_STATUS = 'status';
    public const ATTR_CREATED_AT = 'created_at';
    public const ATTR_MODE = 'mode';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'link', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'required'],
            [['quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
            [['user', 'link'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            self::ATTR_ID => Yii::t('order', 'ID'),
            self::ATTR_USER => Yii::t('order', 'User'),
            self::ATTR_LINK => Yii::t('order', 'Link'),
            self::ATTR_SERVICE_ID => Yii::t('order', 'Quantity'),
            self::ATTR_QUANTITY => Yii::t('order', 'Service ID'),
            self::ATTR_STATUS => Yii::t('order', 'Status'),
            self::ATTR_CREATED_AT => Yii::t('order', 'Created At'),
            self::ATTR_MODE => Yii::t('order', 'Mode'),
        ];
    }
}
