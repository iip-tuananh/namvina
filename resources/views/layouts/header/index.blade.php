<!-- header area -->
<header class="header">
   <!-- header top -->
   <div class="header-top">
      <div class="container">
         <div class="header-top-wrap">
            <div class="header-top-left">
               <div class="header-top-list">
                 <ul style="overflow: hidden; white-space: nowrap; width: 100%;">
  <li style="
    display: inline-block;
    color: white;
    padding-left: 100%;
    animation: marquee 15s linear infinite;
  ">
    NAMVINA – Chúng tôi cung cấp Dịch vụ Phụ tùng, Sửa chữa, Bảo trì, Hoán cải
  </li>
</ul>
<style>
@keyframes marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}
</style>
               </div>
            </div>
            <div class="header-top-right">
               <div class="flexsearchuis d-lg-block d-none">
                  <div class="searchmobileui">
                     <form action="{{route('search_result')}}" method="post">
                        @csrf
                        <div class="form-group d-flex" style="margin-bottom:0;">
                           <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm" required="" style="border-radius: 0px;">
                           <button type="submit" class="buttonsearch"><i class="far fa-search"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- header top end -->
   <!-- navbar -->
   <div class="main-navigation">
      <nav class="navbar navbar-expand-lg">
         <div class="container position-relative">
            <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{$setting->logo}}" alt="logo">
            </a>
            <div class="mobile-menu-right">
               <div class="mobile-menu-btn">
                  <button type="button" class="nav-right-link search-box-outer"><i
                     class="far fa-search"></i></button>
               </div>
               <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                  aria-label="Toggle navigation">
               <span></span>
               <span></span>
               <span></span>
               </button>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
               aria-labelledby="offcanvasNavbarLabel">
               <div class="offcanvas-header">
                  <a href="{{route('home')}}" class="offcanvas-brand" id="offcanvasNavbarLabel">
                  <img src="{{$setting->logo}}" alt="">
                  </a>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                     class="far fa-xmark"></i></button>
               </div>
               <div class="offcanvas-body gap-xl-4">
                  <ul class="navbar-nav justify-content-end flex-grow-1">
                     <li class="nav-item ">
                        <a class="nav-link active" href="{{route('home')}}">Trang chủ</a>
                        
                     </li>
                     <li class="nav-item"><a class="nav-link" href="{{route('aboutUs')}}">Giới Thiệu</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('allProduct')}}" data-bs-toggle="dropdown">Sản Phẩm</a>
                        <ul class="dropdown-menu fade-down">
                           @foreach ($categoryhome as $cate)
                           <li><a class="dropdown-item" href="{{route('allListProCate',['danhmuc'=>$cate->slug])}}">{!!languageName($cate->name)!!}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dịch vụ</a>
                        <ul class="dropdown-menu fade-down">
                           @foreach ($servicehome as $item)
                           <li><a class="dropdown-item" href="{{route('serviceCateList',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                           @endforeach
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Hỗ trợ khách hàng</a>
                        <ul class="dropdown-menu fade-down">
                           {{-- <li><a class="dropdown-item" href="{{$setting->GA}}">Tỉnh thành hỗ trợ</a>
                           </li>
                           <li><a class="dropdown-item" href="{{$setting->popupimage}}">Kết nối API</a>
                           </li> --}}
                           @foreach ($pageContent as $item)
                               @if ($item->type === 'ho-tro-khanh-hang')
                               <li><a class="dropdown-item" href="{{route('pagecontent',['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                               @endif
                           @endforeach
                           {{-- <li><a class="dropdown-item" href="{{route('faq')}}">Câu hỏi thường gặp</a>
                           </li> --}}
                        </ul>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('allListBlog')}}">Blog</a>

                     </li>
                     
                     <li class="nav-item"><a class="nav-link" href="{{route('lienHe')}}">Liên Hệ</a></li>
                  </ul>
                  <!-- nav-right -->
              
               </div>
            </div>
         </div>
      </nav>
   </div>
   <!-- navbar end-->
</header>
<!-- header area end -->
<!-- popup search -->
<div class="search-popup">
   <button class="close-search"><span class="far fa-times"></span></button>
   <form action="#">
      <div class="form-group">
         <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
         <button type="submit"><i class="far fa-search"></i></button>
      </div>
   </form>
</div>
<!-- popup search end -->