<?php require_once('baglan.php'); ?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="foto"><br><br>
    <input type="text" name="baslik" placeholder="Blog başlığı Giriniz"> <br><br>
    <textarea name="icerik" cols="30" rows="10" placeholder="İçerik Ekleyin"></textarea> <br><br>
    <input type="submit" value="Kaydet">
</form>

<!-- Dosya Özellikleri -->

<!-- 
    1024 bayt -> 1kb
    1024 kb -> 1mb
    1024 mb -> 1gb
 -->

<?php
if ($_POST) {
    #Dosyanın adını ekrana yazar
    print "Dosya Adı: " . $_FILES['foto']['name'] . "<br>";

    #Dosyanın geçici kaydedildiği dosya yolunu ekrana yazar
    print "Geçici İsim: " . $_FILES['foto']['tmp_name'] . "<br>";

    #Dosyanın boyutunu ekrana yazdırır
    print "Dosya Boyutu: " . $_FILES['foto']['size'] . "<br>";

    #Dosya boyut kontrolü yaptırma
    if ($_FILES['foto']['size'] > 103600) {
        echo 'Dosya eklenemedi. Boyutu aştınız <br>';
    } else {
        echo 'Dosya Eklendi <br>';
    }

    #Dosyanın tür bilgisini ekrana yazdırır.
    print "Dosya Türü: " . $_FILES['foto']['type'] . "<br>";

    #Dosya Türü kontrolü yaptırma
    if ($_FILES['foto']['type'] == 'image/jpeg') {
        echo 'Kaydedildi';
    } else {
        echo 'Lütfen Doğru Dosya Tipini seç. Eğer ayırt edemiyorsan Kaan pamukçu ile bilişim derslerine katıl';
    }
}
?>
<br><br><br>
<?php
if ($_POST) {

    $dizin = "../img/";
    $yuklenecekfoto = $dizin . $_FILES['foto']['name'];
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $yuklenecekfoto)) {
        $sorgu = $db->prepare('insert into blog(foto,baslik,icerik) values(?,?,?)');
        $sorgu->execute(array($yuklenecekfoto, $baslik, $icerik));

        if ($sorgu->rowCount()) {
            echo 'Blog Yazınız Eklendi <br><br>';

            /* Geçici Olarak Ekrana Yazdırma Start */
            echo '<img src="'.$yuklenecekfoto.'"><br>';
            echo $baslik."<br>";
            echo $icerik;
            /* Geçici Olarak Ekrana Yazdırma End */
            
        } else {
            echo 'Hata Oluştu';
        }
    }
}
?>
