<?php

return [ 'lang' => [
          'main_heading' => [
            'welcome'    => 'ようこそ',
            'honour'     => 'さん'
          ],

          'headings'    =>  [
            'register'  => 'ようこそ！Lunchbox は、あなたにより良いサービスを提供致します。',
            'login'     =>  'ログイン',
            'reset'     =>  'パスワード変更',
            'update_profile'  => 'プロフィールの更新',
            'order_history'   => '注文履歴',
            'new_menu'        =>    '新メニューを作成',
            'new_category'    =>    '新カテゴリを作成',
            'change_language' =>    '言語を選ぶ',
            'current_email'   =>    '現在のメールアドレスを入力してください',
            'new_password'    =>    '新パスワードを入力してください'
          ],

          'table_headings'  => [
            'serial_number'   =>    '通し番号',
            'category'        =>    'お弁当の種類',
            'amount'          =>    '金額',
            'date'            =>    '日付',
            'customer_name'   =>    'お客様名'
          ],

          'inputs'      =>  [
            'remember_me'   =>  '私を覚えてください'
          ],

          'links'       =>  [
            'forgot_password'  => 'パスワード忘れた?'
          ],

            'errors'    => [
              //mail not unique error message
              'mail_not_unique'         =>    'そのメールアドレスはすでに使用されています',
              //username not unique error message
              'username_not_unique'     =>     'その名前はすでに使用されています',
              //password mismatch error
              'password_mismatch'       =>     'パスワードが間違っています',
              //menu not unique error
              'menu_not_unique'         =>      'その名前のメニューはすでに使用されています',
              //upload file not valid
              'invalid_upload'          =>      '画像をアップロードして下さい',
              //upload file extension not valid
              'invalid_extension_upload'=>      '有効なファイルをアップロードして下さい',
              //category not unique error
              'category_not_unique'     =>      'その名前のカテゴリはすでに使用されています'
              ],

              'messages'  => [
              //login messages
              'successful_login'          =>    'ログインしています',
              'failed_login'              =>    'ログインできませんでした',
              //register messages
              'successful_register'       =>    'アカウントの登録が完了しました',
              //Activate new account
              'successful_activation'     =>    'アカウントは有効なのでログインが可能です',
              'failed_activation'         =>    'アカウントに問題が生じました',
              //logout messages
              'successful_logout'         =>     'ログアウトしました',
              //change password messages
              'successful_change'         =>     'パスワードの変更が完了しました',
              //Recover password messages
              'successful_recover'        =>     'パスワードの再設定に関する詳細をあなたのメールアドレスに送信しました',
              'failed_recover'            =>     'そのユーザーを特定することができません',
              //password reset messages
              'successful_reset'          =>     'パスワードが再設定されたので、ログインが可能です',
              //Admin Panel messages
              'successful_mail_send'      =>     '注文のリストがあなたのアカウントへ送信されました',
              //Account settings
                //Update Profile
              'successful_update'         =>      'プロフィールが更新されました',
              //Language messages
              'successful_lang_update'    =>      'Your language preference has been successfully saved!',
              //new list creation
              'successful_creation'       =>      '新しいメニューが追加されました',
              //Successful order reservation message
              'successful_reservation'    =>      '注文が完了しました',
              //Successful category creation
              'successful_category'       =>       '新しいカテゴリが追加されました'
              ],

              'mail_subject'  => [
              //Password change
                'successful_change'       =>      'パスワードの変更完了',
              //Password recover
                'recover_password'        =>      '紛失したパスワードの再取得',
              //Successful registration mail
                'successful_register'     =>      'ご登録ありがとうございます',
              //order reservation mail
                'successful_reserve'      =>      'Lunchboxをご利用頂きありがとうございます',

              ],

            'nav_bar'  => [
              //left menu
              'menu'                      =>      'メニュー',
              'profile'                   =>     'あなたのプロフィール',
              'change_password'           =>     'パスワード変更',
              'update_profile'            =>      'プロフィール変更',
              'logout'                    =>     'ログアウト',
              'reserve'                   =>      '早速注文を行う!',
              'change_language'           =>       '言語変更',
              //admin area
              'admin_area'                =>      '管理画面',
              'new_menu'                  =>      '新メニュー',
              'new_category'              =>      '新カテゴリ',
              //right menu
              'register'                  =>     '新規登録',
              'login'                     =>     'ログイン'
            ],

              'placeholders' => [
                //login placeholders
                'identifier'                =>      'ユーザーネームかメールアドレスを記入して下さい',
                'login_password'                  =>      'パスワードを記入して下さい',
                //registration placeholders
                'email'                     =>      'メールアドレス', //reused for forgot password
                'username'                  =>      '固有のユーザーネーム',
                'password'                  =>      'パスワード',
                'confirm_password'          =>      '確認のパスワード',
                //Change Password and password reset
                'old_password'              =>      '現在のパスワード',
                'new_password'              =>      '新しいパスワード',
                'confirm_password'          =>      '確認のパスワード',
                //Update Profile
                'first_name'                =>      '名前',
                'last_name'                 =>      '名字',
                //create new menu
                'menu_name'                 =>      'メニューの名前',
                'menu_image'                =>       'メニューイメージをアッポーロドする',
                //create new category
                'category_name'             =>      'カテゴリの名前',
                'amount'                    =>      '金額'
              ],

              'submit'  => [
                //submit login
                'login'                    =>       'ログイン',
                //submit registration
                'register'                 =>       '登録',
                //submit password reset
                'reset'                    =>        '変更依頼',
                //submit update profile
                'update_profile'           =>       '更新',
                //stop taking reservations
                'stop_reservations'        =>       '今日予約取るを止まる',
                //create new menu or category
                'create'                   =>       '作成',
                //change language
                'change_language'          =>       '言語を変更',
                //request for reset password
                'request_reset'            =>       '再設定メールを送信'
                ]
              ]
];
