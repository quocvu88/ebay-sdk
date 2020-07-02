<?php
/**
 *  File GetSellerDashboard.php
 *
 * @author  Vu Hoang (quocvu88@gmail.com)
 * @package ebay-sdk
 * @version 1.0
 *
 * Ref:
 */

namespace quocvu88\eBayAPI\TraditionalSelling\Trading;

class GetSellerDashboard
{
    /**
     * @var string
     */
    private $verb = "GetSellerDashboard";
    /**
     * @var \quocvu88\eBayAPI\Connection
     */
    private $conn;

    /**
     * GetSellerDashboard constructor.
     *
     * @param $conn
     * @ignore
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * Send Request function
     *
     * @return \quocvu88\eBayAPI\Response
     * @author Vu Hoang - quocvu88
     */
    public function sendRequest()
    {
        $requestXmlBody = $this->buildRequestBody($this->conn->getToken());
        return $this->conn->callRequest($this->verb, $requestXmlBody);
    }

    /**
     * _build Request Body function
     *
     * @param $token
     * @return string
     * @author Vu Hoang - quocvu88
     */
    private function buildRequestBody($token)
    {
        $xmlBody = '<?xml version="1.0" encoding="utf-8" ?>';
        $xmlBody .= '<GetSellerDashboardRequest  xmlns="urn:ebay:apis:eBLBaseComponents">';
        $xmlBody .= '<RequesterCredentials><eBayAuthToken>' . $token . '</eBayAuthToken></RequesterCredentials>';
        $xmlBody .= '</GetSellerDashboardRequest >';
        return $xmlBody;
    }
}