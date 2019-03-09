<?php
/**
 * ProjectName: PowerPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/3/9
 * Time: 22:52
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

namespace application\ApplicationUser;

use Models\HttpCore;

class ApplicationUser{

    protected $api_prefix = "/users";
    protected $key = null;
    protected $addr = "http://127.0.0.1";

    public function __construct(String $addr,String $key){
        $this->addr = $addr . $this->api_prefix;
        $this->key = $key;
    }


    /**
     * SDK开始========================================================================================
     */


    /**
     * That's mean getting all the user info
     *
     * @return array
     */

    public function getAllUser(){
        $api_address = $this->addr;

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$this->key,array());

        return $response;
    }


    public function getAppointUser(int $id){
        $api_address = $this->addr . "/$id";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_GET,$api_address,$this->key,array());

        return $response;
    }


    public function createUser(array $argument){
        $api_address = $this->addr;

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_POST,$api_address,$this->key, json_encode($argument));

        return $response;
    }


    public function editUser(int $id, array $argument){
        $api_address = $this->addr . "/$id";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_PATCH,$api_address,$this->key, json_encode($argument));

        return $response;
    }


    public function deleteUser(int $id){
        $api_address = $this->addr . "/$id";

        $http = new HttpCore();
        $response = $http->sendRequest(HTTP_DELETE,$api_address,$this->key);

        return $response;
    }

}