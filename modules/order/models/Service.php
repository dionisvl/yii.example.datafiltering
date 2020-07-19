<?php

namespace app\modules\order\models;

/**
 * Class Service
 * @package app\modules\order\entities
 *
 * @property integer $id
 * @property string $name
 */
class Service extends \yii\db\ActiveRecord
{
    /** @var string */
    public const ATTR_ID = 'id';

    /** @var string */
    public const ATTR_NAME = 'name';

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return 'services';
    }
}