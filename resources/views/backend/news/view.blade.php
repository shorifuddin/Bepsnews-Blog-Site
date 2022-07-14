@extends('layouts.admin')
@section('content')

<div class="row container">
    <div class="col-md-12 container">
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title" style="font-weight: 400; font-size:16px;">
                <i class="md md-add-circle "></i> News Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ route('news_all') }}" class="btn btn-xs btn-dark " ><i class="md md-view-module"></i> ALL News </a>
              </div>
            </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-bordered table-hover table-striped view_custom_table">
                  <tr>
                    <td>NEWS Title</td>
                    <td>:</td>
                    <td>{{ $data->news_title }}</td>
                  </tr>
                  <tr>
                    <td>NEWS Sub-Title</td>
                    <td>:</td>
                    <td>{{ $data->news_subtitle }}</td>
                  </tr>
                  <tr>
                    <td>NEWS Category</td>
                    <td>:</td>
                    <td>{{ $data->categoryinfo->category_name }}</td>
                  </tr>
                  <tr>
                    <td>NEWS Details</td>
                    <td>:</td>
                    <td>{!! $data->news_details !!}</td>
                  </tr>
                  <tr>
                    <td>NEWS Feature</td>
                    <td>:</td>
                    <td>@if ($data->news_feature==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Feature On</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Feature Off</button>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td>NEWS Tranding</td>
                    <td>:</td>
                    <td>@if ($data->news_tranding==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Tranding On</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Tranding Off</button>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td>NEWS Latest</td>
                    <td>:</td>
                    <td>@if ($data->news_latest==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Latest On</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Latest Off</button>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td>NEWS Hot</td>
                    <td>:</td>
                    <td>@if ($data->news_hot==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">HOT On</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">HOT Off</button>
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td> News Feature Image</td>
                    <td>:</td>
                    <td>
                    @if ($data->news_image!='')
                        <img class="img-fluid img"  src="{{ asset('upload/news/'.$data->news_image) }}">
                    @else
                         <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                    @endif
                    </td>
                  </tr>
                  <tr>
                    <td> News Gallery</td>
                    <td>:</td>
                    <td>
                    @php
                    $images = explode(',',$data->news_gallery)
                    @endphp
                    @if (!empty($data->news_gallery))
                    @foreach($images as $gal )
                    <img class="img-fluid img"  src="{{ asset('upload/news/gallery/'.$gal) }}">
                    @endforeach
                      @else
                    <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                      @endif
                    </td>
                  </tr>
              </table>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>

      <div class="card-footer bg-secondary card_footer">
        <div class="btn-group" role="group">
          <a type="button" class="btn btn-xs btn-dark">Print</a>
          <a type="button" class="btn btn-xs btn-warning">Excel</a>
          <a type="button" class="btn btn-xs btn-dark">PDF</a>
        </div>
      </div>

      </div>
    </div>
  </div>

@endsection

@section('coustom_css')
<link href="{{asset('backend')}}/assets/js/summernote/summernote-bs4.css" rel="stylesheet">

@endsection
@section('coustom_js')
<script src="{{asset('backend')}}/assets/js/summernote/summernote-bs4.js"></script>
<script>

    jQuery(document).ready(function(){
        $('.wysihtml5').wysihtml5();

        $('.summernote').summernote({
            height: 200,                 // set editor height

            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor

            focus: true                 // set focus to editable area after initializing summernote
        });

    });
</script>

        <script src="{{asset('backend')}}/assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

@endsection
