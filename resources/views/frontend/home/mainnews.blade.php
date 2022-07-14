<div class="container-fluid">
	<div class="row">
		<div class="col-lg-7 px-0">
			<div class="owl-carousel main-carousel position-relative">
            @php
            $allnews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_hot', 1)->orderBy('news_id','DESC')->limit(6)->get();
            @endphp
            @foreach ( $allnews as $news)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    @if (!empty($news->news_image))
                    <img class="img-fluid h-100" src="{{ asset('upload/news/'.$news->news_image) }}"style="object-fit: cover;">
                    @else
                    <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                    @endif
					<div class="overlay">
						<div class="mb-2">
                             <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $news->categoryinfo->category_name }}
                            </a>
                            <a class="text-white" href="">{{ $news->created_at->isoFormat('MMMM Do , Y') }}</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ route('post',$news->news_id) }}">{{ Str::words($news->news_title,10) }}
                        </a>
                    </div>
				</div>
             @endforeach

			</div>
		</div>
		<div class="col-lg-5 px-0">
			<div class="row mx-0">
            @php
            $allnew = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_latest', 1)->orderBy('news_id','DESC')->limit(4)->get();
            @endphp
            @foreach ($allnew as $newnews)

				<div class="col-md-6 px-0">
					<div class="position-relative overflow-hidden" style="height: 250px;">
                        @if (!empty($newnews->news_image))
                        <img class="img-fluid h-100" src="{{ asset('upload/news/'.$newnews->news_image) }}"style="object-fit: cover;">
                        @else
                        <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                        @endif
						<div class="overlay">
							<div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $newnews->categoryinfo->category_name }}</a>
                                <a class="text-white" href=""><small>{{ $newnews->created_at->isoFormat('MMMM Do , Y') }} </small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('post',$news->news_id) }}">{{ Str::words($newnews->news_title,8) }}</a>
                        </div>
					</div>
				</div>
            @endforeach

			</div>
		</div>
	</div>
</div>
