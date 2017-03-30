<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template' => [
        'layout_on' => true,
        'layout_name' => 'public/layout',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__HOTEL_URL__'=>'http://www.farer.com/uploads/hotel',
        '__STATIC_URL__' => 'http://www.farer.com/static/before',
        '__PLACE_URL__' => 'http://www.farer.com/uploads/place',
        '__FARERCASE_URL__' => 'http://www.farer.com/uploads/farercase',
        '__ALL_URL__'     => 'http://www.farer.com/static',

    ],

    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => APP_PATH . 'index/view/success.html',
    'dispatch_error_tmpl'    => APP_PATH . 'index/view/error.html',


];
