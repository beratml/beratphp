<?php require_once('header.php'); ?>

<!-- Yorum Listesi Start -->
<section id="yorumlar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Adı</th>
                            <th>Email</th>
                            <th>Yorum</th>
                            <th>Kvkk</th>
                            <th>Yazı Başlığı</th>
                            <th>Yorum Onayı</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sorgu = $db->prepare('select * from yorumlar order by id desc');
                        $sorgu->execute();

                        if ($sorgu->rowCount()) {
                            foreach ($sorgu as $satir) {
                        ?>
                                <tr>
                                    <td><?php echo $satir['adiniz']; ?></td>
                                    <td><?php echo $satir['email']; ?></td>
                                    <td><?php echo $satir['yorum']; ?></td>
                                    <td><?php echo $satir['onay']; ?></td>
                                    <td>
                                        <?php
                                        $yazibaslik = $satir['yazino'];

                                        $sorgu_yazi = $db->prepare('select * from yazilar where id=?');
                                        $sorgu_yazi->execute(array($yazibaslik));
                                        $satir_yazi = $sorgu_yazi->fetch();

                                        if ($sorgu_yazi->rowCount()) {
                                            echo $satir_yazi['baslik'];
                                        } else {
                                            echo 'Yanlış Yazdın Kontrol Et';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $satir['adminonay'];
                                        if ($_GET) {
                                            $id = $_GET['id'];
                                            $sorgu_yenionay = $db->prepare('update yorumlar set adminonay=1 where id=?');
                                            $sorgu_yenionay->execute(array($id));

                                            if ($sorgu_yenionay->rowCount()) {
                                                echo '<meta http-equiv="refresh" content="0; url=yorumlar.php">';
                                            } else {
                                                echo '<meta http-equiv="refresh" content="0; url=yorumlar.php">';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="yorumlar.php?id=<?php echo $satir['id']; ?>">
                                            <button class="btn btn-primary">Onayla</button></a>
                                    </td>
                                    <td>
                                        <a href="yorumsil.php?id=<?php echo $satir['id']; ?>">
                                            <button type="submit" class="btn btn-danger">Sil</button></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Yorum Listesi End -->

<?php require_once('footer.php'); ?>