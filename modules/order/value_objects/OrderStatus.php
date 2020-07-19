<?php

namespace app\modules\order\value_objects;

class OrderStatus
{
    public const PENDING = 0;
    public const TITLE_PENDING = 'Pending';

    public const IN_PROGRESS = 1;
    public const TITLE_IN_PROGRESS = 'In progress';

    public const COMPLETED = 2;
    public const TITLE_COMPLETED = 'Completed';

    public const CANCELED = 3;
    public const TITLE_CANCELED = 'Canceled';

    public const FAIL = 4;
    public const TITLE_FAIL = 'Error';

    /**
     * @param int $value
     * @return string
     */
    public static function getLabelByValue(int $value): string
    {
        return self::getAllLabels()[$value] ?? '';
    }

    /**
     * @return string[]
     */
    public static function getAllLabels(): array
    {
        return [
            self::PENDING => \Yii::t('order/status', self::TITLE_PENDING),
            self::IN_PROGRESS => \Yii::t('order/status', self::TITLE_IN_PROGRESS),
            self::COMPLETED => \Yii::t('order/status', self::TITLE_COMPLETED),
            self::CANCELED => \Yii::t('order/status', self::TITLE_CANCELED),
            self::FAIL => \Yii::t('order/status', self::TITLE_FAIL),
        ];
    }

}