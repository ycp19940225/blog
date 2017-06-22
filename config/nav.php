<?php

return [
    'NAV'=>[
        [
            'name'=>'RBAC',
            'icon'=>'user',
            'access'=>[
                [
                'name'=>'管理员列表',
                'access'=>'admin/user/index',
                'icon'=>''
                ],
                [
                'name'=>'角色列表',
                'access'=>'admin/role/index',
                'icon'=>''
                ]
            ]
        ]
    ]
];
