<?php
/**
 *  File Connection.php
 *
 * @author Vu Hoang (quocvu88@gmail.com)
 * @package ebay_sdk
 * @version 1.0
 */

namespace quocvu88\eBayAPI;

require_once "Request.php";
require_once "Response.php";
require_once "Utils.php";

/**
 * Class Connection
 *
 * @package quocvu88\eBayAPI
 */
class Connection
{

    /**
     * @var
     */
    private $token;
    /**
     * @var mixed
     */
    private $devId;
    /**
     * @var mixed
     */
    private $appId;
    /**
     * @var mixed
     */
    private $certId;
    /**
     * @var mixed
     */
    private $serverUrl;
    /**
     * @var mixed
     */
    private $compatLevel;
    /**
     * @var mixed
     */
    private $siteId;

    /**
     * Connection constructor.
     *
     * @param $config
     * @param $token
     * @ignore
     */
    public function __construct($config, $token)
    {
        $util = new Utils();
        $this->token = $token;
        $this->devId = $config['devId'];
        $this->appId = $config['appId'];
        $this->certId = $config['certId'];
        $this->serverUrl = $config['serverUrl'];
        $this->compatLevel = $config['compatLevel'];
        $this->siteId = $config['siteId'];
    }

    /**
     * Call Request function
     *
     * @param $apiFunction
     * @param $xmlBody
     * @return \quocvu88\eBayAPI\Response
     * @author Vu Hoang - quocvu88
     */
    public function callRequest($apiFunction, $xmlBody)
    {
        //Create a new eBay session with all details pulled in from included keys.php
        $request = new Request($this->token, $this->devId, $this->appId, $this->certId, $this->serverUrl,
            $this->compatLevel, $this->siteId, $apiFunction);
        //send the request and get response
        $responseXml = $request->sendHttpRequest($xmlBody);
        $response = new Response($responseXml);
        return $response;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
