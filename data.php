<?php
  if( isset($_GET['sch']) ) $sch = $_GET['sch'];
  // $sch ="10511";
  $url = "http://ws.bus.go.kr/api/rest/stationinfo/getStationByUid?ServiceKey=RKXQHYPJ8%2BFx5xol3OoeBIe%2FzyA%2FcQBSQ8G%2B4kptD5VYbPM3L53PVTFote%2Ba7SU2GwYBCozCccWd1C8HaxKncw%3D%3D&arsId={$sch}"; /*URL*/
  //도봉03 10511
  $xml_data = simplexml_load_file($url);
  // var_dump($xml_data);
  $json_data = json_encode($xml_data);
  echo $json_data;
 ?>
