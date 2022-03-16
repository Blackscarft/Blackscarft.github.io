<?php 
$data = array(
  "nama" => $_POST['nama'],
  "pesan" => $_POST['pesan'],
  "is_hadir" => $_POST['is_hadir'],
  );

if (filesize("pesan.json") == 0) {
  $json = json_encode(array($data));
  // write json to file
  file_put_contents("pesan.json", $json);
  echo $json;
} else {
  $dataLama = file_get_contents('pesan.json');
  // true = json object di kembalikan sebagai array, false = json object di kembalikan sebagai object
  $arraySementara = json_decode($dataLama, true);
  array_push($arraySementara, $data);
  $dataFinal = json_encode($arraySementara);
  file_put_contents('pesan.json', $dataFinal);
  echo json_encode(array($data));
}

?>