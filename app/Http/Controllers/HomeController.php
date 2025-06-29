<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\ReviewCus;
use App\models\PageContent;
use App\models\Project;
use App\models\BannerAds;
use  App\models\website\Founder;
use App\models\website\AlbumAffter;

class HomeController extends Controller
{
    public function home()
    {
        $data['hotnews'] = Blog::where([
            ['status','=',1]
        ])->orderBy('id','DESC')->limit(6)->get(['id','title','slug','created_at','image','description']);
        $data['bannerads'] = BannerAds::where(['status'=>1])->get();
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image']);
        $data['partner'] = Partner::where(['status'=>1])->get();
        $data['logokhachhang'] = AlbumAffter::where(['status'=>1])->get();
        $data['reviewcus'] = ReviewCus::where(['status'=>1])->get();
        $data['founder'] = Founder::where(['status'=>1])->get();
        $data['homePro'] = Product::where(['status'=>1,'discountStatus'=>1])
            ->orderBy('id','DESC')
            ->select('id','category','name','discount','price','images','slug','cate_slug','type_slug','description','preserve','size')
            ->limit(10)->get();
        return view('home',$data);
    }
}
