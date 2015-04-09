<title>NhanhAPI | Get product detail</title>
<?php
/**
 * Code sample to send the detailed product's information.
 * Nhanh.vn will check if the $product->getId() is existed or not
 * to insert or update the record in Nhanh.vn
 */
header('Content-type: text/html; charset=utf-8');

require_once '../src/NhanhService.php';

$data = array(
    array(
        "id" => 1541245,
        "code" => "SSGS2",
        "name" => "Samsung Galaxy S2",
        "importPrice" => 12000000,
        "price" => 13500000,
    )
);

$service = new NhanhService();

// the storeId in e-commerce platforms, individual websites set $storeId = null;
$storeId = 2335458;
// If the product was synchronized from Nhanh.vn, the merchant website must save the idNhanh
// for each product in merchant website and use this id to get more information from Nhanh.vn
$nhanhProductId = 775352;

$response = $service->sendRequest(NhanhService::URI_ADD_PRODUCT, $data, $storeId);

if($response->code) {
	echo "<h1>Success!</h1>";
} else {
	echo "<h1>Failed!</h1>";
	foreach ($response->messages as $message) {
		echo "<p>$message</p>";
	}
}