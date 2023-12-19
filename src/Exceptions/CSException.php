<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS\Exceptions;

use Exception;

/**
 * DesCSiption of MSException
 *
 * @author william
 */
class CSException extends Exception{
    
    public function __construct(Exception $ex) {
        $message = $ex->getMessage() . PHP_EOL . $ex->getTraceAsString();        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_object($message)){
            
            $newMessageString = [
                $message->Message
            ];
            
            foreach($message->ModelState as $ModelStateKey => $ModelStateValue){
                $newMessageString[] = $ModelStateKey . ": " . implode(', ', $ModelStateValue);
            }                           
            
            return new CSException( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            
            return new CSException( new Exception($message, $code, $previous) );     
            
        }
        
    }
    
}
