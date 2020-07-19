<?php

namespace app\modules\order\helpers;

use Yii;

class UrlHelper
{
    /**
     * @param string $param
     * @param $value
     * @return bool
     */
    public static function isCurrentHasQueryParamWithValue(string $param, $value): bool
    {
        if (!self::isCurrentHasQueryParam($param)) {
            return false;
        }
        return Yii::$app->request->queryParams[$param] === (string)$value;
    }

    /**
     * @param string $param
     * @return bool
     */
    public static function isCurrentHasQueryParam(string $param): bool
    {
        return isset(Yii::$app->request->queryParams[$param]);
    }

}