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

require_once "ApplicationUser.php";

use application\ApplicationUser\ApplicationUser;
use Models\HttpCore;

class ApplicationController extends HttpCore {

    protected $rootURL = "/api/application";
    protected $key = null;
    protected $addr = "http://127.0.0.1";

    public function __construct(String $addr,String $key){
        $this->addr = $addr.$this->rootURL;
        $this->key = $key;
    }

    public function getUser(){
        return new ApplicationUser($this->addr,$this->key);
    }




}