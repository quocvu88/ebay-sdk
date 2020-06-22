<?php
/**
 *  File Client.php
 *
 * @author  Vu Hoang (quocvu88@gmail.com)
 * @package ebay-sdk
 * @version 1.0
 *
 * Ref:
 */

namespace quocvu88\eBayAPI\Client;

use quocvu88\eBayAPI\Connection;
use quocvu88\eBayAPI\Utils;

/**
 * Class Client
 *
 * @package quocvu88\eBayAPI\Client
 */
class Client
{
    /**
     * @var \quocvu88\eBayAPI\Connection
     */
    private $conn;

    /**
     * @var string
     */
    private $returnType;

    /**
     * Client constructor.
     *
     * @param $config
     * @param $token
     * @ignore
     */
    public function __construct($config, $token, $returnType = 'SimpleXMLElement')
    {
        $this->conn = new Connection($config, $token);
        $this->returnType = strtoupper($returnType);
    }

    /**
     * Call Function function
     *
     * @param string $strClass
     * @param array  $params
     * @return bool
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function callFunction($strClass, $params)
    {
        try{
            $obj = new $strClass($this->conn);
            $this->setParam($obj, $params);
            $response = $obj->sendRequest();
            $util = new Utils();
            switch ($this->returnType){
                case 'ARRAY':
                    $response->setContent($util->parseXmlToArray($response->getContent()));
                    break;
                case 'JSON':
                    $response->setContent($util->parseXmlToJson($response->getContent()));
                    break;
            }
            return $response;
        }catch (Exception $ex){
            return false;
        }
    }

    /**
     * Set Param function
     *
     * @param $obj
     * @param $params
     * @return void
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function setParam(&$obj, $params){
        if(count($params)){
            foreach ($params as $param => $value){
                if($param){
                    if(method_exists($obj, 'set'.ucfirst($param)))
                        $obj->{'set'.ucfirst($param)}($value);
                }
            }
        }
    }
}