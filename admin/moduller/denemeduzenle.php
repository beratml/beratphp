<?php

$db = new PDO('mysql:host=localhost;dbname=aribilisim;charset=UTF8', 'root', '');

$id = $_GET['id'];

$sorgu = $db->prepare('select * from deneme where id=?');
$sorgu->execute(array($id));
$satir = $sorgu->fetch();

?>





<form action="" method="post">
    <input type="text" name="kadi" value="<?php echo $satir['kadi']; ?>"> <br>
    <input type="text" name="isim" value="<?php echo $satir['isim']; ?>"> <br>
    <input type="text" name="telefon" value="<?php echo $satir['telefon']; ?>"> <br>
    <input type="email" name="email" value="<?php echo $satir['email']; ?>"> <br>
    <input type="submit" value="Kaydet">
</form>


<?php

if ($_POST) {

    $kadi = $_POST['kadi'];
    $isim = $_POST['isim'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];

    $sorgu2 = $db->prepare('update deneme set kadi=?, isim=?, telefon=?, email=? where id=?');
    $sorgu2->execute(array($kadi, $isim, $telefon, $email, $id));

    if ($sorgu2->rowCount()) {
        echo 'Kayıt Güncellendi';
    } else {
        echo 'Hata Oluştu';
    }
}

?>