<?php

$db = new PDO('mysql:host=localhost;dbname=aribilisim;charset=UTF8', 'root', '');

$id = $_GET['id'];

$sorgu = $db -> prepare('delete from deneme where id=?');
$sorgu -> execute(array($id));

if($sorgu -> rowCount()){
    echo 'Kayıt Silinmiştir.';
    echo '<meta http-equiv="refresh" content="2; url=deneme.php">';
} else {
    echo 'Hata Oluştu';
}

?>

