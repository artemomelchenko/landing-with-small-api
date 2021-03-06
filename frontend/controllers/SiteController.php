<?php
namespace frontend\controllers;

use common\models\Categories;
use common\models\Leads;
use common\models\LeadsSettings;
use common\models\Manufacturers;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $leads = new Leads();
        $leadset = new LeadsSettings();
        $categories = Categories::find()->all();
        $manufacturers = Manufacturers::find()->all();

        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            if ($data['data']['form-name'] == 'getDiscont') {
            $leads->name = isset($data['data']['name']) ? $data['data']['name'] : '';
            $leads->phone = $data['data']['phone'];
            $leads->date_create = new Expression('NOW()');
            $leads->form_name = $data['data']['form-name'];

                $array = [
                    'array' => [
                        '????\'??' => $leads->name,
                        '?????????????????? ??????????????' => $leads->phone,
                        '?????????? ??????????' => ($leads->form_name == 'getDiscont')?'???????????????? ????????????':'',
                    ]
                ];

               Leads::sendToTelegram($array['array']);
               Leads::sendEmail($array);



                $leads->save();
            }
            elseif ($data['data']['form-name'] == 'getPrice'){
                $leads->name = isset($data['data']['name']) ? $data['data']['name'] : '';
                $leads->phone = $data['data']['phone'];
                $leads->date_create = new Expression('NOW()');
                $leads->form_name = $data['data']['form-name'];
                $array = [
                    'array' => [
                        '????\'??' => $leads->name,
                        '?????????????????? ??????????????' => $leads->phone,
                        '?????????? ??????????' => ($leads->form_name == 'getPrice')? '?????????????????? ????????':'' ,
                    ]
                ];

               Leads::sendToTelegram($array['array']);
               Leads::sendEmail($array);
                $leads->save();
            }


            elseif($data['data']['form-name'] == 'getCatalog' ){
                $leads->name = isset($data['data']['name']) ? $data['data']['name'] : '';
                $leads->phone = $data['data']['phone'];
                $leads->date_create = new Expression('NOW()');
                $leads->form_name = $data['data']['form-name'];
                $array = [
                    'array' => [
                        '????\'??' => $leads->name,
                        '?????????????????? ??????????????' => $leads->phone,
                        '?????????? ??????????' =>  ($leads->form_name == 'getCatalog')? '?????????????????????? ??????????????':'',
                    ]
                ];

                Leads::sendToTelegram($array['array']);
                Leads::sendEmail($array);
                $leads->save();
//                $filePath = '/web/files/sss.pdf';
//                $filename = 'sss.pdf';
//                $completePath = Yii::getAlias('@frontend'.$filePath);
////                VarDumper::dump($completePath,10,1);
//                Yii::$app->response->sendFile($completePath, $filename);
//                $this->getView()->registerJs("window.location.assign('http://'+window.location.hostname+'/pdf');");
            }
            elseif ($data['data']['form-name'] == 'getCalculator'){

                $leads->name = isset($data['data']['name']) ? $data['data']['name'] : '';
                $leads->phone = $data['data']['phone'];
                $leads->form_name = $data['data']['form-name'];
                $leads->date_create = new Expression('NOW()');
                $leads->save();
                $leadset->manufacturer = $data['data']['manifacturer'];
                $leadset->thickness =$data['data'][ 'depth'];
                $leadset->square = $data['data']['area'];
                $leadset->leads_id = $leads->id;
                $leadset->save();
                $array = [
                    'array' => [
                        '????\'??' => $leads->name,
                        '?????????????????? ??????????????' => $leads->phone,
                        '?????????? ??????????' =>($leads->form_name == 'getCalculator')? '???????????????? ???????????? ???? ???????????????????? ?????????? ????????????':'',
                        '????????????????' =>$leadset->manufacturer,
                        '??????????????' =>$leadset->thickness,
                        '??????????' =>$leadset->square,

                    ]
                ];

                Leads::sendToTelegram($array['array']);
              Leads::sendEmail($array);

            }

        }


        return $this->render('index', [
            'categories' => $categories,
            'manufacturers' => $manufacturers,
        ]);
    }

    public function actionPdf(){
        $filePath = '/web/files/sss.pdf';
        $filename = 'sss.pdf';
        $completePath = Yii::getAlias('@frontend'.$filePath);
        return Yii::$app->response->sendFile($completePath, 'sss.pdf')->send();
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        } else {
//            $model->password = '';
//
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        } else {
//            return $this->render('contact', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
//            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
//            return $this->goHome();
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
//    public function actionRequestPasswordReset()
//    {
//        $model = new PasswordResetRequestForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//
//                return $this->goHome();
//            } else {
//                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
//            }
//        }
//
//        return $this->render('requestPasswordResetToken', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
//    public function actionResetPassword($token)
//    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidArgumentException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
//            Yii::$app->session->setFlash('success', 'New password saved.');
//
//            return $this->goHome();
//        }
//
//        return $this->render('resetPassword', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
//    public function actionVerifyEmail($token)
//    {
//        try {
//            $model = new VerifyEmailForm($token);
//        } catch (InvalidArgumentException $e) {
//            throw new BadRequestHttpException($e->getMessage());
//        }
//        if ($user = $model->verifyEmail()) {
//            if (Yii::$app->user->login($user)) {
//                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
//                return $this->goHome();
//            }
//        }
//
//        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
//        return $this->goHome();
//    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
//    public function actionResendVerificationEmail()
//    {
//        $model = new ResendVerificationEmailForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail()) {
//                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
//                return $this->goHome();
//            }
//            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
//        }
//
//        return $this->render('resendVerificationEmail', [
//            'model' => $model
//        ]);
//    }
}
