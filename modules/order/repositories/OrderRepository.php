<?php

namespace app\modules\order\repositories;

use app\modules\order\models\Service;
use app\modules\order\models\Order;
use yii\db\Expression;
use yii\db\Query;

class OrderRepository
{
    public function findOrdersCountGroupByService(): array
    {
        $allOrderCountQuery = (new Query())
            ->select([
                new Expression("null as `" . Order::ATTR_SERVICE_ID . "`"),
                new Expression("'All' as `" . Service::ATTR_NAME . "`"),
                'COUNT(*) as count'])
            ->from(Order::tableName());
        $groupByServiceOrderCountQuery = (new Query())
            ->select([
                Order::ATTR_SERVICE_ID,
                Service::tableName() . '.' . Service::ATTR_NAME,
                'COUNT(*) as count'])
            ->from(Order::tableName())
            ->leftJoin(
                Service::tableName(),
                Order::tableName() . '.' . Order::ATTR_SERVICE_ID . '=' . Service::tableName() . '.' . Service::ATTR_ID)
            ->groupBy(Order::ATTR_SERVICE_ID)
            ->orderBy(['count' => SORT_DESC]);
        $allOrderCountQuery->union($groupByServiceOrderCountQuery);
        return $allOrderCountQuery->all();
    }
}