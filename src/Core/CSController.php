<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS\Core;

use CS\Entity\CSToken;

/**
 * DesCSiption of MSController
 *
 * @author weslley
 */
class CSController extends CSHttp{
    protected CSToken $token;
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
    
    public function getToken(): CSToken {
        return $this->token;
    }

    public function setToken(CSToken $token) {
        $this->token = $token;
        return $this;
    }
}
