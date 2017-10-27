<?php

namespace app\controllers;

use Yii;
use app\models\Answer;
use app\models\AnswerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\models\Answertoken;
use app\models\User;
use app\lib\Lib;
use dektrium\user\traits\EventTrait;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends Controller
{

    use EventTrait;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','delete'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                      'actions' => ['delete'],
                      'allow' => true,
                      'roles' => ['administrator'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
      * token enviado via email
      *
      */
      
     public function actionToken($code)
     {
     	  
     	  $answertoken = Answertoken::findOne(['token' => $code]);     	       	 
     	  
     	  $user = User::findOne($answertoken->user_id);
     	  
     	  if( Yii::$app->getUser()->login($user, 0) ) {
     	  	  return $this->redirect(['create', 'postId' => $answertoken->post_id]);
        } else {
        	  die;
        }     	  
     }
      
    /**
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Answer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Answer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($postId)
    {
        $model = new Answer();
        $model->user_id = Yii::$app->user->identity->id;
        $model->post_id = $postId;
        $model->created_at = time();                        
           
        if ($model->load(Yii::$app->request->post()) && 
        $model->save()) {
        	   $model->answer = Lib::parseCode($model->answer);
        	   $model->save();
        	   $model->sendEmail();        	   
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $post = \app\models\Post::findOne($postId);
            return $this->render('create', [
                'model' => $model,
                'post'  => $post,
            ]);
        }
    }

    /**
     * Updates an existing Answer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Answer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Answer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Answer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Answer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
