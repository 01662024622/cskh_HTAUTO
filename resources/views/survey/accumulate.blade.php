<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HTAuto</title>
    <link rel="shortcut icon" href="/crop-logo.png">
    <!-- Custom fonts for this template-->
    <link href="{{asset('/css/vendor/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('/public/css/css.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('/css/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main/errors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/message/index.css')}}">
    <link rel="stylesheet" href="/public/css/okrs/key.css">
    <link rel="stylesheet" href="/public/css/okrs/index.css">
</head>
<body id="page-top" class="sidebar-toggled">

<div class="content-customer page-list">
    <div class="content-header header-height">
        <h1 class="ng-binding">KH thân thiết</h1>
        <div class="breadcrumb">
            <div style="width: 830px;" class="btn-group search-date divFilterDate">
                <div class="input-group row" id="reportrange">
                    <div class="col-2" style="padding-right:0px"><b>Tổng</b> <span
                            class="total-number">{{$Total}}</span></div>
                    <div class="col-2" style="padding-right:0px"><b>Platinum</b> <span
                            class="platinum-number">{{$Platinum}}</span></div>
                    <div class="col-2" style="padding-right:0px"><b>Gold</b> <span class="gold-number">{{$Gold}}</span>
                    </div>
                    <div class="col-2" style="padding-right:0px"><b>Titan</b> <span
                            class="titan-number">{{$Titan}}</span></div>
                    <div class="col-2" style="padding-right:0px"><b>Silver</b> <span
                            class="silver-number">{{$Silver}}</span></div>
                    <div class="col-2" style="padding-right:0px"><b>Memeber</b> <span class="ht-number">{{$Member}}</span></div>
                </div>
            </div>

            <!-- ngIf: activeTab == '' -->
            <div class="btn-group ng-scope" ng-if="activeTab == ''">
                <a class="nav-link" href="/HT50/total/list">
                    Kết xuất
                </a>
{{--                <div class="dropdown">--}}
{{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">--}}
{{--                        Quản lý--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <a class="dropdown-item" href="#">Quản lý KH mới</a>--}}
{{--                        <a class="dropdown-item" href="#">Tiếp nhận KH</a>--}}
{{--                        <a class="dropdown-item" href="#">Link 3</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<br>
<br>
<table class="table table-bordered" id="users-table">
    <thead>
    <tr>
        <th>STT</th>
        <th>Mã KH</th>
        <th>Tên KH</th>
        <th>CS PT</th>
        <th>SĐT</th>
        <th>Tổng điểm</th>
        <th>Đã dùng</th>
        <th>Khả dụng</th>
        <th>Hạng</th>
        <th>Tiến độ</th>
        <th>Hành Động</th>
    </tr>
    </thead>
</table>

<!-- The Modal manager Target-->
<div class="modal" id="manageGift">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết đổi thưởng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <div>
                        <form class="form-inline" action="/HT50/accumulate" method="POST" id="gift-form">
                            <div class="input-group mb-3 input-group-sm">
                            <label for="text">Code:</label>&nbsp;
                            <input type="text" class="form-control" name="code" placeholder="Nhập code" id="code">	&nbsp;	&nbsp;
                            <label for="pwd">Quà tặng:</label>&nbsp;
                                <select class="form-control" id="gift_id" name="gift">
                                </select>	&nbsp;	&nbsp;
                                <input type="hidden" id="customer_code" name="customer_code">
                            <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                            </div>
                        </form>
                    </div>
                <table class="table table-bordered" id="gift-table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Tên quà</th>
                        <th>Điểm</th>
                        <th>Ngày đổi</th>
                    </tr>
                    </thead>
                    <tbody id="gift-body">

                    </tbody>
                </table>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<!-- Set rusult months -->
<div class="modal" id="analytics">
    <div class="modal-dialog" id="modal-set-width" style="max-width: 1200px;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tổng hợp</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<input type="text" class="hidden" id="copy-link-hidden">
<div id="load_page">
    <div class="loader"></div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('/js/vendor/popper.min.js')}}"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{asset('/js/vendor/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/vendor/toastr.min.js')}}"></script>
<script src="{{asset('js/vendor/sweetalert.js')}}"></script>
<script src="{{asset('js/message/index.js')}}"></script>
<script>
    var role = "";
    var page = $('#load_page');
</script>
<script src="{{ asset('/js/survey/accumulate.js') }}"></script>
</body>
</html>
