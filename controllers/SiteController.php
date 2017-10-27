<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Post;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?','@'],
                        'matchCallback' => function ($rule, $action) {
                          if( !Yii::$app->user->isGuest) {
                              if( Yii::$app->user->identity->profile->name == '') {
                                  return $this->redirect(['/user/settings/profile']);
                              } else {                      	   	
                                return true;
                              }                       		
                          } else {
                            return true;
                          }
                        },
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
     * @return string
     */
    public function actionIndex()
    {
    	  $search = Yii::$app->request->get('search', 0);
    	      	      	  
    	  if($search) {    	  	
    	  	 // buscar en la tabla foro 
    	  	 $query = Post::find()->andFilterWhere(['like', 'question', $search]);
    	  	 
        } else {
          //todos los posts        	
          $query =  Post::find();        
       }
           	    
  	    $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
       ]);
    	    
 	    $posts = $query->orderBy('created_at DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

    	      	  
        return $this->render('index',
              ['posts' => $posts ,
               'pagination' => $pagination,               
        ]);
    }

    public function actionView($id)
    {
    	   $post=Post::findOne($id);
    	   return $this->render('view',['post'=>$post]);
    	    
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionMail()
    {
        return $this->render('layoutMail');
    }
    
        public function actionPhp()
    {
        return $this->render('phpcode');
    }

}
