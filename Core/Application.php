<?php
/**
 * ProjectName: PowerPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/2
 * Time: 13:57
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

namespace Core;

use Models\HttpCore;

class Application extends HttpCore {

    protected $rootURL = "/api/application";
    protected $key = null;
    protected $addr = "http://127.0.0.1";

    public function __construct(String $addr,String $key){
        $this->addr = $addr.$this->rootURL;
        $this->key = $key;
    }


    /**
     * That's mean getting all the user info
     *
     * @return array
     */

    public function getAllUser(){
        $api_address = $this->addr."/users";
        $path = $this->rootURL."/users";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$path,$this->key,array());

        return $response;
    }


    public function getAppointUser(int $id){
        $api_address = $this->addr."/users/$id";
        $path = $this->rootURL."/users/$id";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$path,$this->key,array());

        return $response;
    }



}