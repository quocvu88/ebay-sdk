<?php
/**
 *  File Utils.php
 *
 * @author Vu Hoang (quocvu88@gmail.com
 * @package ebay_sdk
 * @version 1.0
 */

namespace quocvu88\eBayAPI;

/**
 * Class Utils
 *
 * @package quocvu88\eBayAPI
 */
class Utils
{

    /**
     * Utils constructor.
     *
     * @ignore
     */
    public function __construct()
    {
        //TODO: Add something later
    }

    /**
     * Get Token function
     *
     * @return mixed|string
     * @author Vu Hoang - quocvu88
     */
    public function getTokenFromFile($filename)
    {
        $creFile = fopen($filename, "r");
        $credential = fread($creFile, filesize($filename));
        fclose($creFile);
        if ($credential != '') {
            $credentialDetails = json_decode($credential, 1);
            if (is_array($credentialDetails) && array_key_exists('token', $credentialDetails)) {
                return $credentialDetails['token'];
            }
        }
        return '';
    }

    /**
     * Parse APIFunction function
     *
     * @param $apiFunction
     * @return array
     * @author Vu Hoang - quocvu88
     */
    public function parseAPIFunction($apiFunction)
    {
        $parts = explode('\\', $apiFunction);
        return end($parts);
    }

    /**
     * Parse XML To Array function
     *
     * @param $objSimpleXML
     * @return array
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function parseXmlToArray($objSimpleXML){
        $arrOuput = [];
        foreach ( (array) $objSimpleXML as $index => $node )
            $arrOuput[$index] = ( is_object ( $node ) ) ? $this->parseXmlToArray ( $node ) : $node;

        return $arrOuput;
    }

    /**
     * Parse Xml To Json function
     *
     * @param $objSimpleXML
     * @return false|string
     * @author Vu Hoang (quocvu88@gmail.com)
     */
    public function parseXmlToJson($objSimpleXML){
        return json_encode($objSimpleXML);
    }
}