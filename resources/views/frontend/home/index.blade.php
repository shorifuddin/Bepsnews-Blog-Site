@extends('layouts.website')
@section('content')

<!-- Main News Slider Start -->
    @include('frontend.home.mainnews')
<!-- Main News Slider End -->
<!-- Breaking News Start -->
    @include('frontend.home.brakingnews')
<!-- Breaking News End -->
<!-- Featured News Slider Start -->
    @include('frontend.home.featurenews')
<!-- Featured News Slider End -->
<!-- News With Sidebar Start -->
    @include('frontend.home.newnews')
<!-- News With Sidebar End -->

@endsection
