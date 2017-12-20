<?php
namespace frontend\controllers;

use common\models\AboutProject;
use common\models\Banner;
use common\models\BannerGrief;
use common\models\Calendar;
use common\models\CalendarPreview;
use common\models\CalendarReports;
use common\models\Catalog;
use common\models\CatalogGoods;
use common\models\CatalogSubcategories;
use common\models\Interview;
use common\models\Magazine;
use common\models\NewsCategories;
use common\models\Partner;
use common\models\Technologies;
use common\models\News;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use yii2fullcalendar\models\Event;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'bootstrap';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "bootstrap";

        $newsSeven = News::find()->offset(6)->limit(1)->orderBy(['id' => SORT_DESC])->one();
        $newsFour = News::find()->offset(3)->limit(1)->orderBy(['id' => SORT_DESC])->one();
        $newsLast = News::find()->limit(1)->orderBy(['id' => SORT_DESC])->one();
        $newsL = News::find()->offset(1)->limit(2)->orderBy(['id' => SORT_DESC])->all();
        $newsF = News::find()->offset(4)->limit(2)->orderBy(['id' => SORT_DESC])->all();
        $newsS = News::find()->offset(8)->limit(2)->orderBy(['id' => SORT_DESC])->all();
        $newCat = NewsCategories::find()->all();
        $preview = CalendarPreview::find()->all();
        $calPreview = CalendarPreview::find()->limit(3)->orderBy(['id' => SORT_DESC])->all();
        $reports = CalendarReports::find()->all();
        $calendar = Calendar::find()->all();
        $calendarSite = Calendar::find()->limit(3)->orderBy(['id' => SORT_DESC])->all();
        $catalog = Catalog::find()->all();
        $interview = Interview::find()->all();
        $technologies = Technologies::find()->all();
        $magazine = Magazine::find()->orderBy(['id' => SORT_DESC])->all();
        //var_dump($news);die();
        $events = [];
        $index = 0;
        foreach($preview as $preview_v){
            $Event = new Event();
            $Event->id = $index;
            $Event->title = $preview_v->title;
            $Event->start = date('Y-m-d\TH:i:s\Z',$preview_v->time_spending);
            $events[] = $Event;
            $index++;
        }

        foreach($calendar as $calendar_v){
            $Event = new Event();
            $Event->id = $index;
            $Event->title = $calendar_v->title;
            $Event->start = date('Y-m-d\TH:i:s\Z',$calendar_v->time_spending);
            $events[] = $Event;
            $index++;
        }
        foreach($reports as $report_v){
            $Event = new Event();
            $Event->id = $index;
            $Event->title = $report_v->title;
            $Event->start = date('Y-m-d\TH:i:s\Z',$report_v->created_at);
            $events[] = $Event;
            $index++;
        }

        $banner = Banner::find()->limit(3)->all();
        $partner = Partner::find()->limit(15)->all();
        $bannerGriefOne = BannerGrief::find()->limit(1)->orderBy(['id' => SORT_DESC])->one();
        $bannerGriefTwo = BannerGrief::find()->offset(2)->limit(1)->orderBy(['id' => SORT_DESC])->one();
        $bannerGriefThree = BannerGrief::find()->offset(3)->limit(1)->orderBy(['id' => SORT_DESC])->one();

        return $this->render('index',[
            'newsSeven' => $newsSeven,
            'newsFour' => $newsFour,
            'newsLast' => $newsLast,
            'newsL' => $newsL,
            'newsF' => $newsF,
            'newsS' => $newsS,
            'newCat' => $newCat,
            'calendar' => $calendar,
            'preview' => $preview,
            'calPreview' => $calPreview,
            'calendarSite' => $calendarSite,
            'catalog' => $catalog,
            'interview' => $interview,
            'technologies' => $technologies,
            'magazine' => $magazine,
            'events' => $events,
            'banner' => $banner,
            'partner' => $partner,
            'bannerGriefOne' => $bannerGriefOne,
            'bannerGriefTwo' => $bannerGriefTwo,
            'bannerGriefThree' => $bannerGriefThree,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $about = AboutProject::findOne(['id'=>1]);
        return $this->render('about',[
            'about' => $about,
        ]);
    }

    public function actionRedaction()
    {
        return $this->render('redaction');
    }

    public function actionMap()
    {
        return $this->render('map');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        $catalog = Catalog::find()->all();

        $catalogSub = CatalogSubcategories::find()->all();

        $catalogGod = CatalogGoods::find()->all();

        if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            if($model->load(\Yii::$app->request->post())) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }


        if($model->load(\Yii::$app->request->post())){
            $user = $model->signup();
            if(\Yii::$app->getUser()->login($user)){
                $user_id = \Yii::$app->user->identity->getId();

                $company = $model->signinCompany($user_id);

                $company_id = $company->id;
                //var_dump($company_id);die();

                foreach ($catalog as $cat) {
                    if (\Yii::$app->request->post('name_cat_'.$cat['id'])) {
                        $catalog_id = \Yii::$app->request->post('name_cat_'.$cat['id']);
                        $model->signinCatalogCompany($company_id, $catalog_id);
                    }
                }

                foreach ($catalogSub as $catS) {
                    if (\Yii::$app->request->post('name_sub_'.$catS['id'])) {
                        $catalogSub_id = \Yii::$app->request->post('name_sub_'.$catS['id']);
                        $model->signinCatalogSubCompany($company_id, $catalogSub_id);
                    }
                }

                foreach ($catalogGod as $catG) {
                    if (\Yii::$app->request->post('name_god_'.$catG['id'])) {
                        $catalogGod_id = \Yii::$app->request->post('name_god_'.$catG['id']);
                        $model->signinCatalogGoodsCompany($company_id, $catalogGod_id);
                    }
                }

                $model->file = UploadedFile::getInstance($model, 'file');

                if($model->file){
                        $name = $user_id . '.' . $model->file->extension;
                        $model->file->saveAs('uploads/logotype/' . $name);
                    }

               return $this->goHome();
            }

        }

        return $this->render('signup', [
            'model' => $model,
            'catalog' => $catalog,
            'catalogSub' => $catalogSub,
            'catalogGod' => $catalogGod,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
