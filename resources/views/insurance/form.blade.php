<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HTAuto</title>
    <link rel="shortcut icon" href="../../../public/crop-logo.png">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
          rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/review360/intergration.css">
    <link rel="stylesheet" type="text/css" href="/css/survey/index.css">
    <link rel="stylesheet" type="text/css" href="/css/main/errors.css">
    <link rel="stylesheet" type="text/css" href="/css/main/form.css">
</head>
<body>
<form action="/HT11" method="post" id="#add-form" enctype="multipart/form-data">
    @csrf
    <section class="payment-form dark">

        <div class="container-form">
            <div class="card-details">
                <img src="/image/banner-insurance.jpg" class="img img-fluid">
                <p style="font-size: 1rem">
                    <br>HT xin lỗi vì sự cố khiến cho sản phẩm của Quý khách mua tại HT bị hỏng và phải gửi lại bảo
                    hành.
                    <br><br>Với mong muốn mang đến cho khách hàng dịch vụ bảo hành thuận tiện và nhanh chóng nhất, Quý
                    khách vui lòng đọc kỹ hướng dẫn điều kiện bảo hành và điền thông tin vào form dưới đây.
                    <br><br><b>HT xin trân trọng cảm ơn!</b>
                    <br>
                </p>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="container-form">
                <div class="card-details">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Tên khách hàng <span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Số điện thoại <span style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="phone" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Địa chỉ <span
                                    style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="address" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Tên sản phẩm <span
                                    style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="product" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Số phiếu mua <span
                                    style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="bill" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Số lượng <span
                                    style="color: red">(*)</span></label>
                            <input type="text" class="form-control" name="amount" placeholder="Câu trả lời của bạn..." required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="card-holder" class="form-label-header">Ngày bảo hành <span style="color: red">(*)</span></label>
                            <input type="date" class="form-control" name="insurance_date" placeholder="Câu trả lời của bạn..." required>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container-form">
                <div class="card-details">
                    <div class="row">
                        <h2>Mô tả hỏng</h2>
                        <hr>
                        <br>
                        <br>
                        <br>
                        @foreach ($data['data'] as $value)
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">{{$value['ask']}} <span
                                        style="color: red">(*)</span></label>
                                @foreach ($value['answer'] as $ans)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$value['number']}}"
                                               value="{{$ans}}" required>&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">{{$ans}}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="form-group col-sm-12">
                            <div class="form-group col-sm-12">
                                <label for="card-holder" class="form-label-header">Ảnh/video</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file">
                                    <label class="custom-file-label" for="validatedCustomFile">Tải tệp lên</label>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="{{$type}}">
                            <div class="form-group col-sm-12">
                                <div class="form-check">
                                    <button class="btn btn-primary" type="submit">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-form"
                     style="border:none!important; box-shadow:none;background:none; font-size: 0.7rem">
                    Báo cáo đánh giá khách hàng về công ty TNHH HTAUTO
                </div>
            </div>
    </section>
</form>

<div id="load_page">
    <div class="loader"></div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->

<!-- Page level custom scripts -->
<script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="{{ asset('/js/insurance/form.js') }}"></script>

</body>
</html>
