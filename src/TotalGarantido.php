<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CS;

use CS\Core\CSController;
use CS\Exceptions\CSException;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * DesCSiption of Cotacao
 *
 * @author william
 */
class TotalGarantido extends CSController{
        
    public function incluirPedido(array $data){
        try{
            $response = $this->http->post('orders', array(
                "headers" => [
                    "Authorization" => 'Bearer ' . $this->getToken()->getToken(),
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new CSException($ex);
        }
    }
    
    public function consultaStatus($orderId){
        try{
            $response = $this->http->get(sprintf('orders/%s/status', $orderId), array(
                "headers" => [
                    "Authorization" => 'Bearer ' . $this->getToken()->getToken(),
                    "Accept" => "application/json"
                ]
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new CSException($ex);
        }
    }
    
    public function atualizaStatus($orderId, array $data){
        try{
            $response = $this->http->put(sprintf('orders/%s/status', $orderId), array(
                "headers" => [
                    "Authorization" => 'Bearer ' . $this->getToken()->getToken(),
                    "Accept" => "application/json"
                ],
                "json" => $data,
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ServerException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
                        
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[ClientException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->ModelState)){
                throw CSException::fromObjectMessage($bodyDecoded, $ex->getCode(), $ex->getPrevious());
            }
            
            throw CSException::fromObjectMessage('[BadResponseException] ' . $ex->getMessage(), $ex->getCode(), $ex->getPrevious());
            
        } catch (Exception $ex) {
            throw new CSException($ex);
        }
    }
    
}
