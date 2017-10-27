<?php

namespace app\models;

use Yii;
use app\components\Mailerforo;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $answer
 * @property integer $created_at
 *
 * @property Post $post
 * @property User $user
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer'], 'required'],
            [['post_id', 'user_id', 'created_at'], 'integer'],
            [['answer'], 'string'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', 'Post ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'answer' => Yii::t('app', 'Answer'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

     /**
     * @return Mailerforo
     * @throws \yii\base\InvalidConfigException
     */
    protected function getMailerforo()
    {
        return \Yii::$container->get(Mailerforo::className());
    }
       
    public function sendEmail()
    {
        return $this->mailerforo->sendEmailAnswerPost($this);
        
    }    
}
