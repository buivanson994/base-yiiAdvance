<?php
namespace backend\components;
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 10/29/17
 * Time: 9:24 PM
 */

class Controller extends \yii\web\Controller
{
    /**@var User */
    public $user;

    /**@var Cache */
    public $cache;

    public function init() {
        parent::init();
        $this->cache = \Yii::$app->cache;
        $this->user  = \Yii::$app->user->getIdentity();
    }
}