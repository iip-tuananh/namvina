@php
// dd($pro);
       $img = json_decode($pro->images);
    if (!is_array($img) && !is_object($img)) {
        $img = [];
    }
    
    // Tính phần trăm giảm giá
    $phantram = $pro->price > 0 ? 100 - ($pro->discount / $pro->price) * 100 : 0;
    
    // Xử lý thông số kỹ thuật
    $thongso = [];
    if (isset($pro->size) && !empty($pro->size)) {
        $thongso = json_decode($pro->size);
        if (!is_array($thongso) && !is_object($thongso)) {
            $thongso = [];
        }
    }
    
    // Xử lý thông tin khuyến mãi
    $khuyenmai = [];
    if (isset($pro->preserve) && !empty($pro->preserve)) {
        $khuyenmai = json_decode($pro->preserve);
        if (!is_array($khuyenmai) && !is_object($khuyenmai)) {
            $khuyenmai = [];
        }
    }
    $phantram = $pro['price'] > 0 ? 100 - ($pro['discount'] / $pro['price']) * 100 : 0;
@endphp
<div class="item">
                                <div class="card h-100 shadow-sm product-card">
                                    <a
                                        href="{{ route('detailProduct', [
                                            'cate' => $pro['cate_slug'],
                                            'type' => !empty($pro['type_slug']) ? $pro['type_slug'] : 'loai',
                                            'id' => $pro['slug'],
                                        ]) }}">
                                        <img class="card-img-top lazy"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                            data-src="{{ $imgpro[0] ?? '' }}" alt="{{ $pro['name'] }}"
                                            style="height:200px;object-fit:cover; padding-top:10px">
                                    </a>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{!! languageName($pro['name']) !!}</h5>
                                        <div class="mb-2">
                                            <span class="text-danger fw-bold" style="font-size: 1.2em;">
                                                {{ number_format($pro['discount'], 0, ',', '.') }}₫
                                            </span>
                                            @if ($pro['price'] > $pro['discount'])
                                                <span class="text-muted text-decoration-line-through ms-2">
                                                    {{ number_format($pro['price'], 0, ',', '.') }}₫
                                                </span>
                                            @endif
                                        </div>
                                        <a href="{{ route('detailProduct', [
                                            'cate' => $pro['cate_slug'],
                                            'type' => !empty($pro['type_slug']) ? $pro['type_slug'] : 'loai',
                                            'id' => $pro['slug'],
                                        ]) }}"
                                            class="btn btn-primary btn-detail">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>

