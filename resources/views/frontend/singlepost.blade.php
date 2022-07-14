
@extends('layouts.website')
@section('content')
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                @php
                    $brakingnews = App\Models\Brakingnews::where('brakingnews_id', 1)->where('brakingnews_status', 1)->get();
                @endphp
                @foreach ($brakingnews as $braking_news)
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            <div class="text-truncate">
                                <a class="text-secondary text-uppercase font-weight-semi-bold" href="">{{ $braking_news->brakingnews_one }}</a>
                            </div>
                            <div class="text-truncate">
                                <a class="text-secondary text-uppercase font-weight-semi-bold" href="">{{ $braking_news->brakingnews_two }}</a>
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
    <!-- Breaking News End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        @if (!empty($data->news_image))
                        <img class="img-fluid w-100" src="{{ asset('upload/news/'.$data->news_image) }}"style="object-fit: cover;">
                        @else
                        <img class="img-fluid w-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                        @endif
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="">{{ $data->categoryinfo->category_name }}</a>
                                <a class="text-body" href="">{{ $data->created_at->isoFormat(' MMMM Do , Y') }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $data->news_title }}</h1>
                            <p> {!! $data->news_details !!}</p>


                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                <span>John Doe</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>12345</span>
                                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->


                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
                    <!-- Featured News Slider Start -->
                    @include('frontend.home.featurenews')
                    <!-- Featured News Slider End -->

                </div>

			<!-- News With Sidebar Start -->
            @include('frontend.home.sidebar')
            <!-- News With Sidebar End -->
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


@endsection
