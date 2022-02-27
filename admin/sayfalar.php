<?php require_once('header.php'); ?>

<!-- Sayfalar Liste Section Start -->
<section id="sayfalarList">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <h2>Sayfalar</h2>
            </div>
            <div class="col-md-3 ml-5">
                <a href="sayfaekle.php"><button class="btn btn-info">Sayfa Ekle</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped" style="font-size:13px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="110">Foto</th>
                            <th width="170">Başlık</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    <tbody>

                        <?php
                        $sorgu = $db->prepare('select * from sayfalar order by baslik asc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                        ?>
                                <tr>
                                    <td><?php echo $satir['id']; ?></td>
                                    <td><img src="<?php echo $satir['foto']; ?>" class="w-100"></td>
                                    <td><?php echo $satir['baslik']; ?></td>
                                    <td><?php echo $satir['durum']; ?></td>
                                    <td><?php echo $satir['tarih']; ?></td>
                                    <td><a href="sayfaduzenle.php?id=<?php echo $satir['id']; ?>">
                                        <button class="btn btn-warning">Düzenle</button></a></td>
                                    <td><a href="sayfasil.php?id=<?php echo $satir['id']; ?>">
                                    <button class="btn btn-danger">Sil</button></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Sayfa Liste Section End -->

<?php require_once('footer.php'); ?>