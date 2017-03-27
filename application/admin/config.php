<?php
/**
 * Created by PhpStorm.
 * User: zhyunfe
 * Date: 2017/3/20
 * Time: 下午2:12
 */
return [

    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template' => [
        'layout_on' => false,
        'layout_name' => 'public/layout',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
        '__STATIC_URL__'     => 'http://www.farer.com/static',
        '__STATIC_UPLOAD_URL__'=> 'http://www.farer.com/uploads',
        '__STATIC_CONTENT__' => 'http://www.farer.com/application/admin/view/index'
    ],

    // 默认跳转页面对应的模板文件
    'dispatch_success_tmpl'  => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',
    'dispatch_error_tmpl'    => THINK_PATH . 'tpl' . DS . 'dispatch_jump.tpl',

];