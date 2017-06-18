<?php
namespace pistol88\hospital\controllers;

use yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use pistol88\hospital\models\PacientForm;
use pistol88\hospital\models\RecordSearch;

class PacientController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'update-status'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => $this->module->adminRoles,
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['update-status'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        $model = new RecordSearch();

        return $this->render('index', [
            'dataProvider' => $model->search(Yii::$app->request->queryParams),
            'searchModel' => $model,
        ]);
    }
    
    public function actionUpdateStatus()
    {
        $model = PacientForm::findOne(yii::$app->request->post('id'));
        $model->status = yii::$app->request->post('status');
        $model->save();
        
        return json_encode(['result' => 'success']);
    }
    
    public function actionForm()
    {
        $model = new PacientForm;
        
        $model->status = 0;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            yii::$app->session->setFlash('pacientFormDone', yii::t('hospital', 'Thanks'));
            $model = new PacientForm;
        }
        
        return $this->render('pacient-form', [
            'pjax' => yii::$app->request->isAjax ? true : false,
            'model' => $model,
        ]);
    }
}
