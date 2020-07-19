<?php

use app\modules\order\value_objects\OrderStatus;

return [
    OrderStatus::TITLE_PENDING => 'В ожидании',
    OrderStatus::TITLE_IN_PROGRESS => 'В процессе',
    OrderStatus::TITLE_COMPLETED => 'Завершено',
    OrderStatus::TITLE_CANCELED => 'Отменено',
    OrderStatus::TITLE_FAIL => 'Ошибка',
];
