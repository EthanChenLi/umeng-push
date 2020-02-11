<?php declare(strict_types=1);

/**
 * i am what i am
 * Class Descript: .
 * User : ehtan
 * Date : 2020/2/11
 * Time : 2:13 下午
 */
namespace ethan\lib;
interface IPush
{
    public function setConfig(array $config);
    public function pushMsg(String $token, string $sign ,array $content):array;
}