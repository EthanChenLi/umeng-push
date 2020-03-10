<?php declare(strict_types=1);

/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/10
 * Time : 4:21 下午
 */
namespace ethan;
use ethan\lib\Android;
use ethan\lib\Ios;
use ethan\lib\IPush;

class UpushFactory
{

    private static $instance;
    private $_config=[];
    public $APPKEY = "";
    public $MESSAGE_DEBUG =false;
    public $APP_MASTER_SECRET ="";

    /**
     * UpushFactory constructor.
     * @param string $appkey
     * @param string $secret
     * @param bool $debug
     * @param array $options
     */
    private function __construct(string $appkey,string $secret ,array $options=[])
    {
        $this->_config =[
            "APPKEY" => $appkey,
            "APP_MASTER_SECRET" => $secret
        ];
        if(!empty($options)){
           $this->_config =  array_merge($this->_config,$options);
        }
    }

    private function __clone(){}


    public static function getInstance(string $appkey,string $secret ,array $options=[]){
        //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
        if(!(self::$instance instanceof self)){
            self::$instance = new self($appkey,$secret,$options);
        }
        return self::$instance;
    }


    /**
     * 推送消息
     * @param IPush $type 类型 （andriod,ios)
     * @param string $token
     * @param string $sign 签名描述
     * @param array $contents
     * @param array $extra 约定参数
     *             |- <string> subtitle
     *             |- <string> title
     *             |- <string> body
     *             |- <array> $extra
     *
     *
     * @return array
     */
    public function push(IPush $type, string $token, string $sign ,array $contents,array $extra=[]):array{
        $type->setConfig($this->_config);
        return $type->pushMsg($token,$sign,$contents,$extra);
    }


}