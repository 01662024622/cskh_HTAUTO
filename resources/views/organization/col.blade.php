<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{asset('/css/vendor/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
        *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            min-width: 1200px;
            margin: 0;
            padding: 50px;
            color: #eee9dc;
            font: 16px Verdana, sans-serif;
            background: #2e6ba7;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #wrapper {
            position: relative;

        }

        .branch {
            position: relative;
            margin-left: 450px;
        }

        .branch:before {
            content: "";
            width: 65px;
            border-top: 2px solid #eee9dc;
            position: absolute;
            left: -115px;
            top: 50%;
            margin-top: 1px;
        }

        .entry {
            position: relative;
            min-height: 160px;
        }

        .entry:before {
            content: "";
            height: 100%;
            border-left: 2px solid #eee9dc;
            position: absolute;
            left: -50px;
        }

        .entry:after {
            content: "";
            width: 50px;
            border-top: 2px solid #eee9dc;
            position: absolute;
            left: -50px;
            top: 50%;
            margin-top: 1px;
        }

        .entry:first-child:before {
            width: 10px;
            height: 50%;
            top: 50%;
            margin-top: 2px;
            border-radius: 10px 0 0 0;
        }

        .entry:first-child:after {
            height: 10px;
            border-radius: 10px 0 0 0;
        }

        .entry:last-child:before {
            width: 10px;
            height: 50%;
            border-radius: 0 0 0 10px;
        }

        .entry:last-child:after {
            height: 10px;
            border-top: none;
            border-bottom: 2px solid #eee9dc;
            border-radius: 0 0 0 10px;
            margin-top: -9px;
        }

        .entry.sole:before {
            display: none;
        }

        .entry.sole:after {
            width: 50px;
            height: 0;
            margin-top: 1px;
            border-radius: 0;
        }

        .label {
            display: block;
            width: 350px;
            padding: 5px 10px;
            line-height: 20px;
            text-align: center;
            border: 2px solid #eee9dc;
            border-radius: 5px;
            position: absolute;
            left: 0;
            top: calc(50% - 55px);
            margin-top: -15px;
        }

        .label-entry {
            display: block;
            width: 350px;
            padding: 5px 10px;
            line-height: 16px;
            text-align: center;
            border: 2px solid #eee9dc;
            border-radius: 5px;
            position: absolute;
            left: 14px;
            top: calc(50% - 55px);
            margin-top: -15px;
        }

        p {
            margin-bottom: 0.5rem
        }

        .lv2 {
            margin-left: 462px;
        }

        a {
            color: white;
        }
        .entry-special:after{
            top: calc(50% - 105px);
        }
        .entry-special{
            margin-bottom: -100px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">S?? ????? t??? ch???c ph??ng ban c???a HTAUTO</h1>
<div id="wrapper">
    <div class="label row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Ban t???ng gi??m ?????c</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">

                <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Di???u Th??y </p>
                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Chloe Th??y Ho??ng</i></p>

                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nh???c tr?????ng k???t n???i s??ng
                        t???o</i></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> thuy.hoang@htauto.com.vn</p>
                <p><i class="fa fa-credit-card" aria-hidden="true"></i> T???ng gi??m ?????c</p>
            </div>
        </div>
    </div>
    <div class="branch lv1">
        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Ban ph??t tri???n</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Di???u Th??y </p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Chloe Th??y Ho??ng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nh???c tr?????ng k???t n???i
                                s??ng
                                t???o</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> thuy.hoang@htauto.com.vn</p>
                        <p><i class="fa fa-credit-card" aria-hidden="true"></i> Tr?????ng ban ph??t tri???n</p>
                    </div>
                </div>
            </div>

            <div class="branch lv2">
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng R&D</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Thanh T??m</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Julia T??m Ho??ng</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia nghi??n c???u v?? am hi???u s???n ph???m</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> tam.hoang@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP R&D</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng ph??t tri???n c??ng ngh???</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> ????o Ng???c ??nh</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Steve ??nh ????o</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nh?? khai s??ng c??ng ngh???</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> technology@aspgroup.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP ph??t tri???n c??ng ngh???</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng d??? ??n chi???n l?????c</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ph???m Vi???t Anh</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Miguel Vi???t Anh Ph???m</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nghi??n c???u gia</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> mar.research@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> PT d??? ??n chi???n l?????c</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Ban chi???n l?????c</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Di???u Th??y </p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Chloe Th??y Ho??ng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nh???c tr?????ng k???t n???i
                                s??ng t???o</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> thuy.hoang@htauto.com.vn</p>
                        <p><i class="fa fa-credit-card" aria-hidden="true"></i> Tr?????ng ban chi???n l?????c</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="entry entry-special">
            <div class="label-entry row" style="padding-right: 0; top: calc(50% - 155px)">
                <div class="col-12"><a href="/user-t1">Ban Kinh doanh</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Di???u Th??y </p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Chloe Th??y Ho??ng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Nh???c tr?????ng k???t n???i
                                s??ng t???o</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> thuy.hoang@htauto.com.vn</p>
                        <p><i class="fa fa-credit-card" aria-hidden="true"></i> Tr?????ng ban kinh doanh</p>
                    </div>
                </div>
            </div>

            <div class="branch lv2" style="top:-100px">
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng kinh doanh ASP</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ph???m ?????c Th???ng</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Eric Th???ng Ph???m</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Ng?????i l??nh ?????o ph??t tri???n ASP</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> thang.pham@aspgroup.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> Gi??m ?????c kinh doanh ASP</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng t?? v???n d???u</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Nguy???n Tr?????ng Tuy??n</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Felix Tuy??n Nguy???n</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia th??? tr?????ng d???u,ph??? gia,n?????c m??t</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> lube.hn@aspgroup.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP t?? v???n d???u</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng t?? v???n ph??? t??ng</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="user-nullable.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> ?</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">?</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>?</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> ?</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> ?</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng marketing</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Nguy???n H???i ????ng</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Brembo ????ng Nguy???n</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia ?????nh h?????ng & ph??t tri???n Marketing</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> marketing@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> Ph?? ph??ng Marketing</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng CS tr???i nghi???m KH</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> ?????ng Th??? V??n Anh</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Sandy V??n Anh ?????ng</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia am hi???u kh??ch h??ng v?? d???ch v???</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> cskh@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> Qu???n l?? cs tr???i nghi???m kh??ch h??ng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng ph??t tri???n th??? tr?????ng</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="user-nullable.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i>?</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">?</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>?</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> ?</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP Ph??t Tri???n TT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Ban v???n h??nh</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Tr???nh V??n T??</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Kindly T?? Tr???nh</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia v??? v???n
                                h??nh doanh nghi???p</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> to.trinh@htauto.com.vn</p>
                        <p><i class="fa fa-credit-card" aria-hidden="true"></i> Ph?? ban v???n h??nh</p>
                    </div>
                </div>
            </div>

            <div class="branch lv2">
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng quy tr??nh</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ph???m Th??y H???p</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Azura H???p Ph???m</i></p>

                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia
                                        x??y d???ng v?? ki???m so??t ho???t ?????ng</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> process@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP quy tr??nh</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng ki???m so??t</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> L?? Th??? H??</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Alma H?? L??</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia
                                        x??y d???ng v?? ki???m so??t ho???t ?????ng</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> process2@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP ki???m so??t</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng kho</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> L?? Minh Th???o</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Junie Th???o L??</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia v??? kho h??ng</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> kho.hn@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP Kho H??ng</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng d???ch v??? giao nh???n</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Tr???nh V??n T??</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Kindly T?? Tr???nh</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia
                                        v???n chuy???n</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> to.trinh@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP d???ch v??? giao nh???n
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng h??nh ch??nh nh??n s???</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> ?????c Th??? Nhung</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Ariana Nhung ?????c</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia v??? t??? ch???c v?? th???u hi???u con ng?????i</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> hr2@htuato.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP HCNS</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng truy???n th??ng n???i b???</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="user-nullable.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> ?</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">?</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>?</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> ?</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> ?</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Ban T??i ch??nh</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Th??? H?????ng</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px"> Maris H?????ng Ho??ng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Ng?????i l??nh ?????o n???i ch??nh</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> huong.hoang@htauto.com.vn</p>
                        <p><i class="fa fa-credit-card" aria-hidden="true"></i> Tr?????ng ban t??i ch??nh</p>
                    </div>
                </div>
            </div>
{{--         brand t??i ch??nh--}}
            <div class="branch lv2">
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng k??? to??n</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Th??? H?????ng</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Maris H?????ng Ho??ng</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Ng?????i l??nh ?????o n???i ch??nh</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> huong.hoang@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> K??? to??n tr?????ng</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng nh???p mua</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Th??? H???o</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Merry H???o Ho??ng</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia nh???p kh???u</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> hao.hoang@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP nh???p mua</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng ?????i ngo???i</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Ho??ng Th??? H???o</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Merry H???o Ho??ng</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuy??n gia ?????i ngo???i</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> hao.hoang@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP ?????i ngo???i</p>
                            </div>
                        </div>
                    </div>
                </div><div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1">Ph??ng t??i ch??nh</a></div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                                 style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Tr???n Tu???n Anh</p>
                                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Jason Tu???n Anh Tr???n</i></p>
                                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Ng?????i ??i???u h??nh t??i ch??nh</i></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> taichinh@htauto.com.vn</p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i> TP t??i ch??nh</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
