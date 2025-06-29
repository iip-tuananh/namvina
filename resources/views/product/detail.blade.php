{{-- filepath: resources/views/product/detail.blade.php --}}
@extends('layouts.main.master')
@section('title')
{{ languageName($product->name) }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
@endsection
@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Ảnh sản phẩm (slider) -->
        <div class="col-md-6">
            <div class="owl-carousel product-detail-slider mb-3" >
                @foreach(json_decode($product->images) as $img)
                    <div><img src="{{ $img }}" class="img-fluid w-100" alt="{{ $product->name }}" style="height:550px;object-fit:cover;"></div>
                @endforeach
            </div>
            <br>
            <div class="owl-carousel product-thumb-slider">
                @foreach(json_decode($product->images) as $img)
                    <div><img src="{{ $img }}" class="img-thumb" alt="{{ $product->name }}"></div>
                @endforeach
            </div>
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ languageName($product->name) }}</h1>
            <div class="mb-3">
                <span class="text-danger fw-bold" style="font-size: 1.5em;">
                    {{ number_format($product->discount, 0, ',', '.') }}₫
                </span>
                @if($product->price > $product->discount)
                <span class="text-muted text-decoration-line-through ms-2">
                    {{ number_format($product->price, 0, ',', '.') }}₫
                </span>
                @endif
            </div>
            <div class="mb-3">
                <a href="tel:{{$setting->phone1}}" class="btn btn-success me-2">
                    <i class="fas fa-phone"></i> Liên hệ
                </a>
            </div>
            <div class="mb-3">
                {!! languageName($product->description) !!}
            </div>
            <!-- Thông số kỹ thuật -->
            @php $thongso = json_decode($product->size); @endphp
            @if($thongso)
            <ul class="list-group mb-3">
                @foreach($thongso as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $item->title }}</span>
                    <span class="fw-bold">{{ $item->detail }}</span>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <!-- Nội dung chi tiết -->
    <div class="row mt-4">
        <div class="col-12">
            <h4>Chi tiết sản phẩm</h4>
            <div>
                {!! languageName($product->content) !!}
            </div>
        </div>
    </div>
    <!-- Sản phẩm liên quan -->
    <div class="row mt-5">
        <div class="col-12">
            <h4>Sản phẩm liên quan</h4>
            <div class="owl-carousel productlq-carousel">
                @foreach($productlq as $pro)
                    <div class="item">
    <div class="card h-100 product-card">
        <a href="{{ route('detailProduct', [
            'cate' => $pro->cate_slug,
            'type' => $pro->type_slug ? $pro->type_slug : 'loai',
            'id' => $pro->slug
        ]) }}">
            <img class="card-img-top" src="{{ json_decode($pro->images)[0] ?? '' }}" alt="{{ $pro->name }}" style="height:180px;object-fit:cover;">
        </a>
        <div class="card-body text-center">
            <h5 class="card-title">{{ languageName($pro->name) }}</h5>
            <div class="mb-2">
                <span class="text-danger fw-bold">{{ number_format($pro->discount, 0, ',', '.') }}₫</span>
                @if($pro->price > $pro->discount)
                <span class="text-muted text-decoration-line-through ms-2">{{ number_format($pro->price, 0, ',', '.') }}₫</span>
                @endif
            </div>
            <a href="{{ route('detailProduct', [
                'cate' => $pro->cate_slug,
                'type' => $pro->type_slug ? $pro->type_slug : 'loai',
                'id' => $pro->slug
            ]) }}" class="btn btn-primary btn-detail">Xem chi tiết</a>
        </div>
    </div>
</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('.product-detail-slider').owlCarousel({
        items:1,
        loop:true,
        nav:false, // Tắt nút điều hướng
        dots:false, // Bật dots nếu muốn
        autoplay:true,
        autoplayTimeout:4000
    });
    $('.productlq-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav:false, // Tắt nút điều hướng
        dots:false,
        responsive:{
            0:{items:1},
            600:{items:2},
            1000:{items:5}
        }
    });
});
</script>
@endsection