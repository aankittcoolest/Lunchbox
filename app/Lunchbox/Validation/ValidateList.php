<?php

namespace Lunchbox\Validation;

use Violin\Violin;
use Lunchbox\Menu\MenuList;
use Lunchbox\Menu\Category;

class ValidateList extends Violin
{
    protected $item;

    public function __construct($app,MenuList $menu,Category $category)
    {
        $this->menu_list = $menu;
        $this->category = $category;

        $this->addFieldMessages([
            'menu_name' => [
                'uniqueMenuName' => $app->lang['errors']['menu_not_unique']
              ],

              'file'  => [
                'validUpload'   =>$app->lang['errors']['invalid_upload'],
                'validUploadExtension' =>  $app->lang['errors']['invalid_extension_upload']
              ],

              'category_name'  => [
                  'uniqueCategoryName'  => $app->lang['errors']['category_not_unique']
                ]
          ]);
    }

    public function validate_uniqueMenuName($value, $input, $args)
    {

        $menu = $this->menu_list->where('name', $value);
        return ! (bool) $this->menu_list->where('name', $value)->count();
    }


    public function validate_validUpload($value,$input,$args)
    {
        return !empty($value);
    }

    public function validate_validUploadExtension($value,$input,$args)
    {
        $allowed = array('jpg', 'jpeg', 'gif', 'png');
        $file_extn = strtolower(end(explode('.',$value)));
        return in_array($file_extn,$allowed);
    }

    public function validate_uniqueCategoryName($value, $input, $args)
    {
        return ! (bool) $this->category->where('name', $value)->count();
    }


}
