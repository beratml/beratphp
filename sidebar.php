<div class="col-md-3">
    <aside>
        <div class="row">
            <div class="col-12">
                <h5>Bizi Takip Edin</h5>
                <a href="<?php echo $satir['facebook']; ?>" target="_blank"><i class="bi bi-facebook" style="font-size:30px;"></i></a>
                <a href="<?php echo $satir['instagram']; ?>" target="_blank"><i class="bi bi-instagram" style="font-size:30px;"></i></a>
                <a href="<?php echo $satir['twitter']; ?>" target="_blank"><i class="bi bi-twitter" style="font-size:30px;"></i></a>
                <a href="<?php echo $satir['whatsapp']; ?>" target="_blank"><i class="bi bi-whatsapp" style="font-size:30px;"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <h5>Son Yazılar</h5>
                <?php
                    $sorgu_sonyazilar = $db -> prepare('select * from yazilar order by id desc limit 5');
                    $sorgu_sonyazilar -> execute();

                    if($sorgu_sonyazilar -> rowCount()){
                        foreach($sorgu_sonyazilar as $satir_sonyazilar){
                            ?>
                                <small>
                                <a href="sample.php?id=<?php echo $satir_sonyazilar['id']; ?>"><?php echo $satir_sonyazilar['baslik']; ?></a><br>
                                </small>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <h5>Kategoriler</h5>
                <?php
                    $sorgu_kategori = $db -> prepare('select * from kategoriler order by id desc limit 5');
                    $sorgu_kategori -> execute();

                    if($sorgu_kategori -> rowCount()){
                        foreach($sorgu_kategori as $satir_kategori){
                            ?>
                                <small>
                                <a href="kategori.php?id=<?php echo $satir_kategori['id']; ?>"><?php echo $satir_kategori['katadi']; ?></a><br>
                                </small>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <?php
                    $sorgu_harita = $db -> prepare('select * from ayarlar order by id desc limit 1');
                    $sorgu_harita -> execute();

                    if($sorgu_harita -> rowCount()){
                        foreach($sorgu_harita as $satir_ayarlar){
                            echo $satir_ayarlar['harita'];
                    }
                }
                ?>
            </div>
        </div>
        <br>
        
    </aside>
</div>