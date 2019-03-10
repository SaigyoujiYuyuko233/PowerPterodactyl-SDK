<?php
/**
 * ProjectName: PowerPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/10
 * Time: 8:55
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

namespace application;

use Models\HttpCore;

class ApplicationNode{

    protected $api_prefix = "/nodes";
    protected $key = null;
    protected $addr = "http://127.0.0.1";

    public function __construct(String $addr,String $key){
        $this->addr = $addr . $this->api_prefix;
        $this->key = $key;
    }


    /**
     * SDK开始========================================================================================
     */

    public function getAllNodes(){
        $api_address = $this->addr;

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$this->key,array());

        return $response;
    }


    public function getAppointNode(int $id){
        $api_address = $this->addr . "/$id";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$this->key,array());

        return $response;
    }


    public function createNode(array $argument){
        $api_address = $this->addr;

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_POST,$api_address,$this->key, json_encode($argument));

        return $response;
    }

}