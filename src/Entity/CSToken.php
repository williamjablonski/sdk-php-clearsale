<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS\Entity;

/**
 * DesCSiption of CSToken
 *
 * @author weslley
 */
class CSToken {
    public $token;
    public $expirationDate;
    
    public function __construct($jsonText = '') {
        if($jsonText){
            $jsonOb = json_decode($jsonText);
            foreach($jsonOb as $key => $value){
                $key = lcfirst($key);                
                $this->$key = $value;
            }
        }
    }
    
    public function isValid(){
        $now = strtotime(date('Y-m-d H:i:s'));
        $expiraEm = strtotime($this->expirationDate);
        return $expiraEm > $now;
    }
    
    public function getToken() {
        return $this->token;
    }

    public function getExpirationDate() {
        return $this->expirationDate;
    }

    public function setToken($token) {
        $this->token = $token;
        return $this;
    }

    public function setExpirationDate($expirationDate) {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}
