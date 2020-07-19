<?php

namespace app\modules\order\controllers;

use Yii;
use app\modules\order\models\OrderSearch;


class OrderController extends \yii\web\Controller
{

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Search Result to CSV direct download
     */
    public function actionDownload()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $filename = 'orders_' . date('Y-m-d') . '.csv';
        $fp = fopen($filename, 'w');

        $items = $dataProvider->allModels;
        foreach ($items as $key => $item) {
            fputcsv($fp, $item, ';');
        }
        fclose($fp);

        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=$filename");
        readfile("$filename");
        die();
    }
}
