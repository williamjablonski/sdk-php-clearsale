<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS;

use CS\Core\CSController;
use CS\Entity\CSToken;
use CS\Exceptions\CSException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * DesCSiption of Autorizacao
 *
 * @author weslley
 */
class Autenticacao extends CSController{
    
    public function gerarToken($name, $password): CSToken{
        try{
            $response = $this->http->post('authenticate', array(
                'json' => [
                    'name' => $name,
                    'numero' => $password,
                ]
            ));

            $body = (string)$response->getBody();
                        
            return new CSToken($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                throw CSException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                throw CSException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->msgs)){
                
                throw CSException::fromObjectMessage($bodyDecoded->msgs, $ex->getCode(), $ex->getPrevious());
                
            }
            
            throw CSException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new CSException($ex);
        }
    }
    
}
