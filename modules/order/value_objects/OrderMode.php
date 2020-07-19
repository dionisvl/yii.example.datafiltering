<?php

namespace app\modules\order\value_objects;

class OrderMode
{
    public const MANUAL = 0;
    public const TITLE_MANUAL = 'Manual';

    public const AUTO = 1;
    public const TITLE_AUTO = 'Auto';


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
            self::MANUAL => \Yii::t('order/mode', self::TITLE_MANUAL),
            self::AUTO => \Yii::t('order/mode', self::TITLE_AUTO),
        ];
    }
}