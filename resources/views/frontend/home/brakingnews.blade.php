<div class="container-fluid bg-dark py-3 mb-3">
	<div class="container">
		<div class="row align-items-center bg-dark">
			<div class="col-12">
				<div class="d-flex justify-content-between">
					<div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking News</div>
                    @php
                    $brakingnews = App\Models\Brakingnews::where('brakingnews_id', 1)->where('brakingnews_status', 1)->get();
                    @endphp
                    @foreach ($brakingnews as $braking_news)
					<div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 170px); padding-right: 90px;">
						<div class="text-truncate">
                            <a class="text-white text-uppercase" href="">{{ $braking_news->brakingnews_one }}</a>
                        </div>
						<div class="text-truncate">
                            <a class="text-white text-uppercase" href="">{{ $braking_news->brakingnews_two }}</a>
                        </div>
                        <div class="text-truncate">
                            <a class="text-white text-uppercase" href="">{{ $braking_news->brakingnews_three }}</a>
                        </div>
                        <div class="text-truncate">
                            <a class="text-white text-uppercase" href="">{{ $braking_news->brakingnews_four }}</a>
                        </div>
					</div>
                    @endforeach
				</div>
			</div>
		</div>
	</div>
</div>
