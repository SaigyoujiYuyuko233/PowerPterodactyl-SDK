<?php
/**
 * ProjectName: PowerPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/2/23
 * Time: 16:58
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

include_once "Models/HttpCore.php";
include_once "Exception/ArgumentNotValid.php";

include_once "Core\Application\ApplicationController.php";

use Exception\ArgumentNotValid;

use Core\ApplicationController;


class Pterodactyl{

    protected $key = null; // API-Key
    protected $url = "http://127.0.0.1";


    public function __construct(String $address,String $key){

        if ($key == null){
            throw new ArgumentNotValid('$key');
        }

        if ($address == null){
            throw new ArgumentNotValid('$address');
        }

        $this->key = $key;
        $this->url = $address;

        // 定义变量
        define("HTTP_GET","GET");
        define("HTTP_POST","POST");
        define("HTTP_PATCH","PATCH");
        define("HTTP_DELETE","DELETE");
    }


    public function application(){
        return new ApplicationController($this->url,$this->key);
    }


    public function client(){

    }


    public function remote(){

    }

}

try{
    $sdk = new Pterodactyl("http://127.0.0.1:8000","JUIc43eUUeOdE2gBSmqaWCRuVpi1eFK2YqnZVqA6pBOHvGwz");
    print_r($sdk->application()->getUser()->editUser(3,array(
        'username' => "tessta-sdka",
        'email' => "test@qwq.qasdwqa",
        'first_name' => 'qasdwq',
        'last_name' => "qwasdqqwq"
    )));
}catch (ArgumentNotValid $exception){
    echo $exception;
}
