<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('admin') -> check();
    }


    public function addValidator() {// 四个参数分别代表 要被验证的属性名称  属性的值  传入验证规则的参数数组  以及Validator实例
        \Validator::extend('check_password', function($attribute, $value, $parameters, $validator) {
        //这个类的extend方法可以自己定义验证规则 这个验证规则的名字就可以写在下面rules中
        //password_verify() 是php原生的方法 用来校验密码是否和哈希值匹配
        //laravel对php原生的和hash有关的方法进行了封装
        //php原生的password_hash('密码', '哈希算法', '选项 可填可不填')
        //这个方法用来加密密码 生成的哈希密码每次都不一样 
        //但是通过password_verify可以进行判断 在laravel中也就是Hash::check()
        //Bcrypt就是一个哈希算法的加密 所以Bcrypt可以通过该函数来进行验证
            return \Hash::check($value, \Auth::guard('admin') -> user() -> password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this -> addValidator();
        return [
            //
            //   sometimes是当表单中有这个字段时才进行验证
            'password' => 'sometimes|required|confirmed',
            'password_confirmation' => 'sometimes|required',
            'original_password' => 'sometimes|required|check_password'
        ];
    }

    //  这里的这个方法是自己加的 可以设置错误提示信息 注意方法名字必须是 messages
    public function messages() {
        return [
            'password.required' => '密码不能为空',
            'password.confirmed' => '两次密码不一致',
            'password_confirmation.required' => '确认密码不能为空',
            'original_password.required' => '请输入密码'
        ];
    }
}
