<?php

function scrapJSON($link)
{
    $json = file_get_contents($link);
    $data = json_decode($json, true);
    $products = $data['products'];
    $dataStruct = [['title' => 'Title', 'price' => 'Price', 'brand' => 'Brand']];
    foreach($products as $product) {
        $dataStruct[] = [
            'title' => $product['title'],
            'price' => $product['price'],
            'brand' => $product['brand']
        ];
    }
    $csv = fopen('laptop.csv', 'w');
    foreach ($dataStruct as $filterRow) {
        fputcsv($csv, $filterRow);
    }
    fclose($csv);
}

scrapJSON('https://dummyjson.com/products/search?q=Laptop');
?>
