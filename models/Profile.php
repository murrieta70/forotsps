<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use dektrium\user\models\Profile as BaseProfile;

class Profile extends BaseProfile
{
    public function rules()
    {
    	  $rules = parent::rules();
    	  
        return ArrayHelper::merge($rules,[            
            'nameRequired'         => ['name', 'required'],            
        ]);
    }	
}
?>