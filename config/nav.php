<?php

return [
    'NAV'=>[
        [
            'name'=>'RBAC',
            'icon'=>'user',
            'access'=>[
                [
                'name'=>'管理员列表',
                'access'=>'admin/admin/index',
                'icon'=>''
                ],
                [
                'name'=>'角色列表',
                'access'=>'admin/role/index',
                'icon'=>''
                ]
            ]
        ],
        [
            'name'=>'博客管理',
            'icon'=>'book',
            'access'=>[
                [
                    'name'=>'博客列表',
                    'access'=>'admin/article/index',
                    'icon'=>''
                ]
            ]
        ],
    ],

];
