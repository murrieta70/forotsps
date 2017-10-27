<?php

namespace app\models;

use Yii;
use app\components\Mailerforo;
/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $question
 * @property string $description
 * @property integer $created_at
 *
 * @property Answer[] $answers
 * @property User $user
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'description'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['question'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 
              'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'question' => Yii::t('app', 'Question'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['post_id' => 'id']);
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
        return $this->mailerforo->sendEmailNewPost($this);
        
    }
}