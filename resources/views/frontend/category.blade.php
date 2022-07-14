@extends('layouts.website')
@section('content')
    <!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                @foreach ($category as $category)
                                  @if (empty($category))
                                    <h4 class="m-0 text-uppercase font-weight-bold">Category: </h4>
                                  @else
                                    <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ $category->category_name }}</h4>
                                  @endif
                                @endforeach


                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        @foreach ($alldata as $data)

                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                @if (!empty($data->news_image))
                                <img class="img-fluid w-100" src="{{ asset('upload/news/'.$data->news_image) }}"style="object-fit: cover;">
                                @else
                                <img class="img-fluid w-100" src="{{ asset('upload/avater.jpg') }}"style="object-fit: cover;">
                                @endif

                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{ $data->categoryinfo->category_name }}</a>
                                        <a class="text-body" href=""><small>{{ $data->created_at->isoFormat(' MMMM Do , Y') }}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{ route('post',$data->news_id) }}">{{ Str::words($data->news_title,5) }}</a>
                                    <p class="m-0">{{ Str::words($data->news_subtitle,15) }}</p>
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

                    </div>
                </div>
                <!-- News With Sidebar Strt -->
                @include('frontend.home.sidebar')
                <!-- News With Sidebar End -->
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    @endsection
