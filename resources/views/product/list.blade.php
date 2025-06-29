@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="content-block ">
    <div class="container-bg with-bgcolor" data-style="background-color: #F4F4F4">
      <br>
       <div class="breadcrumbs-container-wrapper">
          <div class="container">
             <div class="row">
                <div class="col-md-12">
                   <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                      <!-- Breadcrumb NavXT 6.2.1 -->
                      <span property="itemListElement" typeof="ListItem">
                         <a property="item" typeof="WebPage" title="Go to TheBuilt." href="{{route('home')}}" class="home">
                            <span property="name">Trang chủ</span>
                        </a>
                         <meta property="position" content="1">
                      </span>
                      &gt; 
                      <span property="itemListElement" typeof="ListItem">
                         <span property="name">{{$title}}</span>
                         <meta property="position" content="3">
                      </span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="page-container container">
       <div class="row">
          <div class="col-md-12 entry-content">
             <article>
               <br>
                
                <div class="vc_row wpb_row vc_row-fluid">
                    @if (count($list) > 0)
                        @foreach ($list as $item)
                            @php
                                $imgpro = json_decode($item->images);
                            @endphp
                            <div class="col-md-2 col-xl-2">
                                @include('layouts.product.item', ['pro' => $item, 'imgpro' => $imgpro])
                            </div>
                        @endforeach
                        <br>
                    @else
                        <div class="col-12 text-center py-5">
                            <h4>Nội dung đang cập nhật</h4>
                            <br>
                        </div>
                    @endif
                    {{ $list->links() }}
                </div>
                <div class="vc_row wpb_row vc_row-fluid">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                       <div class="vc_column-inner">
                          <div class="wpb_wrapper">
                             <div class="wpb_text_column wpb_content_element " >
                                <div class="wpb_wrapper">
                                   {!!$content!!}
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
             </article>
          </div>
       </div>
    </div>
 </div>
@endsection

