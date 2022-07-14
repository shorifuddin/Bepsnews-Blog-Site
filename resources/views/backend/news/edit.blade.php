@extends('layouts.admin')
@section('content')

@if (Session::has('success'))
<script>
swal({ title: "Good job!",text: "You clicked the button!", icon: "success",timer:3000,});
</script>
@endif

@if (Session::has('error'))
<script>
swal({ title: "Good error!",text: "You clicked the button!", icon: "error",});
</script>
@endif

<div class="row container">
    <div class="col-md-12 container">
      <form method="POST" action="{{ route('news_update',$data->news_id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="news_id" value="{{ $data->news_id }}">
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> NEWS UPDATE NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('news_all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All NEWS</a>
             </div>
            </div>
        </div>

        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Status<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_status">
                    @if ( $data->news_status==0)
                        <option value="0">Pending</option>
                    @else
                        <option value="1">Approved</option>
                    @endif
                    @if ( $data->news_status==1)
                        <option value="0">Pending</option>
                    @else
                        <option value="1">Approved</option>
                    @endif
                  </select>
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Title<span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                  <input type="text" class="form-control form_control" name="news_title" value="{{ $data->news_title }}">
                  <span class="invalid-feedback">
                    @error('news_title')
                      {{ $message }}
                    @enderror
                  </span>
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Sub-Title:</label>
                <div class="col-sm-7 pp">
                  <input type="text" class="form-control form_control" name="news_subtitle" value="{{ $data->news_subtitle }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Category<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_category">

                    @if (empty($data->news_category))
                    <option value="">No Category</option>
                        @foreach ($categorydata as $data)
                        <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                        @endforeach
                    @else
                    <option value="{{ $data->news_category }}">{{ $data->categoryinfo->category_name }}</option>
                        @foreach ($categorydata as $data)
                        <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                        @endforeach
                    @endif

                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Details<span class="req_star">*</span>:</label>
                <div class="col-sm-7 pp">
                    <textarea class="summernote" name="news_details">{!! $data->news_details !!}</textarea>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Feature<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_feature">
                    @if ( $data->news_feature==0)
                        <option value="0">Feature News Off</option>
                    @else
                        <option value="1">Feature News On</option>
                    @endif
                    @if ( $data->news_feature==1)
                        <option value="0">Feature News Off</option>
                    @else
                        <option value="1">Feature News On</option>
                    @endif
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Tranding<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_tranding">
                    @if ( $data->news_tranding==0)
                        <option value="0">Tranding News Off</option>
                    @else
                        <option value="1">Tranding News On</option>
                    @endif
                    @if ( $data->news_tranding==1)
                        <option value="0">Tranding News Off</option>
                    @else
                        <option value="1">Tranding News On</option>
                    @endif
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Latest<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_latest">
                    @if ( $data->news_latest==0)
                        <option value="0">Latest News Off</option>
                    @else
                        <option value="1">Latest News On</option>
                    @endif
                    @if ( $data->news_latest==1)
                        <option value="0">Latest News Off</option>
                    @else
                        <option value="1">Latest News Off</option>
                    @endif
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label col_form_label">NEWS Hot<span class="req_star">*</span>:</label>
                <div class="col-sm-4">
                  <select class="form-control form_control" name="news_hot">
                    @if ( $data->news_hot==0)
                        <option value="0">Hot News Off</option>
                    @else
                        <option value="1">Hot News On</option>
                    @endif
                    @if ( $data->news_hot==1)
                        <option value="0">Hot News Off</option>
                    @else
                        <option value="1">Hot News On</option>
                    @endif
                  </select>
                </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">News Feature Image:</label>
            <div class="col-sm-7 ">
              <input type="file" name="news_image" value="{{ $data->news_image }}">
              @error('image')
                 <p class="pp">{{ $message }}</p>
              @enderror
              @if (!empty($data->news_image))
                <img class="img-fluid img"  src="{{ asset('upload/news/'.$data->news_image) }}">
              @else
                 <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
              @endif

            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label"> News Gallery Image<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
                @php
                    $images = explode(',',$data->news_gallery)
                @endphp
              <input multiple type="file" name="news_gallery[]" value="{{ old('news_gallery') }}">
              @if (!empty($data->news_gallery))
              @foreach($images as $gal )
              <img class="img-fluid img"  src="{{ asset('upload/news/gallery/'.$gal) }}">
              @endforeach
                @else
              <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                @endif
              @error('news_gallery')
              <span class="text-danger">{{ $message }}</span>
             @enderror
            </div>
        </div>

        </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">Update News</button>
      </div>

      </div>
    </form>
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
