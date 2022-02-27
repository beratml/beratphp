<?php
$db = new PDO('mysql:host=localhost;dbname=aribilisim;charset=UTF8', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="" method="post">
        <input type="text" name="kadi" placeholder="Kullanıcı Adı Girin"> <br>
        <input type="text" name="isim" placeholder="Adınızı Soyadınızı Girin"> <br>
        <input type="text" name="telefon" placeholder="Telefon Numaranız"> <br>
        <input type="email" name="email" placeholder="Email Adresiniz"> <br>
        <input type="submit" value="Kaydet">
    </form>


    <?php
    /* VT'ye Kaydetme */
    if ($_POST) {
        $sorgu = $db->prepare('insert into deneme(kadi,isim,telefon,email) values(?,?,?,?)');
        $sorgu->execute(array($_POST['kadi'], $_POST['isim'], $_POST['telefon'], $_POST['email']));

        if ($sorgu->rowCount()) {
            echo 'Kayıt Girildi';
        } else {
            echo 'Hata Oluştu';
        }
    }
    ?>

    <br><br><br>

    <?php
    /* VT'den Veri Çekip Ekrana Yazdırma */
    $sorgu2 = $db->prepare('select * from deneme order by id desc');
    $sorgu2->execute();

    if ($sorgu2->rowCount()) {
        foreach ($sorgu2 as $satir) {
            echo $satir['id']." - ".$satir['kadi']." - ".$satir['isim']." - ".$satir['telefon']." - ".$satir['email'].'<a href="denemeduzenle.php?id='.$satir['id'].'">Düzenle</a> - <a href="denemesil.php?id='.$satir['id'].'">Sil</a><br>';
        }
    } else {
        echo 'Kayıt Bulunamadı';
    }

echo '<br><br><br><br>';

    /* İkinci Yöntemi */

    $sorgu3 = $db->prepare('select * from deneme');
    $sorgu3->execute();

    if ($sorgu3->rowCount()) {
        foreach($sorgu3 as $satir2){
            $id = $satir2['id'];
            $kadi = $satir2['kadi'];
            $isim = $satir2['isim'];
            $telefon = $satir2['telefon'];
            $email = $satir2['email'];

            echo $id." - ".$kadi." - ".$isim." - ".$telefon." - ".$email."<br>";
        }
    } else {
        echo 'Kayıt Bulunamadı';
    }
    ?>

    <br><br><br><br>


</body>

</html>