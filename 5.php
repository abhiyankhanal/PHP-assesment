<!-- 5. Write a crawler in PHP to extract data from URL: https://books.toscrape.com/ 
a. Navigate to category ‘Science’ 
b. Collect all the listings available (across pages) 
c. Collect the following data from each listing (column names as listed in bold, with required datatype): 
i. id: Create a random alphanumeric text value of length 8 – String 
ii. category : ‘Science’ (Fixed value – String) 
iii. category_url : Category URL – String 
iv. title : Book Title (full text – String) 
v. price : Price listed for the book – Float 
vi. stock: Stock Availability – String 
vii. rating: No of Ratings (Stars value – Float) 
viii. url: Detail URL of the book – String
d. Create a ‘CSV’ file named ‘science_listing.csv’, with data collected.  -->


<?php
$url = 'https://books.toscrape.com/catalogue/category/books/science_22/index.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html  = curl_exec($ch);

$dom = new DOMdocument();
@ $dom->loadHTML($html);
$xpath = new DOMXPath($dom);

define("category", "Science");

$final_arr = array();

$articles = $dom->getElementsByTagName('article');
$urls = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');
$stocks = $xpath->evaluate('//*[@id="default"]/div/div/div/div/section/div[2]/ol/li/article/div[2]/p[2]');
$ratings = $xpath->evaluate('.//*[@id="default"]//article/p');

foreach ($prices as $k => $price) {
    $final_arr[$k]['id'] = generateIds();
}

foreach ($prices as $k => $price) {
    $final_arr[$k]['category'] = category;
}

foreach ($articles as $k => $link) {
    $title = $link->getElementsByTagName('a');
    foreach($title as $t) {
        $new_t = $t->getAttribute('title');
        if($new_t) {
            $final_arr[$k]['title'] = $new_t;
        }
        
    }
}

foreach($urls as $k => $a) {
    $new_t = $a->getAttribute('href');
    $full_link = str_replace('../../..', 'https://books.toscrape.com/catalogue', $new_t);
    if($full_link) {
        $final_arr[$k]['href'] = $full_link;
    }
}

foreach ($prices as $k => $price) {
    $pp = $price->textContent;
    $final_arr[$k]['price'] = $pp;
}

foreach ($stocks as $k => $stock) {
    $ss = $stock->textContent;
    $final_arr[$k]['stock'] = trim($ss);
}

foreach ($ratings as $k => $rating) {
    $rr = str_replace('star-rating', '', $rating->getAttribute('class'));
    $final_arr[$k]['rating'] = $rr;
}
// print_r($final_arr);

$fp = fopen('science_listing.csv', 'w');
fputcsv($fp, array_keys($final_arr[0]));
foreach ($final_arr as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);


//util
function generateIds(){
$str_result='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
return substr(str_shuffle($str_result),0, 8);
}

