<?php declare(strict_types=1);

/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/10
 * Time : 4:21 下午
 */
namespace ethan;
use ethan\lib\Andriod;
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
     * @param string $token
     * @param string $secret
     * @param bool $debug
     */
    private function __construct(string $token,string $secret , bool $debug)
    {
        $this->_config =[
            "APPKEY" => $token,
            "MESSAGE_DEBUG" => $debug,
            "APP_MASTER_SECRET" => $secret
        ];
    }

    private function __clone(){}


    public static function getInstance(string $token,string $secret , bool $debug=false){
        //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
        if(!(self::$instance instanceof self)){
            self::$instance = new self($token,$secret,$debug);
        }
        return self::$instance;
    }


    /**
     * 推送消息
     * @param IPush $type 类型 （andriod,ios)
     * @param string $token
     * @param string $sign 签名描述
     * @param array $contents
     *             |- <string> subtitle
     *             |- <string> title
     *             |- <string> body
     *
     * @return array
     */
    public function push(IPush $type, string $token, string $sign ,array $contents):array{
        $type->setConfig($this->_config);
        return $type->pushMsg($token,$sign,$contents);
    }


}