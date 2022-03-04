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
                    <div class="col-2" style="padding-right:0px"><b>Memeber</b> <span
                            class="ht-number">{{$Member}}</span></div>
                </div>
            </div>

            <!-- ngIf: activeTab == '' -->
            <div class="btn-group ng-scope" ng-if="activeTab == ''">
                <a class="nav-link" href="/HT50/gift/customer/total/list">
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
        <th>NV PT</th>
        <th>SĐT</th>
        <th>Ngày sinh</th>
        <th>Hạng</th>
        <th>Gửi quà</th>
        <th>Hành động</th>
    </tr>
    </thead>
</table>

<!-- The Modal manager Target-->
<div class="modal" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật thông tin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form id="updated-customer" method="post" action="/HT50/manager/new/customer">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="code">Mã khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="code"
                               name="code" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name_gara">Tên Gara/Cửa hàng/Khách hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="name_gara"
                               name="name_gara">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên chủ Gara/Cửa hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="name"
                               name="name">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ngày sinh *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="birthday"
                               name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="email"
                               name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại chủ Gara/Cửa hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="phone"
                               name="phone">
                    </div>
                    <div class="form-group">
                        <label for="name_sale">Họ tên người phụ trách mua hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="name_sale"
                               name="name_sale">
                    </div>
                    <div class="form-group">
                        <label for="phone_sale">Số điện thoại người phụ trách mua hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="phone_sale"
                               name="phone_sale">
                    </div>
                    <div class="form-group">
                        <label for="name_accountant">Họ tên kế toán:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..."
                               id="name_accountant" name="name_accountant">
                    </div>
                    <div class="form-group">
                        <label for="phone_accountant">Số điện thoại kế toán:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..."
                               id="phone_accountant" name="phone_accountant">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="address"
                               name="address">
                    </div>
                    <div class="form-group">
                        <label for="province">Quận/Huyện *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="province"
                               name="province">
                    </div>
                    <div class="form-group">
                        <label for="city">Thành phố *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="city"
                               name="city">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="button-submit-data btn btn-sm btn-link" onclick="save()">Lưu và HT</button>
                    <button type="submit" class="button-submit-data btn btn-sm btn-link">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="bg">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cập nhật thông tin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form id="bg-customer" method="post" action="/HT50/manager/bg/customer">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="code">Mã khách hàng:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="code-bg"
                               name="code" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name_gara">Tên Gara/Cửa hàng/Khách hàng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="name_gara-bg"
                               name="name_gara" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name_gara">Ngày sinh*:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="birthday-bg"
                               name="birthday" disabled>
                    </div>

                    <div class="form-group">
                        <label for="value">Giá trị *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="value"
                               name="value">
                    </div>
                    <div class="form-group">
                        <label for="bg">Mã quà tặng *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="bg"
                               name="bg">
                    </div>
                    <div class="form-group">
                        <label for="b_date">Ngày hết hạn *:</label>
                        <input type="text" class="form-control" placeholder="Câu trả lời của bạn..." id="b_date"
                               name="b_date">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="button-submit-data btn btn-sm btn-link">Lưu</button>
                </div>
            </form>
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
<script src="{{ asset('/js/survey/managerAccumulate.js') }}"></script>
</body>
</html>
