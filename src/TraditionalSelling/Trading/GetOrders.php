<?php
/**
 *  File GetOrders.php
 *
 * @author Vu Hoang (quocvu88@gmail.com)
 * @package ebay_sdk
 * @version 1.0
 *
 * Ref: https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetOrders.html#GetOrders
 */

namespace quocvu88\eBayAPI\TraditionalSelling\Trading;

use quocvu88\eBayAPI\Connection;

/**
 * Class GetOrders
 *
 * @package quocvu88\eBayAPI\TraditionalSelling\Trading
 */
class GetOrders
{

    /**
     * @var string
     */
    private $createTimeFrom;
    /**
     * @var string
     */
    private $createTimeTo;
    /**
     * @var string
     */
    private $includeFinalValueFee;
    /**
     * @var string
     */
    private $modTimeFrom;
    /**
     * @var string
     */
    private $modTimeTo;
    /**
     * @var int
     */
    private $numberOfDays;
    /**
     * @var array
     */
    private $orderIdArray;
    /**
     * @var string
     */
    private $orderRole;
    /**
     * @var string
     */
    private $orderStatus;
    /**
     * @var array
     */
    private $pagination;
    /**
     * @var string
     */
    private $sortingOrder;
    /**
     * @var string
     */
    private $detailLevel;

    /**
     * @var string
     */
    private $verb = "GetOrders";
    /**
     * @var \quocvu88\eBayAPI\Connection
     */
    private $conn;

    /**
     * GetOrders constructor.
     *
     * @param $conn
     * @ignore
     */
    public function __construct($conn)
    {
        $this->createTimeFrom = '';
        $this->createTimeTo = '';
        $this->includeFinalValueFee = '';
        $this->modTimeFrom = '';
        $this->modTimeTo = '';
        $this->numberOfDays = 0;
        $this->orderIdArray = [];
        $this->orderRole = 'Seller';
        $this->orderStatus = 'All';
        $this->pagination = [
            'entriesPerPage' => 100,
            'pageNumber' => 1
        ];
        $this->sortingOrder = 'Ascending';
        $this->detailLevel = 'ReturnAll';

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
        $xmlBody .= '<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">';
        if ($this->createTimeFrom != '') {
            $xmlBody .= '<CreateTimeFrom>' . $this->createTimeFrom . '</CreateTimeFrom>';
        }
        if ($this->createTimeTo != '') {
            $xmlBody .= '<CreateTimeTo>' . $this->createTimeTo . '</CreateTimeTo>';
        }
        if ($this->modTimeFrom != '') {
            $xmlBody .= '<ModTimeFrom>' . $this->modTimeFrom . '</ModTimeFrom>';
        }
        if ($this->modTimeTo != '') {
            $xmlBody .= '<ModTimeTo>' . $this->modTimeTo . '</ModTimeTo>';
        }
        if ($this->numberOfDays > 0) {
            if ($this->numberOfDays <= 30) {
                $xmlBody .= '<NumberOfDays>' . $this->numberOfDays . '</NumberOfDays>';
            } else {
                $xmlBody .= '<NumberOfDays>30</NumberOfDays>';
            }
        }
        if (is_array($this->orderIdArray) && count($this->orderIdArray)) {
            $xmlBody .= '<OrderIDArray>';
            foreach ($this->orderIdArray as $orderID) {
                if ($orderID != '') {
                    $xmlBody .= '<OrderID>' . $orderID . '</OrderID>';
                }
            }
            $xmlBody .= '</OrderIDArray>';
        }
        if($this->includeFinalValueFee)
            $xmlBody .= '<IncludeFinalValueFee>' . $this->includeFinalValueFee . '</IncludeFinalValueFee>';
        $xmlBody .= '<OrderRole>' . $this->orderRole . '</OrderRole>';
        $xmlBody .= '<OrderStatus>' . $this->orderStatus . '</OrderStatus>';
        $xmlBody .= '<DetailLevel>' . $this->detailLevel . '</DetailLevel>';
        $xmlBody .= '<RequesterCredentials><eBayAuthToken>' . $token . '</eBayAuthToken></RequesterCredentials>';
        $xmlBody .= '</GetOrdersRequest>';
        return $xmlBody;
    }

    /**
     * @return string
     */
    public function getCreateTimeFrom()
    {
        return $this->createTimeFrom;
    }

    /**
     * @param string $createTimeFrom
     */
    public function setCreateTimeFrom($createTimeFrom)
    {
        $this->createTimeFrom = $createTimeFrom;
    }

    /**
     * @return string
     */
    public function getCreateTimeTo()
    {
        return $this->createTimeTo;
    }

    /**
     * @param string $createTimeTo
     */
    public function setCreateTimeTo($createTimeTo)
    {
        $this->createTimeTo = $createTimeTo;
    }

    /**
     * @return string
     */
    public function getIncludeFinalValueFee()
    {
        return $this->includeFinalValueFee;
    }

    /**
     * @param string $includeFinalValueFee
     */
    public function setIncludeFinalValueFee($includeFinalValueFee)
    {
        $this->includeFinalValueFee = $includeFinalValueFee;
    }

    /**
     * @return string
     */
    public function getModTimeFrom()
    {
        return $this->modTimeFrom;
    }

    /**
     * @param string $modTimeFrom
     */
    public function setModTimeFrom($modTimeFrom)
    {
        $this->modTimeFrom = $modTimeFrom;
    }

    /**
     * @return string
     */
    public function getModTimeTo()
    {
        return $this->modTimeTo;
    }

    /**
     * @param string $modTimeTo
     */
    public function setModTimeTo($modTimeTo)
    {
        $this->modTimeTo = $modTimeTo;
    }

    /**
     * @return int
     */
    public function getNumberOfDays()
    {
        return $this->numberOfDays;
    }

    /**
     * @param int $numberOfDays
     */
    public function setNumberOfDays($numberOfDays)
    {
        $this->numberOfDays = $numberOfDays;
    }

    /**
     * @return array
     */
    public function getOrderIdArray()
    {
        return $this->orderIdArray;
    }

    /**
     * @param array $orderIdArray
     */
    public function setOrderIdArray($orderIdArray)
    {
        $this->orderIdArray = $orderIdArray;
    }

    /**
     * @return string
     */
    public function getOrderRole()
    {
        return $this->orderRole;
    }

    /**
     * @param string $orderRole
     */
    public function setOrderRole($orderRole)
    {
        $this->orderRole = $orderRole;
    }

    /**
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return array
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @param array $pagination
     */
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * @return string
     */
    public function getSortingOrder()
    {
        return $this->sortingOrder;
    }

    /**
     * @param string $sortingOrder
     */
    public function setSortingOrder($sortingOrder)
    {
        $this->sortingOrder = $sortingOrder;
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