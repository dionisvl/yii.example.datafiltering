<?php

namespace app\modules\order\helpers;

use app\modules\order\models\Order;
use app\modules\order\models\Service;
use app\modules\order\repositories\OrderRepository;

class OrderStatusFilterHelper
{
    public static function createDropDown(): array
    {
        $ordersServiceCounts = (new OrderRepository())->findOrdersCountGroupByService();

        $filterOptions = [];
        foreach ($ordersServiceCounts as $serviceCount) {

            if (null === $serviceCount[Order::ATTR_SERVICE_ID]) {
                $filterOptions[$serviceCount[Order::ATTR_SERVICE_ID]] = $serviceCount[Service::ATTR_NAME] . ' (' . $serviceCount['count'] . ')';
            } else {
                $filterOptions[$serviceCount[Order::ATTR_SERVICE_ID]] = '<span class="label-id">' . $serviceCount['count'] . '</span>' . $serviceCount[Service::ATTR_NAME];
            }
        }
        return $filterOptions;
    }

}