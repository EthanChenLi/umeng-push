<?php declare(strict_types=1);

/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/10
 * Time : 5:56 下午
 */
namespace ethan\lib;
class Ios implements IPush
{
    use RequestProcess;

    private $config=[];
    public function setConfig(array $config)
    {
       $this->config=$config;
    }

    public function pushMsg(String $token, string $sign, array $content,array $extra=[]): array
    {
        $this->body = [
            "description" => $sign,
            "appkey" => $this->config['APPKEY'],
            "timestamp" => (string)time(),
            "type" =>"unicast",//单播
            "device_tokens" => $token,//手机设备token
            "payload" => [
                "display_type" => "notification",//通知
                "aps" => [
                    "alert" => [
                        "subtitle"  =>  $content['subtitle']??"",//通知栏提示文字
                        "title"     =>  $content['title']??"",//通知标题
                        "body"      =>  $content['body']??"",//通知文字描述
                    ]
                ],
            ],
            //true/false 正式/测试环境 测试模式只对“广播”、“组播”类消息生效，其他类型的消息任务（如“文件播”）不会走测试模式 测试模式只会将消息发给测试设备。
            //测试设备需要到web上添加。
            "production_mode" => !empty($this->config['production_mode'])?$this->config['production_mode']:false,
        ];
        if(!empty($extra)){
         $this->body["payload"] = array_merge($this->body["payload"],$extra);
        }
        return $this->requestMessage($this->config['APP_MASTER_SECRET']);
    }


}