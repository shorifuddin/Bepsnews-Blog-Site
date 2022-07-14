<div class="container-fluid pt-5 mb-3">
	<div class="container">
		<div class="section-title">
			<h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4> </div>
		<div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @php
            $featurenews = App\Models\Postnews::where('news_status', 1)->where('news_delete', 1)->where('news_feature', 1)->orderBy('news_id','DESC')->limit(24)->get();
            @endphp
            @foreach ($featurenews  as $feature_news )

			<div class="position-relative overflow-hidden" style="height: 300px;">
                @if (!empty($feature_news->news_image))
                <img class="img-fluid h-100" src="{{ asset('upload/news/'.$feature_news->news_image) }}"style="object-fit: cover;">
                @else
                <img class="img-fluid h-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                @endif
				<div class="overlay">
					<div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">{{ $feature_news->categoryinfo->category_name }}</a>
                        <a class="text-white" href=""><small>{{ $feature_news->created_at->isoFormat('MMMM Do , Y') }} </small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{ route('post',$feature_news->news_id) }}">{{ Str::words($feature_news->news_title,4) }}</a>
                </div>
			</div>
            @endforeach
		</div>
	</div>
</div>
