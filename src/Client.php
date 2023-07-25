<?php

namespace Xiaosongshu\Admin;

class Client
{

    public static function say(){
        return config('plugin.xiaosongshu.admin.app');
    }

    public function talk(){
        return ['status'=>200,'msg'=>'ok'];
    }

}