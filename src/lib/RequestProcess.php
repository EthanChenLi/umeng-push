<?php declare(strict_types=1);
/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/11
 * Time : 2:40 下午
 */

namespace ethan\lib;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

trait RequestProcess
{

    protected $body = [];
    protected $url="https://msgapi.umeng.com/api/send";

    protected function createSign($masterSecret):string
    {
        return strtolower(md5("POST" . $this->url . \json_encode($this->body) . $masterSecret));

    }

    /**
     *
     * @param $masterSecret
     * @return array
     * @throws \Exception
     */
    protected function requestMessage($masterSecret):array
    {
        $url = $this->url ."?sign=" . $this->createSign($masterSecret);
        $client = new Client();
       # print_r($this->body);die;
        try{
            $response=$client->post($url,[
                RequestOptions::JSON => $this->body
            ]);
        }catch (RequestException $exception){
            throw new \Exception($exception->getMessage());
        };
        $body = $response->getBody();
        return \json_decode((string)$body,true) ;
    }

}