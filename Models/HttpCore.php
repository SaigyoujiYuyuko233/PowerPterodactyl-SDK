<?php
/**
 * ProjectName: PowerPterodactylAPI.
 * Author: SaigyoujiYuyuko
 * QQ: 3558168775
 * Date: 2019/2/23
 * Time: 18:10
 *
 * Copyright © 2019 SaigyoujiYuyuko. All rights reserved.
 */

namespace Models;

class HttpCore{


    /**
     * @param String $method
     * @param String $address
     * @param String $path
     * @param String $key
     * @param array $data
     * @return array
     */

    public function sendRequest(String $method,String $address,String $key,$data = array()){

        $curl = curl_init($address);

        $header = array();

        $header[] = "User-Agent: PowerPterodactyl/1.0.0";
        $header[] = "Authorization: Bearer $key";
        $header[] = "Accept:application/json";
        $header[] = "Content-Type: application/json";

        // 如果是POST
        if ($method == "POST" || $method == "PATCH"){
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }


        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        curl_setopt ($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($curl);

        // 获取头
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $http_response_header = substr($response, 0, $headerSize);

        // 如果有错误 获取错误信息
        $http_error = curl_error($curl);

        curl_close($curl);

        /**
         * 返回的格式
         *
         * {
         * "http_response": http头
         * "data": api数据
         * }
         */

        // 判断是否有错误
        if ($http_error != null){
            $return['http_response'] = "Error to get the response";
            $return['data'] = "empty";
            $return['error'] = $http_error;

            return $return;
        }

        // 转化头
        $http_response_header_array = explode("\r\n",$http_response_header);

        $http_response_header = array();
        $http_response_header['status'] = $http_response_header_array[0];

        for ($i = 1; $i < count($http_response_header_array) - 2; $i++){
            $kv = explode(": ",$http_response_header_array[$i]);
            $http_response_header[$kv[0]] = $kv[1];
        }

        $return['http_response'] = $http_response_header;
        $return['data'] = json_decode(substr($response, $headerSize, strlen($response)),true);
        $return['error'] = $http_error;

        // 分析状态码
        $http_code = explode(" ",$http_response_header['status'])[1];

        if ($http_code == "404"){
            $return['data'] = '404 Not Found';
        }

        return $return;
    }

}