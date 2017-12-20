<?php

namespace frontend\controllers;

use common\models\Company;
use common\models\Rating;
use common\models\RatingFinal;

class RatingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->request->isPost && \Yii::$app->request->isAjax && \Yii::$app->request->post('rait')) {
            $rait = \Yii::$app->request->post('rait');//оценка пользователя
            $user_id = \Yii::$app->user->identity->getId();
            $company_id = \Yii::$app->request->post('company_id');
            $res = [];
            if (!\Yii::$app->user->isGuest) {
                //есть ли запись о голосовании на материале у данного пользователя
                $userRaits = Rating::find()->where(['user_id' => $user_id])->andWhere(['company_id' => $company_id])->count();

                //если пользователь уже голосовал выводим сообщение и далее не выполняем
                if ($userRaits) {
                    $res['message'] = 'Этот голос не учитывается. Вы уже проголосовали ранее...';
                    return json_encode($res, JSON_NUMERIC_CHECK);
                }

                //Если новый голос пользователя, записываем в бд
                $newRait = new Rating();
                $newRait->value = $rait;
                $newRait->company_id = $company_id;
                $newRait->user_id = $user_id;
                $newRait->save();

                /**
                 * Вычисляем общий рейтинг с учетом изменений
                 */
                //выбираем все голоса по данной записи
                $allRaits = Rating::find()->where(['company_id' => $company_id]);

                $allUsers = $allRaits->count();//сумма всех учетных записей пользователей к дан. материалу (1а запись - 1 пользователь)
                $sumVotes = $allRaits->sum('value');//сумма всех оценок пользователей к дан. материалу

                $totalRating = round($sumVotes / $allUsers, 2);// округляем до сотых

                //записываем вычесленный рейтинг в таблицу материала в поле rating

                //sleep(1);
                //$company_id = (int)$company_id;
                $comp = Company::findOne(['id' => $company_id]);
                $comp->rating = $totalRating;
                $comp->save();

                //возвращаем новый рейтинг в вид
                //$res['rating'] = $comp->rating;//передаем вычесленный рейтинг по материалу
                //$res['ratingVotes'] = $inst->ratingVotes;//передаем сумму всех голосов по материалу

                return json_encode($res, JSON_NUMERIC_CHECK);
            }

        }
    }
}