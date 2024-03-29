@extends('layouts.nav')
@section('title')
    Suntory
@endsection

@section('css')

@endsection


@section('content')
<main>
    <section>
        <div class="main">
            <div class="video">
                <video class="w-100" autoplay="" muted="" loop="" id="" class="">
                    <source src="./img/宣傳片.mp4" type="video/mp4">
                </video>

                <!-- 酒標題 -->

                <div class="wine-title wine-title-style">
                    <div>
                        日
                    </div>
                    <div>
                        本
                    </div>
                    <div>
                        頂
                    </div>
                    <div>
                        級
                    </div>
                    <div>
                        威
                    </div>
                    <div>
                        士
                    </div>
                    <div>
                        忌
                    </div>
                </div>


                <!-- 三種酒 -->
                <div class="wine d-flex align-items-end">

                    <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="200"
                        data-aos-duration="1000">
                        <div class="wine1 flex align-items-end w-wine-style hvr-buzz">
                            <a href="">
                                <img src="./img/白州.png" alt="白州">
                            </a>

                        </div>

                    </div>


                    <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="200"
                        data-aos-duration="1500">
                        <div class=" wine2 d-flex align-items-end w-wine-style hvr-buzz">
                            <a href="">
                                <img src="./img/響.png" alt="響">

                            </a>
                        </div>
                    </div>

                    <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="200"
                        data-aos-duration="2000">
                        <div class="wine3 d-flex align-items-end w-wine-style hvr-buzz">
                            <a href="">
                                <img src="./img/麥芽威士忌.png" alt=" ">
                            </a>

                        </div>
                    </div>

                </div>



            </div>
        </div>
        </div>
    </section>
    <!-- 白州過場 -->
    <section>
        <div class="wine-detail-bg display-rwd">
            <!-- <img src="./img/bg白州.jpg" alt=""> -->
        </div>
    </section>
    <!-- 白州 -->
    <section>

        <div data-aos="fade-up" data-aos-duration="1500">
            <div class="wine-detail display-rwd">
                <div class="container">
                    <div class="wine-detail-title title-space d-flex justify-content-center">
                        <h1>白州單一麥芽威士忌</h1>
                    </div>

                    <div class="row text-center">
                        <div class="col-sm d-flex align-items-center justify-content-center">

                            <div class="wine1 flex align-items-end  hvr-buzz">
                                <img src="./img/白州.png" alt="白州">


                            </div>


                        </div>
                        <div class="col-sm d-flex align-items-center">
                            <div class="wine-detail-inner text-left
                         p-space">
                                <P>
                                    我們以淡淡的煙熏味（如森林的嫩葉）和各種白酒（帶有“白書”的複雜性和深度）為“淺色重複麥芽”點燃。<br />
                                    它具有清新的香氣和個性交疊所帶來的清新，清淡和鮮明的味道。</P>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- 響過場 -->
    <section>
        <div class="wine2-detail-bg display-rwd">
            <!-- <img src="./img/bg白州.jpg" alt=""> -->
        </div>
    </section>
    <!-- 響 -->
    <section>
        <div data-aos="fade-up" data-aos-duration="1500">

            <div class="wine2-detail display-rwd">
                <div class="container">
                    <div class="wine-detail-title title-space d-flex justify-content-center">
                        <h1>威士忌Hibiki</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm d-flex align-items-center justify-content-center">


                            <div class="wine1 flex align-items-end  hvr-buzz">
                                <img src="./img/響.png" alt="響">


                            </div>


                        </div>
                        <div class="col-sm d-flex align-items-center">
                            <div class="wine-detail-inner text-left p-space
                        ">
                                <P>
                                    結合了日本四個季節，日本人細膩的感性和日本工匠的技能的威士忌”。
                                    <br />
                                    這是一道特殊的菜餚，它使用了我們威士忌製造史上培養的各種生酒和手工藝，無論年齡大小。 <br />
                                    它具有華麗的香氣和深沉而柔和的味道。
                                    繼24瓶切面瓶的設計（代表日比奇品牌24精神）之後，“ Hibiki”一詞被應用到生成的Echizen
                                    Washi標籤上，並帶有墨水字母，以表達日本威士忌的精緻世界觀。
                                </P>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- 山崎過場 -->
    <section>
        <div class="wine3-detail-bg display-rwd">
            <!-- <img src="./img/bg白州.jpg" alt=""> -->
        </div>
    </section>
    <!-- 山崎 -->
    <section>

        <div data-aos="fade-up" data-aos-duration="1500">
            <div class="wine3-detail display-rwd">
                <div class="container">
                   <div class="wine-detail-title title-space d-flex justify-content-center">
                                <h1>山崎單一麥芽威士忌</h1>
                            </div>
                    <div class="row text-center">
                        <div class="col-sm d-flex align-items-center justify-content-center">


                            <div class="wine1 flex align-items-end  hvr-buzz">
                                <img src="./img/麥芽威士忌.png" alt="響">


                            </div>
                        </div>
                        <div class="col-sm d-flex align-items-center">
                            <div class="wine-detail-inner text-left p-space
                        ">
                                <P>
                                    我們將使用我們各種各樣的原酒中的“酒桶儲存麥芽”，並將其與多種原酒一起使用，例如在談論“山崎”時必不可少的“水原木桶儲存麥芽”。是的
                                    它具有柔和而華麗的香氣，以及個性的重疊所產生的甜美而柔滑的味道。</P>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</main>

@endsection


@section('js')

@endsection
