<?php

use Illuminate\Database\Seeder;

class BlogUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_users')->delete();
        
        \DB::table('blog_users')->insert(array (
            0 => 
            array (
                'id' => 11,
                'name' => 'ycp19940225',
                'email' => '820363773@qq.com',
                'password' => '',
                'remember_token' => NULL,
                'created_at' => 1501055645,
                'updated_at' => 1501055645,
                'avatar_url' => 'https://avatars0.githubusercontent.com/u/21313827?v=4',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'ycp',
                'email' => '820363772@qq.com',
                'password' => '$2y$10$oFAlAIWs0dfjOzsxXKbbc.QVMUr4Lus6Pi1kAa18TAM61ihjzPQbW',
                'remember_token' => NULL,
                'created_at' => 1501034553,
                'updated_at' => 1501034553,
                'avatar_url' => '',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'yyy',
                'email' => '820363771@qq.com',
                'password' => '$2y$10$JQoyfhsm7yuPfpnt8IaMIOdpFIWR8oQYHntC2iyzmcq2SBDfQsHVW',
                'remember_token' => NULL,
                'created_at' => 1501036665,
                'updated_at' => 1501036665,
                'avatar_url' => '',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => '也一样一样',
                'email' => '820363770@qq.com',
                'password' => '$2y$10$DcHkJlgrLtFVhUDgnN7DoudyGK5Gbvu/dl41Kou3RCnn4gr.2B/YK',
                'remember_token' => NULL,
                'created_at' => 1501036990,
                'updated_at' => 1501036990,
                'avatar_url' => '',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => '恩恩',
                'email' => '120363773@qq.com',
                'password' => '$2y$10$Usno297Bcx183IWiKBEzi.MigX70u6VI.iUUP9E2Hkgtg4mJCBxAq',
                'remember_token' => NULL,
                'created_at' => 1501037131,
                'updated_at' => 1501037131,
                'avatar_url' => '',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => '点',
                'email' => '829363773@qq.com',
                'password' => '$2y$10$XoY15IP58u5Gr74Rr.Aem.kCw022VoOEe3bRscPDIDBFz2t6QM/Va',
                'remember_token' => NULL,
                'created_at' => 1501037210,
                'updated_at' => 1501037210,
                'avatar_url' => '',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => '电放费',
                'email' => '820343773@qq.com',
                'password' => '$2y$10$ZUXcPpWBTwVK24f8yGLhRO6YmZwYqELnFAzBT1RE8.tHZ3kMbioyC',
                'remember_token' => NULL,
                'created_at' => 1501037742,
                'updated_at' => 1501037742,
                'avatar_url' => '',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => '订单',
                'email' => '820363779@qq.com',
                'password' => '$2y$10$RvpjiNdxMkgeL8IO/zOFLO.Glazgzv65qTJ4hpRxYaqWTpvBwkb6S',
                'remember_token' => 'qiE8bVxAuLr70dRhEOMtER0nyYtx6AIeXEjCgbaDIBT4ZMrznbJrfIRdb2cR',
                'created_at' => 1501055898,
                'updated_at' => 1501055898,
                'avatar_url' => '',
            ),
        ));
        
        
    }
}