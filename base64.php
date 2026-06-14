<?php
$file_content = file_get_contents("products.json");
$json = json_decode($file_content, true);

foreach($json as $call)
{
  foreach($call as $product_name) {
    if ($product_name["tradable"] == "true") {
      $data = [
      "image_name" => $product_name["image_name"],
      "link" => $product_name["image"]["link"],
      "file_path" => "/image_folder/" . $product_name["image_name"] . ".jpeg",
      "name" => $product_name["name"]
      ];
      print_r($data);
    }
  }
}
?>
