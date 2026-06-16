<?php
$data = [
  'category1' => [
    'price' => 100, //int
    'name' => 'name1' //name
  ],
  'category2' => [
    'price' => 676767676767676, 
    'name' => 'name2' 
  ],
  'category2' => [
    'price' => 250,
    'name' => 'name2' 
  ],
  'category3' => [
    'price' => 100,
    'name' => 'name3'
  ]
];
$own_price = "100";
$own_name = "name67";

foreach($data as $category) {
  if ($category["price"] == $own_price || $category["name"] == $own_name) {
  print_r($category);
  }
}
?>