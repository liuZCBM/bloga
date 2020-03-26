<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 电话
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use App\Login;
// 邮箱
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function log(){
        return view('index.login');
    }

    // 登录
    public function user(){
        // dd(encrypt(123456));
        $post = request()->all();
        $infores = Login::where('name',$post['name'])->first();
        if(decrypt($infores->password)!=$post['password']){
            return redirect('/log')->with('msg','账号或密码错误!');
        }
        session(['name'=>$infores]);
        return redirect('/');
      
       
    }
    //清除session
    public function test(){
        request()->session()->flush();
        return redirect('/');
    }

    public function reg(){
        return view('index.reg');
    }

    public function sedsms(){
        $name = request()->name;
        $reg = '/^1[3|8|5|9|]\d{9}$/';
        if(!preg_match($reg,$name)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确的邮箱或账号']);
        }
       
        $code = rand(100000,999999);
        $res = $this->send($name,$code);
        if($res['Message']=='OK'){
            session(['code'=>$code]);
            return json_encode(['code'=>'00000','msg'=>'发送成功']);
        }else{
            return json_encode(['code'=>'00000','msg'=>$res['Message']]);
        }
        
       

    }

    

    public function send($name,$code){
        

        // Download：https://github.com/aliyun/openapi-sdk-php
        // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

        AlibabaCloud::accessKeyClient('LTAI4FoMMvb1mcvzkYKz74jE', '3kqqNe6FRVWD03fvcpGvjRY9Od9EXX')
                                ->regionId('cn-hangzhou')
                                ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                                ->product('Dysmsapi')
                                // ->scheme('https') // https | http
                                ->version('2017-05-25')
                                ->action('SendSms')
                                ->method('POST')
                                ->host('dysmsapi.aliyuncs.com')
                                ->options([
                                                'query' => [
                                                'RegionId' => "cn-hangzhou",
                                                'PhoneNumbers' => $name,
                                                'SignName' => "成成超市",
                                                'TemplateCode' => "SMS_183241748",
                                                'TemplateParam' => "{code:$code}",
                                                ],
                                            ])
                                ->request();
            return ($result->toArray());
        } catch (ClientException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            return $e->getErrorMessage() . PHP_EOL;
        }

    }
    // 邮箱
    public function sedemail(){
        $data = request()->name;
        $reg = '/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        if(!preg_match($reg,$data)){
           return json_encode(['code'=>'00001','msg'=>'请输入正确的邮箱或账号']);
        }
        // 生成随机验证码
        $code = rand(100000,999999);
        //发送邮件
        Mail::to($data)->send(new SendCode($code));
        session(['code'=>$code]);
        return json_encode(['code'=>'00000','msg'=>'发送成功']);
    }

    public function reg_do(){
        $data = request()->all();
        $code = session('code');
        
        if(empty($data['code'])){
            echo '验证码不能为空';die;
        }else if($code!=$data["code"]){
            echo '验证码有误';die;
        }
        
    
        if($data['password']!=$data['repassword']){
            echo "密码与确认密码不同";die;
        }else{
            $data['password'] = md5(md5($data['password']));
            $info = Login::insert($data);
            if($info){
                return redirect('/log');
            }
        }
    }

   
}
