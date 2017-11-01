<?php

namespace backend\controllers\user;
use navatech\role\filters\RoleFilter;
use yii\filters\AccessControl;
use yii\filters\AccessRule;

/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 10/29/17
 * Time: 9:43 PM
 */

class AdminController extends \dektrium\user\controllers\AdminController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors                     = parent::behaviors();
        $behaviors['role']             = [
            'class'   => RoleFilter::className(),
            'name'    => 'Người Dùng',
            'actions' => [
                'index'  => "Danh sách",
                'view'   => "Xem",
                'create' => "Thêm",
                'update' => "Sửa",
                'delete' => "Xóa",
            ],
        ];
        $behaviors          ['access'] = [
            'class'      => AccessControl::className(),
            'ruleConfig' => [
                'class' => AccessRule::className(),
            ],
            'rules'      => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];
        return $behaviors;
    }
    /**
     * {@inheritDoc}
     */
    public function actionIndex() {
        return parent::actionIndex();
    }
}
