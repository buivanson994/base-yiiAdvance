<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 10/31/17
 * Time: 11:02 PM
 */

namespace backend\controllers;


use dektrium\user\controllers\SecurityController;

class UserController extends SecurityController {
    public $layout='@backend/views/layouts/login';
}
