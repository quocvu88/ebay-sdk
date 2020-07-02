<?php
/**
 *  File TraditionalSellingTradingClient.php
 *
 * @author Vu Hoang (quocvu88@gmail.com)
 * @package ebay_sdk
 * @version 1.0
 */

namespace quocvu88\eBayAPI\Client;

use quocvu88\eBayAPI\TraditionalSelling\Trading\GetItem;
use quocvu88\eBayAPI\TraditionalSelling\Trading\GetOrders;

/**
 * Class TraditionalSellingTradingClient
 * @package quocvu88\eBayAPI
 */
class TraditionalSellingTradingClient extends Client
{

    /**
     * Get Item function
     * @param $getItemParams
     * @return bool|\quocvu88\eBayAPI\Response
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function getItem($getItemParams){
        return $this->callFunction('quocvu88\eBayAPI\TraditionalSelling\Trading\GetItem', $getItemParams);
    }

    /**
     * Get Orders function
     *
     * @param $getOrdersParams
     * @return bool|\quocvu88\eBayAPI\Response
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function getOrders($getOrdersParams){
        return $this->callFunction('quocvu88\eBayAPI\TraditionalSelling\Trading\GetOrders', $getOrdersParams);
    }

    /**
     * Get Seller Dashboard function
     *
     * @return bool|\quocvu88\eBayAPI\Response
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function getSellerDashboard(){
        return $this->callFunction('quocvu88\eBayAPI\TraditionalSelling\Trading\GetSellerDashboard', null);
    }
}
