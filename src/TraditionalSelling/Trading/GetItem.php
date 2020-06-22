<?php
/**
 *  File GetItem.php
 *
 * @author Vu Hoang (quocvu88@gmail.com)
 * @package ebay_sdk
 * @version 1.0
 *
 * Ref: https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetItem.html#GetItem
 */

namespace quocvu88\eBayAPI\TraditionalSelling\Trading;

use quocvu88\eBayAPI\Connection;

/**
 * Class GetItem
 *
 * @package quocvu88\eBayAPI\TraditionalSelling\Trading
 */
class GetItem
{
    /**
     * @var bool
     */
    private $includeItemCompatibilityList;
    /**
     * @var bool
     */
    private $includeItemSpecifics;
    /**
     * @var bool
     */
    private $includeTaxTable;
    /**
     * @var bool
     */
    private $includeWatchCount;
    /**
     * @var string
     */
    private $itemId;
    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $transactionId;
    /**
     * @var string
     */
    private $variationSku;
    /**
     * @var array
     */
    private $variationSpecifics;
    /**
     * @var string
     */
    private $detailLevel;

    /**
     * @var string
     */
    private $verb = "GetItem";
    /**
     * @var \quocvu88\eBayAPI\Connection
     */
    private $conn;

    /**
     * GetItem constructor.
     *
     * @param $conn
     * @ignore
     */
    public function __construct($conn)
    {
        $this->includeItemCompatibilityList = false;
        $this->includeItemSpecifics = false;
        $this->includeTaxTable = false;
        $this->includeWatchCount = false;
        $this->itemId = '';
        $this->sku = '';
        $this->transactionId = '';
        $this->variationSku = '';
        $this->variationSpecifics = array();
        $this->detailLevel = 'ReturnAll';

        $this->conn = $conn;
    }

    /**
     * Send Request function
     *
     * @param $eBayUserID
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
        $xmlBody .= '<GetItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        if ($this->includeItemCompatibilityList) {
            $xmlBody .= '<IncludeItemCompatibilityList>' . $this->includeItemCompatibilityList . '</IncludeItemCompatibilityList>';
        }
        if ($this->includeItemSpecifics != '') {
            $xmlBody .= '<IncludeItemSpecifics>' . $this->includeItemSpecifics . '</IncludeItemSpecifics>';
        }
        if ($this->itemId != '') {
            $xmlBody .= '<ItemID>' . $this->itemId . '</ItemID>';
        }
        $xmlBody .= '<DetailLevel>' . $this->detailLevel . '</DetailLevel>';
        $xmlBody .= '<RequesterCredentials><eBayAuthToken>' . $token . '</eBayAuthToken></RequesterCredentials>';
        $xmlBody .= '</GetItemRequest>';
        return $xmlBody;
    }

    /**
     * @return bool
     */
    public function isIncludeItemCompatibilityList()
    {
        return $this->includeItemCompatibilityList;
    }

    /**
     * @param bool $includeItemCompatibilityList
     */
    public function setIncludeItemCompatibilityList($includeItemCompatibilityList)
    {
        $this->includeItemCompatibilityList = $includeItemCompatibilityList;
    }

    /**
     * @return bool
     */
    public function isIncludeItemSpecifics()
    {
        return $this->includeItemSpecifics;
    }

    /**
     * @param bool $includeItemSpecifics
     */
    public function setIncludeItemSpecifics($includeItemSpecifics)
    {
        $this->includeItemSpecifics = $includeItemSpecifics;
    }

    /**
     * @return bool
     */
    public function isIncludeTaxTable()
    {
        return $this->includeTaxTable;
    }

    /**
     * @param bool $includeTaxTable
     */
    public function setIncludeTaxTable($includeTaxTable)
    {
        $this->includeTaxTable = $includeTaxTable;
    }

    /**
     * @return bool
     */
    public function isIncludeWatchCount()
    {
        return $this->includeWatchCount;
    }

    /**
     * @param bool $includeWatchCount
     */
    public function setIncludeWatchCount($includeWatchCount)
    {
        $this->includeWatchCount = $includeWatchCount;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getVariationSku()
    {
        return $this->variationSku;
    }

    /**
     * @param string $variationSku
     */
    public function setVariationSku($variationSku)
    {
        $this->variationSku = $variationSku;
    }

    /**
     * @return array
     */
    public function getVariationSpecifics()
    {
        return $this->variationSpecifics;
    }

    /**
     * @param array $variationSpecifics
     */
    public function setVariationSpecifics($variationSpecifics)
    {
        $this->variationSpecifics = $variationSpecifics;
    }

    /**
     * @return string
     */
    public function getDetailLevel()
    {
        return $this->detailLevel;
    }

    /**
     * @param string $detailLevel
     */
    public function setDetailLevel($detailLevel)
    {
        $this->detailLevel = $detailLevel;
    }


}