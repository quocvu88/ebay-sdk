# Ebay SDK for HMD

This is SDK for PHP connect to eBay API.

To install:
Add this package to composer.json:
```
{
  "require": {
    "quocvu88/ebay-sdk": "dev-master"
  }
}
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

