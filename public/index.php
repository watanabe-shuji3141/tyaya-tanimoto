<?php require("data.php");
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content=""> -->

    <meta name="format-detection" content="telephone=no">

    <!-- サムネの画像設定 -->
    <!-- <meta name="thumbnail" content="http://www.example.com/〇〇〇.jpg" /> -->

    <!-- 検索時概要説明 -->
    <meta name="description" content="和食、小料理等提供しています。店内は全席カウンター席、落ち着いた雰囲気でおしゃべりな店主が作ったこだわりの一品を楽しめます^_^" />

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>茶屋 小料理たにもと | 沖縄安里にあるおしゃれな和食、小料理屋です</title>


    <!-- favicon -->
    <link rel=”icon” href="assets/image/favicon.ico">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


</head>

<body class="window_fadeoff" style="<?php echo $bg_img; ?>">
    <!-- アニメーション表示する場合 -->
    <!-- <div class="animsition"> -->
    <div>
        <div id="app">
            <main class="wrap">
                <div>
                    <div class="w-100 fixed-top row p-3">
                        <div class="tell col-6 text-left px-0">
                            <p class="tell_num text-decoration-none text-white pl-3 d-md-none d-block">ご予約はお電話にて</p>
                        </div>
                        <div class="col-6 text-right px-0">
                            <p class="tell_num text-decoration-none text-white d-none d-md-block pr-3">ご予約はお電話にて</p>
                            <a href="tel:090-7585-8147" class="tell_num text-decoration-none text-white">090-7585-8147<i class="fas fa-phone mx-2"></i></a>
                        </div>
                    </div>

                    <div class="w-100">
                        <img class="pc-img img-fluid d-none d-md-block" src="<?php echo $image_url_pc; ?>" alt="">
                        <img class="phone-img img-fluid d-block d-md-none" src="<?php echo $image_url_phone; ?>" alt="">
                        <!-- <div class="bg-img pc-img d-none d-md-block"></div>
                                <div class="bg-img phone-img d-block d-md-none"></div> -->
                    </div>
                    <!-- <a href="#" class="scroll-info"><span></span><span></span></a> -->

                </div>
                <h1 class="invisible">沖縄　安里　和食　お洒落 おしゃれ　こだわり　落ち着いた　カウンター　日本酒　焼酎</h1>
                <div class="insta_pc_fade d-none" id="fade">
                    <div class="insta_pc d-md-block d-none">
                        <div>
                            <div class="insta-sub-head h3">
                                <p class="text-white cursive">News</p>
                            </div>
                            <table class="insta-table">
                                <tbody>
                                    <tr>
                                        <td class="sticky">
                                            <button class="btn btn-dark arrow-left p-0">
                                                <svg id="svg" width="26" height="180">
                                                    <path d="M 18 40 L 8 85 L 18 140" fill="transparent" stroke="white" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td>
                                            <table class="insta-div">
                                                <tr class="">
                                                    <?php foreach ($instadata as $data) : ?>
                                                        <td>
                                                            <a href="<?php echo $data->permalink ?>" target="_blank">
                                                                <div class="insta-element px-0 float-left">
                                                                    <img src="<?php echo $data->media_url ?>" alt="" class="cover insta-img">
                                                                    <?php if (isset($data->caption)) : ?>
                                                                        <div class="insta-caption text-white down-to-top" aria-disabled="true">
                                                                            <div class="d-flex">
                                                                                <p class="w-75"><?php echo $data->timestamp ?></p>
                                                                                <p class="w-25"><i class="far fa-heart pl-1 text-danger"></i><?php echo $data->like_count ?></p>
                                                                            </div>

                                                                            <br>
                                                                            <br>
                                                                            <p><?php echo $data->caption ?></p>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </table>

                                        </td>
                                        <td class="sticky">
                                            <button class="btn btn-dark arrow-right">
                                                <svg id="svg" width="26" height="180">
                                                    <path d="M 8 30 L 18 75 L 8 130" fill="transparent" stroke="white" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-none">
                    <div class="insta_phone d-block d-md-none">
                        <div>
                            <p class="h1 text-center text-white mb-5 cursive">Insta</p>
                            <div class="mx-3">
                                <?php foreach ($instadata_mini as $data) : ?>
                                    <div class="py-5 border-top border-bottom border-muted h-100 scroll-fade">
                                        <a href="<?php echo $data->permalink ?>" target="_blank" class="">
                                            <div class="px-0 d-flex align-items-end">
                                                <img src="<?php echo $data->media_url ?>" alt="" class="insta-phone-img">
                                                <div class="text-right w-100">
                                                    <span class="pl-2 insta-phone-text"><?php echo $data->timestamp ?>
                                                        <i class="far fa-heart pl-1 text-danger"></i>　<?php echo $data->like_count ?></span>
                                                </div>
                                            </div>
                                            <?php if (isset($data->caption)) : ?>
                                                <p class="pt-5 insta-phone-text"><?php echo $data->caption ?></p>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                                <div class="text-right pt-4">
                                    <a href="" class="h2 text-white text-decoration-none cursive">more..<i class="fas fa-external-link-alt ml-2 h6"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dish">
                    <div class="text-white">
                        <p class="h1 text-center mb-5 cursive">FOOD & DRINK</p>
                        <div class="row mx-3">
                            <div class="col-md-6 col-12">
                                <div class="row">
                                    <?php foreach ($excel_food_data as $index => $data) : ?>
                                        <?php if (isset($data[0]) && $index != 0) : ?>
                                            <p class="col-12 pt-4">・<?php echo $data[0] ?></p>
                                        <?php elseif (isset($data[1]) && $index != 0) : ?>
                                            <p class="col-md-7 col-9 text-left pl-5 pt-3"><?php echo $data[1] ?></p>
                                            <p class="col-md-5 col-3 pt-3"><?php echo $data[2] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 pt-5 pt-md-0 mt-5 mt-md-0">
                                <div class="row">
                                    <?php foreach ($excel_drink_data as $index => $data) : ?>
                                        <?php if (isset($data[0]) && $index != 0) : ?>
                                            <p class="col-12 pt-4">・<?php echo $data[0] ?></p>
                                        <?php elseif (isset($data[1]) && $index != 0) : ?>
                                            <p class="col-md-7 col-9 text-left pl-5 pt-2"><?php echo $data[1] ?></p>
                                            <p class="col-md-5 col-3 pt-2"><?php echo $data[2] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="access pb-5 text-white">
                    <div class="mx-3">
                        <p class="h1 text-center pb-5 mt-0 cursive">ACCESS</p>
                        <div class="row mx-3">
                            <div class="col-md-6 col-12 text-center">
                                <img class="shop-img-pc img-fluid d-none d-md-inline-block" src="<?php echo $signboard; ?>" alt="">
                                <img class="shop-img-phone img-fluid d-inline-block d-md-none" src="<?php echo $signboard; ?>" alt="">
                            </div>
                            <div class="col-md-6 col-12 text-center d-flex align-items-center">
                                <div class="text-white pt-md-0 pt-5 flex-fill">
                                    <div class="row mb-5">
                                        <div class="col-3">
                                            <p>住所</p>
                                        </div>
                                        <div class="col-9">
                                            <p class="pl-2">〒902-0067 沖縄県那覇市字安里３８２</p>
                                            <p class="pl-2">Mr.KINJO in SAKAEMACHI 1F</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <p>ADDRESS</p>
                                        </div>
                                        <div class="col-9">
                                            <p class="pl-2">382,Asato,Naha-si,Okinawa 902-0067</p>
                                            <p class="pl-2">Mr.KINJO in SAKAEMACHI 1F</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <!-- <iframe class="gmap" src="https://maps.google.co.jp/maps?output=embed&q=茶屋.小料理たにもと&hl=ja&z=19"></iframe> -->
                            <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.3527218970526!2d127.69500385038405!3d26.217726383350527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5695ae05627c5%3A0x27e4607a2aa8131e!2z6Iy25bGLLuWwj-aWmeeQhuOBn-OBq-OCguOBqA!5e0!3m2!1sja!2sjp!4v1618901117790!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> </div>
                        <a href="https://goo.gl/maps/YbhdccXh9Ckg1r686">
                            <p class="float-right text-white mr-3">GoogleMapで表示<i class="fas fa-external-link-alt mx-2"></i></p>
                        </a>
                    </div>
            </main>
        </div>
        <footer>
            <div class="footer">
                <div class="">
                    <p class="text-center">
                        <span class="h2 mr-md-5">茶屋　小料理たにもと</span>
                        <br class="d-md-none d-inline">
                        <br class="d-md-none d-inline">
                        <br class="d-md-none d-inline">
                        <span class="h6">
                            <a href="https://www.instagram.com/chaya.koryori_tanimoto/?hl=ja" target="_blank" class="fab text-white fa-instagram mx-3 text-decoration-none"></a>
                            <a href="https://www.facebook.com/profile.php?id=100004435058068" target="_blank" class="fab text-white fa-facebook-square mx-3"></a>
                        </span>
                    </p>
                </div>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/js/style.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    </div>
</body>

</html>