@extends('layout.admin')

@section('title', 'Admin - Chi tiết đơn hàng')

@section('content')
    <h1>Danh sách chi tiết đơn hàng</h1>
    <x-alert></x-alert>

    <div id="list">
        @include('admin.orderitems.list')
    </div>

    <x-modal></x-modal>
@endsection
