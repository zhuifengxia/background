<?php
return [
    'scan'	=> [
        'enabled'	=> true
    ],
    'name' => '系统管理',

    'permissions'   => [
        'backend.user'  => [
            'label' => '用户管理'
        ],
        'backend.group' => [
            'label' => '组管理'
        ]
    ],

    'navigation'	=> [
        'home'	=> [
            'url'	=> backendUrl('/'),
            'label'	=> '首页'
        ],
        'system'	=> [
            'url'	=> backendUrl('/'),
            'label'	=> '系统设置',

            'sideMenu'	=> [
                'users'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/users'),
                    'label'	=> '管理员管理',

                    'sideMenu'	=> [
                        'userlists'	=> [
                            'icon'	=> 'list',
                            'url'	=> backendUrl('/users'),
                            'label'	=> '管理员管理'
                        ],
                        'useradd' => [
                            'icon'  => 'add',
                            'url' => backendUrl('/users/create'),
                            'label' => '创建管理员',
                        ],

//                        'changepassword' => [
//                            'icon'  => 'changepassword',
//                            'url' => 'backend/users/changepassword',
//                            'label' => '修改密码'
//                        ],
//                        'group-list'   => [
//                            'icon'    => 'role-list',
//                            'url'     => 'backend/groups',
//                            'label'   => '角色管理'
//                        ],
//                        'role-add'   => [
//                            'icon'    => 'role-add',
//                            'url'     => 'backend/role/create',
//                            'label'   => '创建角色'
//                        ]
                    ]
                ],
            ]
        ],
        'examtypes'	=> [
            'url'	=> backendUrl('/'),
            'label'	=> '医考天地',

            'sideMenu'	=> [
                'typelists'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/examtype/examtypelist'),
                    'label'	=> '分类管理',
                ],
                'addtype'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/examtype/addexamtype'),
                    'label'	=> '添加分类',
                ],
            ]
        ],
        'examalls'	=> [
            'url'	=> backendUrl('/examtype/allexamlist'),
            'label'	=> '全部试题管理',

            'sideMenu'	=> [
                'typelists'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/examtype/allexamlist'),
                    'label'	=> '试题管理',
                ]
            ]
        ],

        'feedback'	=> [
            'url'	=> '',
            'label'	=> '用户反馈管理',

            'sideMenu'	=> [
                'errorrecovery'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/feedback/examerrorlist'),
                    'label'	=> '试题纠错',
                ],
                'feedback'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/feedback/feedbacklist'),
                    'label'	=> '意见反馈',
                ],
                'examanalyze'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/feedback/examanalyze'),
                    'label'	=> '用户提交试题分析',
                ],
            ]
        ],

        'villagedoctor'	=> [
            'url'	=> '',
            'label'	=> '村医-全科医疗',

            'sideMenu'	=> [
                'testdirectory'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/village/testdirectory'),
                    'label'	=> '考试目录',
                ],
                'testsite'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/village/testsitelist'),
                    'label'	=> '考点列表',
                ],
                'testexamlist'	=>	[
                    'icon'	=> 'copy',
                    'url'	=> backendUrl('/village/testexamlist'),
                    'label'	=> '用户提交试题分析',
                ],
            ]
        ],
    ]
];
