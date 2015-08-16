<?php



return [ 'lang' => [
          'main_heading' => [
            'welcome'    => 'Welcome'
          ],

          'headings'    =>  [
            'register'  => 'Welcome! Lunchbox is waiting to serve you better.',
            'login'     =>  'Sign in',
            'reset'     =>   'Enter details for password reset.',
            'update_profile'  => 'Update Profile.',
            'order_history'   => 'Your Order History',
            'new_menu'        =>    'Create New Menu',
            'new_category'    =>    'Create New Category',
            'change_language' =>    'Select Your Language',
            'current_email'   =>    'Enter your Current Email Address',
            'new_password'    =>    'Enter your New Password'
          ],

          'table_headings'  => [
            'serial_number'   =>    'Serial Number',
            'category'        =>    'Lunch Category',
            'amount'          =>    'Amount',
            'date'            =>    'Date',
            'customer_name'   =>    'Customer Name'
          ],

          'inputs'      =>  [
            'remember_me'   =>  'Remember Me'
          ],

          'links'       =>  [
            'forgot_password'  => 'Forgot your password?'
          ],

            'errors'    => [
              //mail not unique error message
              'mail_not_unique'         =>    'That email is already in use.',
              //username not unique error message
              'username_not_unique'     =>     'That username is already in use.',
              //password mismatch error
              'password_mismatch'       =>     'That does not match your current password.',
              //item not unique error
              'menu_not_unique'         =>      'This menu already exists.',
              //upload file not valid
              'invalid_upload'          =>      'Please upload a image.',
              //upload file extension not valid
              'invalid_extension_upload'=>      'Please upload a valid file.',
              //category not unique error
              'category_not_unique'     =>      'This category already exists.'
              ],

            'messages'  => [
              //login messages
              'successful_login'          =>    'You are now signed in!',
              'failed_login'              =>    'Could not log you in!',
              //register messages
              'successful_register'       =>    'You have been registered',
              //Activate new account
              'successful_activation'     =>    'Your account has been activated and you can sign in!',
              'failed_activation'         =>    'There was a problem activating your account.',
              //logout messages
              'successful_logout'         =>     'You have been logged out.',
              //change password messages
              'successful_change'         =>     'You changed your password successfully!.',
              //Recover password messages
              'successful_recover'        =>     'We have emailed you instructions to reset your password.',
              'failed_recover'            =>     'Sorry, Could not find that user.',
              //password reset messages
              'successful_reset'          =>     'Your password has been reset and you can now sign in.',
              //Admin Panel messages
              'successful_mail_send'      =>     'The list has been mailed to your account successfully.',
              //Account settings
                //Update Profile
              'successful_update'         =>      'Your details have been updated successfully.',
              //Language messages
              'successful_lang_update'    =>      '使用する言語が選択されました',
              //new list creation
              'successful_creation'       =>      'A new list has been created successfully.',
              //Successful order reservation message
              'successful_reservation'    =>      'Your order has been placed!',
              //Successful category creation
              'successful_category'       =>       'A new category has been created successfully.'
              ],

            'mail_subject'  => [
              //Password change
                'successful_change'       =>      'You changed your password',
              //Password recover
                'recover_password'        =>      'Recover your password',
              //Successful registration mail
                'successful_register'     =>      'Thanks for registering.',
              //order reservation mail
                'successful_reserve'      =>      'Thank you for using Lunchbox.',

              ],

            'nav_bar'  => [
              //left menu
              'menu'                      =>      'Menu',
              'profile'                   =>      'Your Profile',
              'change_password'           =>      'Change Password',
              'update_profile'            =>      'Update Profile',
              'logout'                    =>      'Logout',
              'reserve'                   =>      'Book Now!',
              'change_language'           =>      'Change Language',
              //admin area
              'admin_area'                =>      'Admin Area',
              'new_menu'                  =>      'New Menu',
              'new_category'              =>      'New Category',
              'stop_reservations'         =>      'Stop Reservations',
              //right menu
              'register'                  =>      'Register',
              'login'                     =>      'Login'
            ],

            'placeholders' => [
              //login placeholders
              'identifier'                =>      'Enter your username or email',
              'password'                  =>      'Enter your password',
              //registration placeholders
              'email'                     =>      'Email', //reused for forgot password
              'username'                  =>      'Unique Username',
              'password'                  =>      'Password',
              'confirm_password'          =>      'Confirm Password',
              //Change Password and password reset
              'old_password'              =>      'Old Password',
              'new_password'              =>      'New Password',
              'confirm_password'          =>      'Password Confirm',
              //Update Profile
              'first_name'                =>      'First Name',
              'last_name'                 =>      'Last Name',
              //create new menu
              'menu_name'                 =>      'Menu Name',
              'menu_image'                =>       'Upload the Menu Image',
              //create new category
              'category_name'             =>      'Category Name',
              'amount'                    =>      'Amount'
            ],

            'submit'  => [
              //submit login
              'login'                    =>       'Login',
              //submit registration
              'register'                 =>       'Register',
              //submit password reset
              'reset'                    =>        'Request reset',
              //submit update profile
              'update_profile'           =>       'Update profile',
              //stop taking reservations
              'stop_reservations'        =>       'Stop taking lunch reservations for today.',
              //create new menu or category
              'create'                   =>       'create',
              //change language
              'change_language'          =>       'Change Language',
              //request for reset password
              'request_reset'            =>       'Send Reset Mail'
              ]
            ]
];
