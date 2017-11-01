<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 10/29/17
 * Time: 9:28 PM
 */

namespace backend\components;


class View extends \yii\web\View
{
    /**@var User */
    public $user;

    public function init() {
        parent::init();
        $this->user = \Yii::$app->user->getIdentity();
    }

}