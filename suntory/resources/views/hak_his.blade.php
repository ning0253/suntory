<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>白州</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|PT+Sans|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hak_his/hover.css') }}">

    <link rel="stylesheet" href="{{ asset('css/hak_his/白州2.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/hak_his/test.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">


</head>
<style>
    a.cart {
        width: 72px;
        height: 72px;
        border-radius: 36px;
        text-align: center;
        color: #616161;
        text-decoration: none;
        position: fixed;
        right: 0;
        top: 40%;
        z-index: 9;
        display: block;
        background: #535558 url(http://images.vfl.ru/ii/1484930184/14435803/15757225.png
) center no-repeat;
        background-size: 36px;
        box-shadow: 0 3px 6px rgba(97, 97, 97 0.16), 0 3px 6px rgba(97, 97, 97 0.23);
    }

    a.cart>span {
        width: 24px;
        height: 24px;
        font-size: 16px;
        color: #fff;
        line-height: 24px;
        position: absolute;
        border-radius: 12px;
        display: block;
        transform: scale(0);
        margin: auto;
        background: #ffab00;
        box-shadow: 0 3px 6px rgba(255, 171, 0, 0.16);
    }

    a.cart>span.counter {
        left: 48px;
        bottom: 48px;
        transition: .2s linear;
        transform: scale(1);
    }

    .navbar-collapse a {
        font-family: "Noto Sans TC";
    }

    .nav-link {
        padding: 0rem;
        margin: 0 0.5rem;
    }



    @media (max-width:575px) {
        .nav-link {
            padding: 0rem;
        }

        #nav {
            padding: 0 30px;
        }

        .navbar-brand {
            margin: 0
        }
    }


    .navbar-expand-md .navbar-nav .nav-link {
        padding: 5px 0;
    }
</style>


<body>
    <a href="#" class="cart"><span></span></a>
    <div class="row " style="display: block; margin: 0;">
        <div class="row sticky-top" style="margin: 0;">
            <div class="container">
                <nav id="nav" class=" navbar navbar-expand-md navbar-light " style="padding: 0;">
                    <a class="navbar-brand" href="#">
                        <img src="./img/0000.png" alt="" style="height: 68px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                <a class="nav-link hvr-underline-from-center text-body" href=#story_tag>白州的故事</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                <a class="nav-link hvr-underline-from-center text-body" href="#manner_tag">白州的態度</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                <a class="nav-link hvr-underline-from-center text-body" href="#distillery_tag">白州蒸餾所</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                <a class="nav-link hvr-underline-from-center text-body" href="#Award_tag">國際肯定</a>
                            </li>
                            <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 ">
                                <a class="nav-link hvr-underline-from-center text-body" href="#product_tag">白州系列</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div id="carouselExampleFade" class="bannerbox carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/新白州圖.jpg" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/18白州.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/25白州.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="hakushu_title">
            <h1>白州 單一麥芽威士忌</h1>
        </div>

        <div class="hakushu_text">
            <p>來自三得利位於山深處的山區森林釀酒廠。
                <br>三得利單一麥芽威士忌是一種清新，
                <br>煙熏的威士忌，具有草本風味，
                <br>是日本單一麥芽威士忌的啟示。</p>
        </div>
        @foreach ($store as $item)
            <div class="story_box ">
                <div class=" d-flex align-items-center story_text">
                    <div class="story_title">
                        <h1>白州的故事 <span id="story_tag"></span></h1>
                    {!! $item->content!!}
                    </div>
                </div>
                <div class="img1  " data-aos="fade-left" data-aos-once="true" data-aos-offset="300" data-aos-duration="700"
            data-aos-easing="ease-in-sine" style="background-image: url('{{$item->img}}')">
                </div>
            </div>
        @endforeach


        <div class="story_box ">
            <div class=" d-flex align-items-center story_text">
                <div class="story_title">
                    <h1>白州的故事 <span id="story_tag"></span></h1>
                    <p>三得利公司創始人鳥井伸二郎的兒子，<br>
                        第二代調酒師佐治敬三（Keizo Saji）<br>
                        決定建造第二家釀酒廠，<br>
                        以尋找一種與山崎釀酒廠不同個性的威士忌。<br>

                        在尋找建築工地時，我特別想說的是，<br>
                        我們擁有最好的威士忌製備用水。<br>
                        擁有豐富的自然資源，可以長期養育水。<br>

                        在全國范圍內尋找理想的水和地方的旅程結束了嗎？<br>
                        幾年後的深秋下午，白州的土地到了。<br>
                        吃完南阿爾卑斯山花崗岩拋光的淨水後，<br>
                        她顫抖著說：“日本還有這種水嗎？”<br>

                        自1973年我們在日本首次開始生產威士忌以來，<br>
                        僅過去了50年。 </p>
                </div>
            </div>
            <div class="img1  " data-aos="fade-left" data-aos-once="true" data-aos-offset="300" data-aos-duration="700"
                data-aos-easing="ease-in-sine">
            </div>
        </div>


        <div class="manner_box ">

            <div class="img2" data-aos="fade-right" data-aos-once="true" data-aos-offset="300" data-aos-duration="1000"
                data-aos-easing="ease-in-sine"></div>
            <div class=" d-flex align-items-center story_text">
                <div class="story_title">
                    <h1>白州的態度 <span id="manner_tag"></span></h1>
                    <p>一切都來自白州著名的水<br>
                        威士忌製作的第一步。與細麥芽一起倒入的<br>
                        水非常重要，因此被稱為母水。緩慢發酵，<br>
                        蒸餾和儲存的水是決定威士忌品質的主要因素之一。<br>
                        森林釀酒廠使用在南阿爾卑斯山的<br>
                        山脈中拋光的地下天然水。<br>
                        它是一種軟水，具有良好的礦物質平衡。 </p>
                </div>
            </div>
        </div>


        <div class="distillery_box">
            <div class=" d-flex align-items-center story_text">
                <div class="story_title">
                    <h1>森の蒸溜所 <span id="distillery_tag"></span></h1>
                    <p>世界上罕見的森林釀酒廠<br>
                        南阿爾卑斯山的山麓小丘。<br>
                        被海拔約700米的清澈大氣所包圍，<br>
                        約有820,000平方米的廣闊森林。<br>
                        白州釀酒廠在適應季節自然和各種生物的同時，<br>
                        還從各種自然中受益，生產威士忌。<br>
                        清澈的水和自然空氣。缺少任何一種，<br>
                        白書的氣味和味道都不會誕生。 </p>
                </div>
            </div>
            <div class="img3" data-aos="fade-left" data-aos-once="true" data-aos-offset="300" data-aos-duration="1000"
                data-aos-easing="ease-in-sine">></div>
        </div>

        <div class="container">
            <div class="Award">
                <div class="Award_title">
                    <h1>國際肯定<span id="Award_tag"></span></h1>
                </div>


            </div>
        </div>
        <section class="container">

            <div class="row active-with-click d-flex justify-content-center">
                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <article class="material-card Light-Green">
                        <h2>
                            白州 12年
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive card_img_style" src="./img/img_04.jpg">
                                <div class="mask"></div>
                                <img class="liquor" src="./img/01.白州1.png" alt="">
                                <img class="Medals" src="./img/awards_swsc_2015.png" alt="">

                            </div>
                            <div class="mc-description">
                                2015 白州 18年 「Double GOLD」最優秀金牌獎<br>
                                2016 白州 18年 「GOLD」金牌獎<br>
                                2010 白州18年「Trophy」獎<br>
                                2009 白州18年「GOLD」金牌獎

                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>

                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <article class="material-card Green">
                        <h2>
                            白州 18年
                        </h2>
                        <div class="mc-content">

                            <div class="img-container">
                                <img class="img-responsive card_img_style" src="./img/河.1.jpeg">
                                <div class="mask"></div>
                                <img class="liquor" src="./img/01.白州18_1.png" alt="">
                                <img class="Medals" src="./img/awards_swsc_2015.png" alt="">

                            </div>

                            <div class="mc-description">
                                2015 白州 18年 「Double GOLD」最優秀金牌獎<br>
                                2016 白州 18年 「GOLD」金牌獎<br>
                                2010 白州18年「Trophy」獎<br>
                                2009 白州18年「GOLD」金牌獎

                            </div>

                        </div>


                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>

                <div class="col-xl-4 col-md-6 col-sm-12 ">
                    <article class="material-card Light-Green">
                        <h2>
                            白州 25年
                        </h2>
                        <div class="mc-content">
                            <div class="img-container ">
                                <img class="img-responsive card_img_style" src="./img/img_05.1.png">

                                <div class="mask"></div>
                                <img class="liquor" src="./img/01.白州25_1.png" alt="">
                                <img class="Medals" src="./img/awards_swsc_2015.png" alt="">
                            </div>
                            <div class="mc-description">
                                2016 白州 25年 「GOLD」金牌獎<br>
                                2016 白州 25年 「最佳日本單一麥芽威士忌」<br>
                                2012 白州25年「Trophy」首獎<br>
                                2011 白州25年「GOLD」金牌獎<br>
                                2010 白州25年「GOLD」金牌獎<br>


                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>


            </div>
        </section>

        <div class="change_view">
            <div class="change_img"></div>
        </div>

        <div class="product_title">
            <h1>白州系列<span id="product_tag"></span></h1>
            <p>製品ラインナップ</p>
            <p>一瓶由稀有森林釀酒廠生產的麥芽威士忌白酒，<br>坐落在茂密的森林中。
                大自然的力量和熟練的技術創造的風味<br>受到世界各地人們的高度評價。</p>
        </div>
        <div class="backg">

            <div class="container backdrop">
                <div class="row d-flex justify-content-around  padbtm-100 flex-wrap">
                    @foreach ($product as $item)
                    <div class="prod col-4 row">
                        <a href="#prod1_tag" class=" col-xl-6 col-sm-12 d-flex justify-content-center">
                            <img src="{{$item->img}}" alt="" class="img-fluid">
                        </a>
                        <a href="#prod1_tag" class="prod_name col-xl-6 col-sm-12 align-self-center text-body"
                            style="text-decoration:none;">
                            <h2>白州<br>12<br>YEAR</h2>
                        </a>
                    </div>
                    @endforeach
                    <div class="prod col-4 row">
                        <a href="#prod1_tag" class=" col-xl-6 col-sm-12 d-flex justify-content-center">
                            <img src="./img/01.小白州1.png" alt="" class="prod_img">
                        </a>
                        <a href="#prod1_tag" class="prod_name col-xl-6 col-sm-12 align-self-center text-body"
                            style="text-decoration:none;">
                            <h2>白州<br>12<br>YEAR</h2>
                        </a>


                    </div>
                    <div class="prod col-4 row">
                        <a href="#prod2_tag" class=" col-xl-6 col-sm-12 d-flex justify-content-center">
                            <img src="./img/01.小白州18.png" alt="" class="prod_img">
                        </a>
                        <a href="#prod2_tag" class="prod_name col-xl-6 col-sm-12 align-self-center text-body"
                            style="text-decoration:none;">
                            <h2>白州<br>18<br>YEAR</h2>
                        </a>


                    </div>


                    <div class="prod col-4 row">
                        <a href="#prod3_tag" class=" col-xl-6 col-sm-12 d-flex justify-content-center">
                            <img src="./img/01.小白州25.png" alt="" class="prod_img">
                        </a>
                        <a href="#prod3_tag" class="prod_name col-xl-6 col-sm-12 align-self-center text-body"
                            style="text-decoration:none;">
                            <h2>白州<br>25<br>YEAR</h2>
                        </a>

                    </div>
                </div>
                <div class="row d-flex align-items-center padbtm-100 " data-aos="fade-up" data-aos-once="true"
                    data-aos-offset="300" data-aos-duration="900">
                    @foreach ($product as $item)

                    @endforeach
                    <div class="prod1 col-xl-7 col-lg-6 col-md-5 col-sm-12 d-flex justify-content-center">
                    <img src="{{$item->img}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 ">
                        <div class="prod1_title  row">
                            <h1>白州&thinsp;|&thinsp;<span id="prod1_tag"></span></h1>
                            <h5>THE<br>HAKUSHU</h5>
                        </div>
                        <div class="prod1_min_title">
                            <h5>新鮮的氣味，像森林中的幼葉淡淡的味道。</h5>
                        </div>
                        <div class="prod1_text">
                                {!!$item->content!!}
                            <p>{{$item->color}}</p>
                            <p>{{$item->aroma}}</p>
                            <p>{{$item->body}}</p>
                            <p>{{$item->aftertaste}}</p>
                            <a href="#" class="add-to-cart">立即購買</a>
                        </div>

                    </div>
                </div>
                <div class="row d-flex align-items-center padbtm-100 " data-aos="fade-up" data-aos-once="true"
                    data-aos-offset="300" data-aos-duration="900">
                    <div class="prod1 col-xl-7 col-lg-6 col-md-5 col-sm-12 d-flex justify-content-center">
                        <img src="./img/01.白州1.png" alt="" class="prod1_img">
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 ">
                        <div class="prod1_title  row">
                            <h1>白州&thinsp;|&thinsp;<span id="prod1_tag"></span></h1>
                            <h5>THE<br>HAKUSHU</h5>
                        </div>
                        <div class="prod1_min_title">
                            <h5>新鮮的氣味，像森林中的幼葉淡淡的味道。</h5>
                        </div>
                        <div class="prod1_text">
                            <p>具有清爽的酸桔，薄荷的香氣。<br>
                                略帶酸味輕快且爽口的口感。淡淡的泥煤味，<br>
                                隱約的甜味讓人感到順暢的完美餘韻。</p>
                            <p>色&thinsp;|&thinsp;清透的琥珀色。</p>
                            <p>香&thinsp;|&thinsp;嫩葉般的清爽、輕快的煙燻氣味。</p>
                            <p>味&thinsp;|&thinsp;栗子般的果香。</p>
                            <p>餘&thinsp;|&thinsp;綿長淡雅的煙燻味。</p>
                            <a href="#" class="add-to-cart">立即購買</a>
                        </div>

                    </div>
                </div>

                <div id="prod2" class="row d-flex align-items-center  padbtm-100" data-aos="fade-up"
                    data-aos-once="true" data-aos-offset="300" data-aos-duration="900">
                    <div class="prod1 col-xl-7 col-lg-6 col-md-5 col-sm-12 d-flex justify-content-center">
                        <img src="./img/01.白州18.png" alt="" class="prod1_img">
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 ">
                        <div class="prod1_title  row">
                            <h1>白州18年&thinsp;|&thinsp;<span id="prod2_tag"></span></h1>
                            <h5>HAKUSHU<br>18YEARS OLD</h5>
                        </div>
                        <div class="prod1_min_title">
                            <h5>新鮮的氣味，像森林中的幼葉淡淡的味道。</h5>
                        </div>
                        <div class="prod1_text">
                            <p>具有清爽的酸桔，薄荷的香氣。<br>
                                略帶酸味輕快且爽口的口感。淡淡的泥煤味，<br>
                                隱約的甜味讓人感到順暢的完美餘韻。</p>
                            <p>色&thinsp;|&thinsp;清透的琥珀色。</p>
                            <p>香&thinsp;|&thinsp;嫩葉般的清爽、輕快的煙燻氣味。</p>
                            <p>味&thinsp;|&thinsp;栗子般的果香。</p>
                            <p>餘&thinsp;|&thinsp;綿長淡雅的煙燻味。</p>
                            <a href="#" class="add-to-cart">立即購買</a>

                        </div>

                    </div>
                </div>

                <div id="prod3" class="row d-flex align-items-center  padbtm-100" data-aos="fade-up"
                    data-aos-once="true" data-aos-offset="300" data-aos-duration="900">
                    <div class="prod1 col-xl-7 col-lg-6 col-md-5 col-sm-12 d-flex justify-content-center">
                        <img src="./img/01.白州25.png" alt="" class="prod1_img">
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-7 col-sm-12 ">
                        <div class="prod1_title  row">
                            <h1>白州25年&thinsp;|&thinsp;<span id="prod3_tag"></span></h1>
                            <h5>HAKUSHU<br>25YEARS OLD</h5>
                        </div>
                        <div class="prod1_min_title">
                            <h5>新鮮的氣味，像森林中的幼葉淡淡的味道。</h5>
                        </div>
                        <div class="prod1_text">
                            <p>具有清爽的酸桔，薄荷的香氣。<br>
                                略帶酸味輕快且爽口的口感。淡淡的泥煤味，<br>
                                隱約的甜味讓人感到順暢的完美餘韻。</p>
                            <p>色&thinsp;|&thinsp;清透的琥珀色。</p>
                            <p>香&thinsp;|&thinsp;嫩葉般的清爽、輕快的煙燻氣味。</p>
                            <p>味&thinsp;|&thinsp;栗子般的果香。</p>
                            <p>餘&thinsp;|&thinsp;綿長淡雅的煙燻味。</p>
                            <a href="#" class="add-to-cart">立即購買</a>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</body>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    $(function () {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function () {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function () {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });


</script>

<script>
    $(document).ready(function () {
        var count = 0;
        $("a.add-to-cart").click(function (event) {
            count++;
            $("a.add-to-cart").addClass("size");
            setTimeout(function () {
                $("a.add-to-cart").addClass("hover");
            }, 200);
            setTimeout(function () {
                $("a.cart > span").addClass("counter");
                $("a.cart > span.counter").text(count);
            }, 400);
            setTimeout(function () {
                $("a.add-to-cart").removeClass("hover");
                $("a.add-to-cart").removeClass("size");
            }, 600);
            event.preventDefault();
        });
    });

</script>

</html>
