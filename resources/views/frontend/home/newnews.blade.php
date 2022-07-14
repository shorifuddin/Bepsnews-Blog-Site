<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4> <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
					</div>
                    @php
                    $latestenews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_latest', 1)->orderBy('news_id','DESC')->limit(8)->get();
                    @endphp
                    @foreach ($latestenews  as $lateste_news )
					<div class="col-lg-6">
						<div class="position-relative mb-3">
                            @if (!empty($lateste_news->news_image))
                            <img class="img-fluid w-100" src="{{ asset('upload/news/'.$lateste_news->news_image) }}"style="object-fit: cover;">
                            @else
                            <img class="img-fluid w-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                            @endif
							<div class="bg-white border border-top-0 p-4">
								<div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $lateste_news->categoryinfo->category_name }}</a>
                                    <a class="text-body" href=""><small>{{ $lateste_news->created_at->isoFormat('MMMM Do , Y') }} </small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$lateste_news->news_id) }}">{{ Str::words($lateste_news->news_title,5) }}</a>
								<p class="m-0">{{ Str::words($lateste_news->news_subtitle,5) }}</p>
							</div>
							<div class="d-flex justify-content-between bg-white border border-top-0 p-4">
								<div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                 </div>
							</div>
						</div>
					</div>
                    @endforeach
                    <div class="col-12">
						<div class="section-title">
							<h4 class="m-0 text-uppercase font-weight-bold">ভ্রমণ</h4> <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
					</div>
                    @php
                    $category_news8 = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 8)->orderBy('news_id','DESC')->limit(4)->get();
                    @endphp
                    @foreach ($category_news8  as $category_news8 )
					<div class="col-lg-6">
						<div class="position-relative mb-3">
                            @if (!empty($category_news8->news_image))
                            <img class="img-fluid w-100" src="{{ asset('upload/news/'.$category_news8->news_image) }}"style="object-fit: cover;">
                            @else
                            <img class="img-fluid w-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                            @endif
							<div class="bg-white border border-top-0 p-4">
								<div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $category_news8->categoryinfo->category_name }}</a>
                                    <a class="text-body" href=""><small>{{ $category_news8->created_at->isoFormat('MMMM Do , Y') }} </small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$category_news8->news_id) }}">{{ Str::words($category_news8->news_title,5) }}</a>
								<p class="m-0">{{ Str::words($category_news8->news_subtitle,5) }}</p>
							</div>
							<div class="d-flex justify-content-between bg-white border border-top-0 p-4">
								<div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                 </div>
							</div>
						</div>
					</div>
                    @endforeach

					<div class="col-lg-12 mb-3 section-title"> <h4 class="m-0 text-uppercase font-weight-bold">বিশেষ সংবাদ</h4></div>
                    @php
                    $category_news1 = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 1)->orderBy('news_id','DESC')->limit(2)->get();
                    @endphp
                    @foreach ($category_news1  as $category_news1 )
					<div class="col-lg-12">
						<div class="row news-lg mx-0 mb-3">
							<div class="col-md-6 h-100 px-0">
                                @if (!empty($category_news1->news_image))
                                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$category_news1->news_image) }}"style="object-fit: cover;">
                                @else
                                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                                @endif
                            </div>
							<div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
								<div class="mt-auto p-4">
									<div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $category_news1->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $category_news1->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$category_news1->news_id) }}">{{ Str::words($category_news1->news_title,5) }}</a>
									<p class="m-0">{{ Str::words($category_news1->news_subtitle,5) }}</p>
								</div>
								<div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
									<div class="d-flex align-items-center"> <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small> <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small> </div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
                    <div class="col-lg-12 mb-3 section-title"> <h4 class="m-0 text-uppercase font-weight-bold">করোনাভাইরাস</h4></div>
                    @php
                    $category_newss = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_category', 3)->orderBy('news_id','DESC')->limit(2)->get();
                    @endphp
                    @foreach ($category_newss  as $category_newss )
					<div class="col-lg-12">
						<div class="row news-lg mx-0 mb-3">
							<div class="col-md-6 h-100 px-0">
                                @if (!empty($category_newss->news_image))
                                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$category_newss->news_image) }}"style="object-fit: cover;">
                                @else
                                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                                @endif
                            </div>
							<div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
								<div class="mt-auto p-4">
									<div class="mb-2"> <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $category_newss->categoryinfo->category_name }}</a> <a class="text-body" href=""><small>{{ $category_newss->created_at->isoFormat('MMMM Do , Y') }} </small></a> </div> <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$category_newss->news_id) }}">{{ Str::words($category_newss->news_title,5) }}</a>
									<p class="m-0">{{ Str::words($category_newss->news_subtitle,5) }}</p>
								</div>
								<div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
									<div class="d-flex align-items-center"> <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small> <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small> </div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
			<!-- News With Sidebar Start -->
            @include('frontend.home.sidebar')
            <!-- News With Sidebar End -->
		</div>
	</div>
</div>
