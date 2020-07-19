<?php

use app\modules\order\assets\OrderAsset;
use app\modules\order\models\Order;
use app\modules\order\helpers\OrderStatusFilterHelper;
use app\modules\order\models\OrderSearch;
use app\modules\order\value_objects\OrderMode;
use app\modules\order\value_objects\OrderStatus;
use app\modules\order\widgets\HeaderDropDownWidget;
use app\modules\order\widgets\TabsWidget;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\order\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

OrderAsset::register($this);
$this->registerCss("
    .label-default{
      border: 1px solid #ddd;
      background: none;
      color: #333;
      min-width: 30px;
      display: inline-block;
    }
");
?>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Orders</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <ul class="nav nav-tabs p-b">
        <?= TabsWidget::widget([
            'column' => Order::ATTR_STATUS,
            'rootTitle' => 'All orders',
            'choices' => OrderStatus::getAllLabels(),
        ]) ?>
        <li class="pull-right custom-search">
            <form class="form-inline" action="/" method="get">
                <a href="<?= 'download' . ltrim(Yii::$app->request->getUrl(), '/'); ?>" target="_blank"
                   class="btn btn-info">Save result</a>

                <div class="input-group">

                    <input type="text" name="<?= OrderSearch::ATTR_SEARCH_VALUE ?>" class="form-control" value=""
                           placeholder="Search orders">
                    <span class="input-group-btn search-select-wrap">
                        <select class="form-control search-select" name="<?= OrderSearch::ATTR_SEARCH_COLUMN ?>">
                            <option value="<?= Order::ATTR_ID ?>" selected="">Order ID</option>
                            <option value="<?= Order::ATTR_LINK ?>"><?= \Yii::t('order', 'Link') ?></option>
                            <option value="<?= Order::ATTR_USER ?>"><?= \Yii::t('order', 'Username') ?></option>
                        </select>
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
            </form>
        </li>
    </ul>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '<div>{begin} to {end} of {totalCount}</div>',
        'layout' => "{items}\n{pager}\t{summary}",
        'pager' => ['options' => ['class' => 'col-sm-8 pagination']],
        'tableOptions' => ['class' => 'table order-table'],
        'columns' => [
            Order::ATTR_ID,
            [
                'attribute' => Order::ATTR_USER,
                'header' => \Yii::t('order', 'User'),
            ],
            [
                'attribute' => Order::ATTR_LINK,
                'header' => \Yii::t('order', 'Link'),
            ],
            [
                'attribute' => Order::ATTR_QUANTITY,
                'header' => \Yii::t('order', 'Quantity'),
            ],
            [
                'attribute' => Order::ATTR_SERVICE_ID,
                'header' => HeaderDropDownWidget::widget([
                    'title' => \Yii::t('order', 'Service'),
                    'column' => Order::ATTR_SERVICE_ID,
                    'choices' => OrderStatusFilterHelper::createDropDown(),
                ]),
                'content' => function ($item) {
                    return '<span class="label-id">' . $item[Order::ATTR_SERVICE_ID] . '</span>' . $item['service_name'];
                },
            ],
            [
                'attribute' => Order::ATTR_STATUS,
                'content' => function ($item) {
                    return OrderStatus::getLabelByValue($item[Order::ATTR_STATUS]);
                },
            ],
            [
                'attribute' => Order::ATTR_CREATED_AT,
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => Order::ATTR_MODE,
                'header' => HeaderDropDownWidget::widget([
                    'title' => \Yii::t('order', 'Mode'),
                    'column' => Order::ATTR_MODE,
                    'choices' => OrderMode::getAllLabels(),
                ]),
                'content' => function ($item) {
                    return OrderMode::getLabelByValue($item[Order::ATTR_MODE]);
                },
            ],
        ],
    ]); ?>
</div>