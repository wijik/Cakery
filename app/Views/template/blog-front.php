<section class="htc__blog__area bg__white pb--130">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title section__title--2 text-center">
                    <h2 class="title__line">Article Terbaru</h2>
                    <p>Berikut ini artikel-artikel terbaru</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog__wrap clearfix mt--60 xmt-30">
                <?php $no = 0; ?>
                <?php foreach ($artikel as $a) : ?>
                    <?php
                    $tanggal = date("D", strtotime($a[$no]['created-date']));
                    $bulan = date("M", strtotime($a[$no]['created_date']));
                    ?>
                    <!-- Start Single Blog -->
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog foo">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <a href="blog-details.html">
                                        <img src="/uploads/<?= $a[$no]['gambar']; ?>" alt="blog images">
                                    </a>
                                    <div class="blog__post__time">
                                        <div class="post__time--inner">
                                            <span class="date"><?= $tanggal; ?></span>
                                            <span class="month"><?= $bulan; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog__hover__info">
                                    <div class="blog__hover__action">
                                        <p class="blog__des"><a href="blog-details.html">Lorem ipsum dolor sit consectetu.</a></p>
                                        <ul class="bl__meta">
                                            <li>By :<?= $a[$no]['by']; ?></li>
                                        </ul>
                                        <div class="blog__btn">
                                            <a class="read__more__btn" href="/artikel/<?= $a[$no]['slug']; ?>">read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $no++ ?>
                    <!-- End Single Blog -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>