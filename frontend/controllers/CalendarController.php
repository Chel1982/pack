<?php

namespace frontend\controllers;

use common\models\Calendar;
use common\models\CalendarPreview;
use common\models\CalendarReports;
use common\models\Partner;
use yii2fullcalendar\models\Event;
use yii\data\Pagination;

class CalendarController extends \yii\web\Controller
{
    public $layout = 'bootstrap';

    public function actionIndex()
    {
        $calendar = Calendar::find()->orderBy(['id' => SORT_DESC]);
        $partner = Partner::find()->limit(15)->all();

        $events = [];

        for($month = 0;$month<3;$month++){
            $index = 0;
            $interval = 'MONTH(NOW())';
            if($month != 0){
                $interval = 0/*'MONTH(DATE_ADD(NOW(), INTERVAL -'.$month.' MONTH))'*/;
            }
            $calendar_widget = Calendar::find()->where('MONTH(FROM_UNIXTIME(`time_spending`)) = '.$interval.' AND YEAR(FROM_UNIXTIME(`time_spending`)) = YEAR(NOW())')->all();

            $preview_widget = CalendarPreview::find()->where('MONTH(FROM_UNIXTIME(`time_spending`)) = '.$interval.' AND YEAR(FROM_UNIXTIME(`time_spending`)) = YEAR(NOW())')->all();
            $reports_widget = CalendarReports::find()->where('MONTH(FROM_UNIXTIME(`created_at`)) = '.$interval.' AND YEAR(FROM_UNIXTIME(`created_at`)) = YEAR(NOW())')->all();

            foreach ($preview_widget as $preview_v) {
                $Event = new Event();
                $Event->id = $index;
                $Event->title = $preview_v->title;
                $Event->start = date('Y-m-d\TH:i:s\Z', $preview_v->time_spending);
                $events[$month][] = $Event;
                $index++;
            }

            foreach ($calendar_widget as $calendar_v) {
                $Event = new Event();
                $Event->id = $index;
                $Event->title = $calendar_v->title;
                $Event->start = date('Y-m-d\TH:i:s\Z', $calendar_v->time_spending);
                $events[$month][] = $Event;
                $index++;
            }

            foreach ($reports_widget as $report_v) {
                $Event = new Event();
                $Event->id = $index;
                $Event->title = $report_v->title;
                $Event->start = date('Y-m-d\TH:i:s\Z', $report_v->created_at);
                $events[$month][] = $Event;
                $index++;
            }
        }

        $countQuery = clone $calendar;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $pages->pageSizeParam = false;
        $models = $calendar->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'events' => $events,
            'partner' => $partner,
            ]);
    }

    public function actionCalendarOne()
    {
        $id = \Yii::$app->request->get('id');

        $preview = Calendar::findOne($id);

        return $this->render('calendar_one', [
            'preview' => $preview
        ]);
    }

    public function actionPreviews()
    {
        $preview = CalendarPreview::find()->orderBy(['id' => SORT_DESC]);
        $partner = Partner::find()->limit(15)->all();

        $countQuery = clone $preview;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $pages->pageSizeParam = false;
        $models = $preview->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('previews', [
            'partner' => $partner,
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionPreview()
    {
        $id = \Yii::$app->request->get('id');

        $preview = CalendarPreview::findOne($id);

        return $this->render('preview',[
            'preview' => $preview,
        ]);
    }

    public function actionReport()
    {
        $report = CalendarReports::find()->orderBy(['id' => SORT_DESC]);

        $countQuery = clone $report;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        $pages->pageSizeParam = false;
        $models = $report->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('report',[
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}
