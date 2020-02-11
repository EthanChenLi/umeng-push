<?php declare(strict_types=1);

/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/10
 * Time : 4:26 下午
 */
namespace  test;


use ethan\lib\Android;
use ethan\lib\Ios;
use ethan\UpushFactory;

require_once "vendor/autoload.php";

//andriod
function androidPush(){
    $sign ="";
    $token ="";
    $appkey ="";
    $secret ="";
    $result = UpushFactory::getInstance($appkey,$secret)->push(new Android(),$token,$sign,
    [
        "subtitle"=>"",
        "title"=>"",
        "body"=>""
    ]);
    print_r($result);
}

function iosPush(){
    $sign ="";
    $token ='';
    $appkey ="";
    $secret ="";
    $result = UpushFactory::getInstance($appkey,$secret)->push(new Ios(),$token,$sign,[
        "subtitle"=>"subtitle",
        "title"=>"title",
        "body"=>"body"
    ]);
    print_r($result);

}
#andriodPush();
iosPush();

