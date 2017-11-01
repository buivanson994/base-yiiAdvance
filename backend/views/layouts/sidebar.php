<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 10/29/17
 * Time: 9:56 PM
 */

use navatech\role\helpers\RoleChecker;
use yii\widgets\Menu;

?>

<div id="page-sidebar">
    <div class="scroll-sidebar">
        <?= Menu::widget([
            'options' => ['id' => 'sidebar-menu'],
            'activeCssClass' => 'active',
            'activateParents' => true,
            'encodeLabels' => false,
            'submenuTemplate' => '<ul id="sidebar-menu">{items}</ul>',
            'items' => [
                [
                    'options' => ['class' => 'header'],
                    'label' => '<span>Overview</span>',
                ],
                [
                    'url' => '#',
                    'visible' => true,
                    'label' => 'Admin dashboard',
                    'template' => '<a href="{url}" title="Admin Dashboard" class="sfActive">
    <i class="glyph-icon icon-linecons-tv"></i>
    <span>{label}</span>
</a>'
                ],
                [
                    'options' => ['class' => 'divider'],
                ],
                [
                    'options' => ['class' => 'no-menu'],
                    'url' => '#',
                    'visible' => true,
                    'label' => 'Admin dashboard',
                    'template' => '<a href="{url}" title="Admin Dashboard" class="sfActive">
    <i class="glyph-icon icon-linecons-tv"></i>
    <span>{label}</span>
</a>'
                ],
                [
                    'options' => ['class' => 'header'],
                    'label' => '<span>Overview</span>',
                ],
                [
                    'url' => '#',
                    'visible' => true,
                    'label' => '<i class="glyph-icon icon-linecons-diamond"></i>
            <span>Elements</span>',
                    'template' => '<a href="{url}" title="Elements" >{label} </a>',
                    'submenuTemplate' => ' <div class="sidebar-submenu"><ul>{items}</ul></div>',
                    'linkTemplate' => '<a href="{url}" title=""><span>{label}</span></a>',
                    'items' => [
                        [
                            'visible' => true,
                            'url' => '#',
                            'label' => 'Buttons'
                        ],
                        [
                            'visible' => true,
                            'url' => '#',
                            'label' => 'Buttons2'
                        ]
                    ]
                ],

            ]
        ]) ?>

    </div>
</div>
