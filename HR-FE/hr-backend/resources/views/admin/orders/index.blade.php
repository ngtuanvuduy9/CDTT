@extends('layout.admin')

@section('title', 'Admin - Danh sách đơn hàng')

@section('content')
    <h1>Danh sách đơn hàng</h1>
    <x-alert></x-alert>

    <div id="list">
        @include('admin.orders.list')
    </div>

    <x-modal></x-modal>
@endsection
