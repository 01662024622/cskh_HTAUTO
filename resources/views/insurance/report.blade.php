@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="/css/insurance/insurance.css">
@endsection
@section('content')

<br><br>

<br><br>
<table class="table table-bordered" id="users-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>SĐT</th>
            <th>Nhóm</th>
            <th>Sản phẩm</th>
            <th>Phiếu</th>
            <th>SL</th>
            <th>Bảo hành</th>
            <th>Ngày tạo</th>
            <th>Mô tả</th>
            <th>Hành Động</th>
        </tr>
    </thead>
</table>


<!-- The Modal -->
<div class="modal" id="add-modal">
    <div class="modal-dialog" style="max-width: 700px;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông tin bảo hành</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="modal-body">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script src="{{ asset('js/insurance/report.js') }}"></script>
@endsection
