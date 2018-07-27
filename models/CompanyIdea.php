<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CompanyIdea extends Model
{
    public $picture1;
    public $picture2;
    public $picture3;

    public $idea1;
    public $idea2;
    public $idea3;


    public function init() {
        parent::init();
        $settings = Yii::$app->settings;
        $this->picture1 = $settings->get('CompanyIdea.picture1');
        $this->picture2 = $settings->get('CompanyIdea.picture2');
        $this->picture3 = $settings->get('CompanyIdea.picture3');
        $this->idea1 = $settings->get('CompanyIdea.idea1');
        $this->idea2 = $settings->get('CompanyIdea.idea2');
        $this->idea3 = $settings->get('CompanyIdea.idea3');
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['idea1','idea2','idea3'], 'safe'],
        ];
    }
    
    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'picture1' =>  '图一',
            'idea1' =>  '理念一',
            'picture2' =>  '图二',
            'idea2' =>  '理念二',
            'picture3' =>  '图三',
            'idea3' =>  '理念三',
        ];
    }
    
    public function save(){
        $settings = Yii::$app->settings;
        $settings->set('CompanyIdea.picture1', $this->picture1);
        $settings->set('CompanyIdea.idea1', $this->idea1);
        $settings->set('CompanyIdea.picture2', $this->picture2);
        $settings->set('CompanyIdea.idea2', $this->idea2);
        $settings->set('CompanyIdea.picture3', $this->picture3);
        $settings->set('CompanyIdea.idea3', $this->idea3);
    }
}
