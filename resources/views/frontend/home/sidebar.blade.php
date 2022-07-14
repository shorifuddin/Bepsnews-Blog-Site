<div class="col-lg-4">
    <!-- Social Follow Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;"> <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Fans</span> </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;"> <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Followers</span> </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;"> <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Connects</span> </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;"> <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Followers</span> </a>
            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;"> <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Subscribers</span> </a>
            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;"> <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i> <span class="font-weight-medium">12,345 Followers</span> </a>
        </div>
    </div>
    <!-- Social Follow End -->
    <!-- Ads Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4> </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <a href=""><img class="img-fluid" src="{{asset('frontend')}}/img/news-800x500-2.jpg" alt=""></a>
        </div>
    </div>
    <!-- Ads End -->
    <!-- Popular News Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            @php
            $tradingnews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_tranding', 1)->orderBy('news_id','DESC')->limit(5)->get();
            @endphp
            @foreach ($tradingnews  as $trading_news )
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                @if (!empty($trading_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$trading_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $trading_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $trading_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$trading_news->news_id) }}">{{ Str::words($trading_news->news_title,3) }}</a> </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->
    <!-- Popular News Start -->
      <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Hot News</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            @php
            $hotnews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_hot', 1)->orderBy('news_id','DESC')->limit(5)->get();
            @endphp
            @foreach ($hotnews  as $hot_news )
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                @if (!empty($hot_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$hot_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $hot_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $hot_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$hot_news->news_id) }}">{{ Str::words($hot_news->news_title,3) }}</a> </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->
     <!-- Popular News Start -->
     <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">আইটি বিশ্ব</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            @php
            $technews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 2)->orderBy('news_id','DESC')->limit(5)->get();
            @endphp
            @foreach ($technews  as $tech_news )
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                @if (!empty($tech_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$tech_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $tech_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $tech_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$tech_news->news_id) }}">{{ Str::words($tech_news->news_title,3) }}</a> </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->
     <!-- Popular News Start -->
     <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">রাজনীতি</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            @php
            $catnews4 = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 4)->orderBy('news_id','DESC')->limit(4)->get();
            @endphp
            @foreach ($catnews4  as $cat_news )
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                @if (!empty($cat_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$cat_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $cat_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $cat_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$cat_news->news_id) }}">{{ Str::words($cat_news->news_title,3) }}</a> </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->
     <!-- Popular News Start -->
     <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">খেলা</h4> </div>
        <div class="bg-white border border-top-0 p-3">
            @php
            $catnews5 = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 5)->orderBy('news_id','DESC')->limit(4)->get();
            @endphp
            @foreach ($catnews5  as $cate_news )
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                @if (!empty($cate_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$cate_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $cate_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $cate_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$cate_news->news_id) }}">{{ Str::words($cate_news->news_title,3) }}</a> </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Popular News End -->
        <!-- Popular News Start -->
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">বিনোদন</h4> </div>
            <div class="bg-white border border-top-0 p-3">
                @php
                $catnews6 = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 6)->orderBy('news_id','DESC')->limit(4)->get();
                @endphp
                @foreach ($catnews6  as $cate_news )
                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                    @if (!empty($cate_news->news_image))
                    <img class="img-fluid h-100" src="{{ asset('upload/news/'.$cate_news->news_image) }}"style="object-fit: cover;">
                    @else
                    <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                    @endif
                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                        <div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $cate_news->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $cate_news->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$cate_news->news_id) }}">{{ Str::words($cate_news->news_title,3) }}</a> </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Popular News End -->
        <!-- Tags Start -->
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4> </div>
            <div class="bg-white border border-top-0 p-3">
                @php
                    $categoies = App\Models\Category::where('category_status', 1)->get();
                @endphp
                <div class="d-flex flex-wrap m-n1">
                    @foreach ( $categoies as $category)
                    <a href="{{ route('category',$category->category_id) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $category->category_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Tags End -->
    <!-- Newsletter Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4> </div>
        <div class="bg-white text-center border border-top-0 p-3">
            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
            <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                </div>
            </div> <small>Lorem ipsum dolor sit amet elit</small> </div>
    </div>
    <!-- Newsletter End -->

</div>
