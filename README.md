友盟推送 swoole协程版
----

## 调用示例

### IOS
```php
    use ethan\lib\Android;
    use ethan\lib\Ios;
    use ethan\UpushFactory;

    $sign =""; //推送签名名称
    $token =''; //友盟token
    $appkey =""; 
    $secret ="";
    $result = UpushFactory::getInstance($appkey,$secret)->push(new Ios(),$token,$sign,[
        "subtitle"=>"副标题",
        "title"=>"标题",
        "body"=>"内容"
    ]);
```

### Andriod

```php
    use ethan\lib\Android;
    use ethan\lib\Ios;
    use ethan\UpushFactory;

    $sign ="";
    $token ="";
    $appkey ="";
    $secret ="";
    $result = UpushFactory::getInstance($appkey,$secret)->push(new Android(),$token,$sign,
    [
       "subtitle"=>"副标题",
       "title"=>"标题",
       "body"=>"内容"
    ]);
```

