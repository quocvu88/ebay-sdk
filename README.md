# Ebay SDK for HMD

This is SDK for PHP connect to eBay API.

To install:
Run this command
```
composer require quocvu88/ebay-sdk
```
Quick Example:
```
require_once __DIR__ . '/vendor/autoload.php';

$config = [
    'appId' => 'Your-Application-ID',
    'devId' => 'Your-Developer-ID',
    'certId' => 'Your-Certificate-ID',
    'serverUrl' => 'https://api.ebay.com/ws/api.dll',
    'compatLevel' => 1149,
    'siteID' => 0
];

$token = 'Your-Store-Token';
$client = new quocvu88\eBayAPI\Client\TraditionalSellingTradingClient($config, $token, 'array');
$response = $client->getItem(
    [
        'itemID' => 'item-id',
        'IncludeItemSpecifics' => true
    ]
);

echo '<pre>';
print_r($item->getContent());
echo '</pre>';
```

