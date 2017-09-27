<?php

$response = {
    "content" => {
      "picUrl" => "Hello PHP",
      "url" => "朱朱的鸡鸡特别小",
      "status" => "阿坤的鸡鸡特别大"
    }
  };

echo json_encode($response);
// "content":{
//     "picUrl":"",
//     "url":"",
//     "status":"0"   0未发版 1已发版
// }
