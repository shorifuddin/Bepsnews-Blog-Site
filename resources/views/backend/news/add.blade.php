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
      <form method="POST" action="{{ route('news_submit') }}" enctype="multipart/form-data">
        @csrf
       <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle"></i> NEWS UPLOAD NOW
              </div>
              <div class="col-md-4 card_header_btn ">
              <a href="{{ route('news_all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All NEWS</a>
             </div>
            </div>
        </div>

        <div class="card-body ">
          <div class="form-group row ">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
              <input type="text" class="form-control form_control" name="news_title" value="{{ old('news_title') }}">
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
              <input type="text" class="form-control form_control" name="news_subtitle" value="{{ old('news_subtitle') }}">
              <span class="invalid-feedback">
              @error('news_subtitle')
                  {{ $message }}
              @enderror
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Category<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="news_category">
                <option value="0">Choose News Category</option>
                @foreach ($categorydata as $data)
                <option value="{{ $data->category_id }}">{{ $data->category_name }}</option>
                @endforeach
                @error('news_category')
                {{ $message }}
            @enderror
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Details<span class="req_star">*</span>:</label>
            <div class="col-sm-7 pp">
                <textarea class="summernote" name="news_details"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Feature<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="news_feature">
                <option value="0">Choose News Feature</option>
                <option value="1">Yes</option>
                <option value="2">NO</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Tranding<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="news_tranding">
                <option value="0">Choose News Tranding</option>
                <option value="1">Yes</option>
                <option value="2">NO</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Hot<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="news_hot">
                <option value="0">Choose News Hot</option>
                <option value="1">Yes</option>
                <option value="2">NO</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Latest<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" name="news_latest">
                <option value="0">Choose News Latest</option>
                <option value="1">Yes</option>
                <option value="2">NO</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Feature Image<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="file" name="news_image" value="{{ old('news_image') }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col_form_label">NEWS Gallery:</label>
            <div class="col-sm-7">
              <input  multiple type="file" name="news_gallery[]" value="{{ old('news_gallery') }}">
            </div>
          </div>
        </div>

      <div class="card-footer bg-secondary card_footer">
        <button type="submit" class="btn btn-dark">NEWS UPLOAD</button>
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
