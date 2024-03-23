<?php

$id_mhs = $_GET['id_mhs'];

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://10.33.35.64/sait_project_api/mahasiswa_api.php?id_mhs='.$id_mhs.'';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 //
echo "<br>Success deleting!";
echo "<br><a href=selectMahasiswaView.php> OK </a>";

?>