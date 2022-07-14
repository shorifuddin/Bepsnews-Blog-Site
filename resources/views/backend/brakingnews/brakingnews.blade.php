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
    <form method="POST" action="{{ route('brakingnews_update') }}" enctype="multipart/form-data">
      @csrf
     <div class="card">
      <div class="card-header bg-secondary card_header">
          <div class="row">
            <div class="col-md-8 card_header_title">
              <i class="md md-add-circle"></i> UPLOAD Brakingnews Information
            </div>
            <div class="col-md-4 card_header_btn ">
            <a href="#" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All Brakingnews Information</a>
           </div>
          </div>
      </div>

      <div class="card-body">
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Brakingnews One <span class="req_star">*</span>:</label>
          <div class="col-sm-7">
            <textarea type="text" class="form-control form_control" name="brakingnews_one" value="">{{ $brakingnews->brakingnews_one }}</textarea>
            <strong class="invalid-feedback">
              @error('brakingnews_one')
                {{ $message }}
              @enderror
          </strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Brakingnews Two :</label>
          <div class="col-sm-7">
            <textarea type="text" class="form-control form_control" name="brakingnews_two" value="">{{ $brakingnews->brakingnews_two }}</textarea>
            <strong class="invalid-feedback">
              @error('brakingnews_two')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Brakingnews Three :</label>
          <div class="col-sm-7">
            <textarea type="text" class="form-control form_control" name="brakingnews_three" value="">{{ $brakingnews->brakingnews_three }}</textarea>
            <strong class="invalid-feedback">
              @error('brakingnews_three')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>
        <div class="form-group row ">
          <label class="col-sm-3 col-form-label col_form_label">Brakingnews Four :</label>
          <div class="col-sm-7">
            <textarea type="textarea" class="form-control form_control" name="brakingnews_four" value="">{{ $brakingnews->brakingnews_four }}</textarea>
            <strong class="invalid-feedback">
              @error('brakingnews_four')
                {{ $message }}
              @enderror</strong>
          </div>
        </div>

    <div class="card-footer bg-secondary card_footer">
      <button type="submit" class="btn btn-dark">BrakingNews Update</button>
    </div>

    </div>
  </form>
  </div>
</div>

@endsection
