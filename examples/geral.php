<?php

date_default_timezone_set('America/Sao_Paulo');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../vendor/autoload.php";

//--

$name = "";
$password = "";

//--

$csConfig = [];
        
$csConfig['base_uri'] = CS\Core\CSHttp::BASE_URL_HOMOLOG;

$autenticao = new \CS\Autenticacao($csConfig);
$totalGarantido = new \CS\TotalGarantido($csConfig);

$token = null;

try{
    $token = $autenticao->gerarToken($name, $password);
    
    CS\Helper\CSHelper::dump($token);
    
    $totalGarantido->setToken($token);
    
    $totalGarantido->incluirPedido([
        "code" => "ORDER_EXAMPLE_2_0_1",
        "sessionID" => "SessionIDValue",
        "date" => "2017-03-22T13:38:59.9894222",
        "email" => "william.jablonski@flexy.com.br",
        "b2bB2c" => "B2C",
        "itemValue" => 10,
        "totalValue" => 15,
        "numberOfInstallments" => 1,
        "ip" => "192.168.0.1",
        "isGift" => false,
        "giftMessage" => "Message Example",
        "observation" => "Observation example",
        "status" => 0,
        "origin" => "Origin example",
        "channelID" => "Additional origin information",
        "reservationDate" => "2017-03-21T22:36:36.0000000",
        "country" => "Brasil",
        "nationality" => "Brasileiro",
        "product" => 1,
        "customSla" => 60,
        "bankAuthentication" => "Aprovado 3DS",
        "subAcquirer" => "Sub Acquirer Name",
        "list" => [
            "typeID" => 3,
            "id" => "List Code Example"
        ],
        "purchaseInformation" => [
            "lastDateInsertedMail" => "2015-03-01T02:40:00",
            "lastDateChangePassword" => "2015-04-02T05:15:00",
            "lastDateChangePhone" => "2015-05-03T10:45:00",
            "lastDateChangeMobilePhone" => "2015-06-04T12:05:00",
            "lastDateInsertedAddress" => "2015-07-05T15:25:00",
            "purchaseLogged" => false,
            "email" => "william.jablonski@flexy.com.br",
            "login" => "SocialNetworkLogin"
        ],
        "socialNetwork" => [
            "optInCompreConfie" => 1,
            "typeSocialNetwork" => 2,
            "authenticationToken" => "123456abcd"
        ],
        "billing" => [
            "clientID" => "Client123",
            "type" => 1,
            "primaryDocument" => "12345678910",
            "secondaryDocument" => "12345678",
            "name" => "Complete Client Name",
            "birthDate" => "1990-01-10T00:00:00.000",
            "email" => "william.jablonski@flexy.com.br",
            "gender" => "M",
            "address" => [
                "street" => "Street name example",
                "number" => "100",
                "additionalInformation" => "Additional information example",
                "county" => "County Example",
                "city" => "City Example",
                "state" => "SP",
                "zipcode" => "12345678",
                "country" => "Brasil",
                "reference" => "Address reference example"
            ],
            "phones" => [
                [
                    "type" => 1,
                    "ddi" => 55,
                    "ddd" => 11,
                    "number" => 33333333,
                    "extension" => "1111"
                ]
            ]
        ],
        "shipping" => [
            "clientID" => "Client123",
            "type" => 1,
            "primaryDocument" => "12345678910",
            "secondaryDocument" => "12345678",
            "name" => "Complete Client Name",
            "birthDate" => "1990-01-10T00:00:00.000",
            "email" => "william.jablonski@flexy.com.br",
            "gender" => "M",
            "address" => [
                "street" => "Street name example",
                "number" => "100",
                "additionalInformation" => "Additional information example",
                "county" => "County Example",
                "city" => "City Example",
                "state" => "SP",
                "zipcode" => "12345678",
                "country" => "Brasil",
                "reference" => "Address reference example"
            ],
            "phones" => [
                [
                    "type" => 1,
                    "ddi" => 55,
                    "ddd" => 11,
                    "number" => 33333333,
                    "extension" => "1111"
                ]
            ],
            "deliveryType" => "1",
            "deliveryTime" => "2 dias úteis",
            "price" => 5,
            "pickUpStoreDocument" => "12345678910"
        ],
        "payments" => [
            [
                "sequential" => 1,
                "date" => "2017-03-21T22:36:53.0000000",
                "value" => 25,
                "type" => 1,
                "installments" => 1,
                "interestRate" => 10,
                "interestValue" => 2,
                "currency" => 986,
                "voucherOrderOrigin" => "123456",
                "card" => [
                    "number" => "123456xxxxxx1234",
                    "hash" => "12345678945612301234569874563210",
                    "bin" => "123456",
                    "end" => "1234",
                    "type" => 1,
                    "validityDate" => "02/2021",
                    "ownerName" => "Owner Card Name",
                    "document" => "12345678910",
                    "nsu" => "12345"
                ],
                "address" => [
                    "street" => "Street name example",
                    "number" => "10",
                    "additionalInformation" => "Additional information example",
                    "county" => "County Example",
                    "city" => "City Example",
                    "state" => "SC",
                    "zipcode" => "12345678",
                    "country" => "Brasil",
                    "reference" => "Address reference example"
                ]
            ]
        ],
        "items" => [
            [
                "code" => "Item Code",
                "name" => "Item description",
                "barCode" => "1234567891012",
                "value" => 10,
                "amount" => 1,
                "categoryID" => 1,
                "categoryName" => "Item category name",
                "isGift" => true,
                "sellerName" => "Seller Name",
                "sellerDocument" => "12345678910123",
                "isMarketPlace" => "true",
                "sellerSegment" => "Eletronicos",
                "shippingCompany" => "Shipping Company Name"
            ]
        ],
        "passengers" => [
            [
                "name" => "Passanger name",
                "companyMileCard" => "Company Name",
                "mileCard" => "123456789",
                "identificationType" => 1,
                "identificationNumber" => "123456789",
                "gender" => "M",
                "birthdate" => "1990-01-10T00:00:00.000",
                "cpf" => "12345678910"
            ]
        ],
        "connections" => [
            [
                "company" => "JJ",
                "identificationNumber" => 12345,
                "date" => "2017-10-10T00:00:00.000",
                "seatClass" => "Seat Class",
                "origin" => "GRU",
                "destination" => "LHR",
                "boarding" => "2017-10-10T00:00:00.000",
                "arriving" => "2017-10-10T00:00:00.000",
                "fareClass" => "First Class"
            ]
        ],
        "hotels" => [
            [
                "name" => "Hotel Name",
                "city" => "Hotel City",
                "state" => "Hotel State",
                "country" => "Hotel Country",
                "reservationDate" => "2017-10-10T00:00:00.000",
                "reserveExpirationDate" => "2017-10-10T00:00:00.000",
                "checkInDate" => "2017-10-10T00:00:00.000",
                "checkOutDate" => "2017-10-10T00:00:00.000"
            ]
        ]
    ]);
} catch (Exception $ex) {
    CS\Helper\CSHelper::dump($ex->getMessage());
}
