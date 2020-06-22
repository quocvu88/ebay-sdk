<?php
/**
 *  File Response.php
 *
 * @author Vu Hoang (quocvu88@gmail.com)
 * @package ebay_sdk
 * @version 1.0
 */

namespace quocvu88\eBayAPI;

/**
 * Class Response
 *
 * @package quocvu88\eBayAPI
 */
class Response
{
    /**
     * @var mixed
     */
    private $content;
    /**
     * @var array
     */
    private $error;

    /**
     * Response constructor.
     */
    public function __construct($strResponseXml)
    {
        if (stristr($strResponseXml, 'HTTP 404') || $strResponseXml == '') {
            $this->content = null;
            $this->error = [
                'code' => '0000',
                'shortMessage' => 'Error sending Request',
                'longMessage' => 'Cannot send request to eBay due to Network error or Wrong address'
            ];
        } else {
            //Xml string is parsed and creates a DOM Document object
            $responseDoc = new \DomDocument();
            $responseDoc->loadXML($strResponseXml);
            $this->content = simplexml_import_dom($responseDoc);
            //get any error nodes
            $errors = $responseDoc->getElementsByTagName('Errors');
            if ($errors->length > 0) {
                //Get error code, ShortMesaage and LongMessage
                $this->error = [
                    'code' => $errors->item(0)->getElementsByTagName('ErrorCode'),
                    'shortMessage' => $errors->item(0)->getElementsByTagName('ShortMessage'),
                    'longMessage' => $errors->item(0)->getElementsByTagName('LongMessage')
                ];
            } else {
                $this->error = [
                    'code' => '1',
                    'shortMessage' => 'Your request was sent successfully',
                    'longMessage' => 'Your request was sent successfully'
                ];
            }
        }
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }


}
