<?php
/**
 *  File GetSellerProfiles.php
 *
 * @author  Vu Hoang (quocvu88@gmail.com)
 * @package ebay-sdk
 * @version 1.0
 *
 * Ref:
 */

namespace quocvu88\eBayAPI\Sell\Account;

class GetSellerProfiles
{
    private $includeDetails = true;
    private $profileId;
    private $profileName;
    private $profileType;
    private $extension; //Reserved for future use
    /**
     * @var string
     */
    private $verb = "GetSellerProfiles";
    /**
     * @var \quocvu88\eBayAPI\Connection
     */
    private $conn;

    /**
     * GetSellerProfiles constructor.
     *
     * @param $conn
     * @ignore
     */
    public function __construct($conn)
    {
        $this->includeDetails = true;
        $this->profileId = 0;
        $this->profileName = '';
        $this->profileType = '';

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
        $xmlBody .= '<getSellerProfilesRequest xmlns="http://www.ebay.com/marketplace/selling">';
        if ($this->includeDetails) {
            $xmlBody .= '<includeDetails>' . $this->includeDetails . '</includeDetails>';
        }
        if ($this->profileId > 0) {
            $xmlBody .= '<profileId>' . $this->profileId . '</profileId>';
        }
        if ($this->profileName != '') {
            $xmlBody .= '<profileName>' . $this->itemId . '</profileName>';
        }

        $xmlBody .= '<RequesterCredentials><eBayAuthToken>' . $token . '</eBayAuthToken></RequesterCredentials>';
        $xmlBody .= '</GetItemRequest>';
        return $xmlBody;
    }

    /**
     * @return bool
     */
    public function isIncludeDetails()
    {
        return $this->includeDetails;
    }

    /**
     * @param bool $includeDetails
     */
    public function setIncludeDetails($includeDetails)
    {
        $this->includeDetails = $includeDetails;
    }

    /**
     * @return int
     */
    public function getProfileId()
    {
        return $this->profileId;
    }

    /**
     * @param int $profileId
     */
    public function setProfileId($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * @return string
     */
    public function getProfileName()
    {
        return $this->profileName;
    }

    /**
     * @param string $profileName
     */
    public function setProfileName($profileName)
    {
        $this->profileName = $profileName;
    }

    /**
     * @return string
     */
    public function getProfileType()
    {
        return $this->profileType;
    }

    /**
     * @param string $profileType
     */
    public function setProfileType($profileType)
    {
        $this->profileType = $profileType;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }



}