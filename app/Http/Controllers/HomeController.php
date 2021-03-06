<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;
use App\Konohanaruto\Jobs\Intranet\SendTestEmail;
use App\Konohanaruto\Repositories\Intranet\User\UserRepositoryInterface;
use App\Konohanaruto\Infrastructures\Common\SMS\ShortMessageServiceInterface;
use Request;
use MemberRegisterService;
use Mail;
use App\Mail\Frontend\RegisterMemberActivation;
use Illuminate\Support\Facades\Crypt;
use MemberAuthService;
use QiniuStorageService;

class HomeController extends Controller
{
    public function logging()
    {
        $logs = DB::connection('mongodb')->collection('logs')->get()->toArray();
        echo '<pre>';
        var_dump($logs);
    }
    
    public function storeLog()
    {
        Log::info(md5(uniqid()));
    }
    
    public function jobFeatureTest()
    {
        // method 1:
        
        //dispatch(new SendTestEmail());
        
        // method 2:
        
        $job = (new SendTestEmail())->onQueue('SendTestEmail');
        dispatch($job);
    }
    
    public function smsTest(ShortMessageServiceInterface $smsService)
    {
        $result = $smsService->send('18672670383');
        echo '<pre>';
        var_dump($result);
    }

    // redis test
    public function redisTest()
    {
//        $array = ['name' => 'lisi', 'age' => 23];
//        $result = Redis::hmset('jobList', $array);
        $result = Redis::hgetall('jobList');
        echo '<pre>';var_dump($result);
    }

    public function languageTest()
    {
//        $msg = trans('zh-cn.username');
//        var_dump($msg);
        //var_dump(Request::header('User-Agent'));
        var_dump(MemberRegisterService::test());
    }

    public function emailTest()
    {
        var_dump(MemberAuthService::checkUserLogin());
    }

    public function qiniuStorageTest()
    {
        $res = QiniuStorageService::pingTest();
        var_dump($res);
    }
}
