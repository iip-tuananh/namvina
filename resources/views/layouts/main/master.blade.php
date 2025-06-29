{{-- https://live.themewild.com/logisto/service.html --}}
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="theme-color" content="#d70018">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
      <meta name='revisit-after' content='2 days' />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title')</title>
      <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
      <meta http-equiv="Content-Language" content="vi" />
      <link rel="alternate" href="{{url()->current()}}" hreflang="vi-vn" />
      <meta name="description" content="@yield('description')">
      <meta name="robots" content="index, follow" />
      <meta name="googlebot" content="index, follow">
      <meta name="revisit-after" content="1 days" />
      <meta name="generator" content="@yield('title')" />
      <meta name="rating" content="General">
      <meta name="application-name" content="@yield('title')" />
      <meta name="theme-color" content="#ed3235" />
      <meta name="msapplication-TileColor" content="#ed3235" />
      <meta name="mobile-web-app-capable" content="yes">
      <meta name="mobile-web-app-title" content="{{url()->current()}}" />
      <link rel="touch-icon-precomposed" href="@yield('image')" sizes="700x700">
      <meta property="og:url" content="">
      <meta property="og:title" content="@yield('title')">
      <meta property="og:description" content="@yield('description')">
      <meta property="og:image" content="@yield('image')">
      <meta property="og:site_name" content="{{url()->current()}}">
      <meta property="og:image:alt" content="@yield('title')">
      <meta property="og:type" content="website" />
      <meta property="og:locale" content="vi_VN" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:site" content="@{{url()->current()}}" />
      <meta name="twitter:title" content="@yield('title')" />
      <meta name="twitter:description" content="@yield('description')" />
      <meta name="twitter:image" content="@yield('image')" />
      <meta name="twitter:url" content="" />
      <meta itemprop="name" content="@yield('title')">
      <meta itemprop="description" content="@yield('description')">
      <meta itemprop="image" content="@yield('image')">
      <meta itemprop="url" content="">
      <link rel="canonical" href="{{\Request::url()}}">
      <!-- <link rel="amphtml" href="amp/" /> -->
      <link rel="image_src" href="@yield('image')" />
      <link rel="image_src" href="@yield('image')" />
      <link rel="shortcut icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <link rel="icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!-- css -->
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/all-fontawesome.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/animate.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/magnific-popup.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/nice-select.min.css">
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/style.css"> 
      <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/callbutton.css">
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
      @yield('css')
      
   </head>
   <body>
      @include('layouts.header.index')
      
      @yield('content')
      <!-- footer area -->
      @include('layouts.footer.index')
      <!-- footer area end -->
      <div class="flexsearchui">
         <div class="searchmobileui">
            <form action="https://tracking.tnhlog.vn/login" method="get">
               <div class="form-group d-flex" style="margin-bottom:0;">
                  <input type="text" name="search" class="form-control" placeholder="Nhập mã tra cứu..." required="" style="border-radius: 0px;">
                  <button type="submit" class="buttonsearch"><i class="far fa-search"></i></button>
               </div>
            </form>
         </div>
      </div>
      <div onclick="window.location.href= 'tel:{{$setting->phone1}}'" class="hotline-phone-ring-wrap">
         <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
               <a href="tel:{{$setting->phone1}}" class="pps-btn-img">
                  <img src="{{url('frontend/img/phone.png')}}" alt="Gọi điện thoại" width="50">
               </a>
            </div>
         </div>
         <a href="tel:{{$setting->phone1}}">
         </a>
         <div class="hotline-bar"><a href="tel:{{$setting->phone1}}">
            </a><a href="tel:{{$setting->phone1}}">
               <span class="text-hotline">{{$setting->phone1}}</span>
            </a>
         </div>
   
      </div>
      <div class="inner-fabs show">
         <a target="blank" href="https://zalo.me/{{$setting->fax}}" class="fabs roundCool"
            id="challenges-fab" data-tooltip="Nhắn tin Zalo">
            <img class="inner-fab-icon" src="{{url('frontend/img/zalo.png')}}" alt="challenges-icon" border="0">
         </a>
       
         <a target="blank" href="{{$setting->facebook}}" class="fabs roundCool" id="chat-fab"
            data-tooltip="Fanpage">
            <img class="inner-fab-icon" src="{{url('frontend/img/fbicon.png')}}" alt="chat-active-icon" border="0">
         </a>
      </div>
      <div class="fabs roundCool call-animation" id="main-fab">
         <img class="img-circle" src="{{url('frontend/img/lienhe.png')}}" alt="" width="135">
      </div>
      {{-- <div class="totop">
         <a href="#"><i class="bi bi-chevron-up"></i></a>
      </div> --}}
      
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/modernizr.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/bootstrap.bundle.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/imagesloaded.pkgd.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.magnific-popup.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/isotope.pkgd.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.appear.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.easing.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/owl.carousel.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/counter-up.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.nice-select.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/wow.min.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/main.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/callbutton.js"></script>
      <script src="{{ env('AWS_R2_URL') }}/frontend/js/notify.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
         $('.product-slider.owl-carousel').owlCarousel({
    loop:false,
    margin:24,
    nav:true,
    dots:true,
    autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{items:1},
        600:{items:2},
        1000:{items:5}
    }
});
      </script>
      <script>
         // Đồng bộ slider lớn và thumbnail
var bigSlider = $('.product-detail-slider');
var thumbSlider = $('.product-thumb-slider');

bigSlider.owlCarousel({
    items:1,
    loop:true,
    nav:false,
    dots:false,
    autoplay:false,
    smartSpeed:500,
    onChanged: syncPosition
});

thumbSlider.owlCarousel({
    items:5,
    margin:10,
    dots:false,
    nav:false,
    center:false,
    autoplay:false
});

function syncPosition(el) {
    var idx = el.item.index - el.relatedTarget._clones.length / 2;
    var count = el.item.count;
    if(idx < 0) idx = count + idx;
    thumbSlider.find('.owl-item').removeClass('current');
    thumbSlider.find('.owl-item').eq(idx).addClass('current');
    thumbSlider.trigger('to.owl.carousel', [idx, 300, true]);
}

thumbSlider.on('click', '.owl-item', function(e){
    e.preventDefault();
    var idx = $(this).index();
    bigSlider.trigger('to.owl.carousel', [idx, 300, true]);
});
      </script>
      @if(session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif
@if(session('error'))
<script>
    toastr.error("{{ session('error') }}");
</script>
@endif
      @yield('js')
   </body>
</html>