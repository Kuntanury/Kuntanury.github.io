<?php
header('Content-type: text/json');
$response = Array(
    "content" => Array(
      "picUrl" => "Hello PHP",
      "url" => "朱朱的鸡鸡特别小",
      "status" => "1"
    )
  );
echo json_encode($response);
?>
