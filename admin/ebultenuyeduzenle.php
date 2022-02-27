<?php

require_once('header.php');

$id = $_GET['id'];
$sorgu = $db->prepare("select * from ebulten where id=$id");
$sorgu->execute();
$satir = $sorgu->fetch();

?>

<!-- EBülten Üye Düzenle Start -->

<section id="uyeduzenle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>E-Bülten Üye Düzenle</h2>
            </div>
            <div class="col-12">
                <form method="post" class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="email" name="ebulten" class="form-control" value="<?php echo $satir['ebulten']; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-warning">Düzenle</button>
                        </div>
                    </div>
                </form>

                <?php
                if ($_POST) {
                    $sorgu = $db->prepare("update ebulten set ebulten=? where id=$id");
                    $sorgu -> execute(array($_POST['ebulten']));

                    if($sorgu -> rowCount()){
                        echo 'Kayıt Güncellendi. <meta http-equiv="refresh" content="2; url=ebultenuye.php">';
                    } else {
                        echo 'Hata Oluştu. <meta http-equiv="refresh" content="2; url=ebultenuye.php">';
                    }
                }
                ?>

            </div>
        </div>
    </div>
</section>

<!-- EBülten Üye Düzenle End -->

<?php require_once('footer.php'); ?>