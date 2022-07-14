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
      <div class="card">
        <div class="card-header bg-secondary card_header">
            <div class="row">
              <div class="col-md-8 card_header_title">
                <i class="md md-add-circle "></i> All Delete News Post Information
              </div>
              <div class="col-md-4 card_header_btn ">
                <a href="{{ route('news_all') }}" class="btn btn-xs btn-dark " style="float: right; color:white;"><i class="md md-view-module"></i> All News Post</a>
              </div>
            </div>
        </div>

      <div class="card-body container">
          <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
            <thead class="thead-dark">
                <tr>
                    <th>NEWS Image</th>
                    <th>NEWS Title</th>
                    <th>NEWS Category</th>
                    <th>NEWS Feature</th>
                    <th>News Status</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($alldata as $data)
                <tr>
                    <td>
                        @if (!empty($data->news_image))
                        <img class="img-fluid img" src="{{ asset('upload/news/'.$data->news_image) }}">
                        @else
                        <img class="img-fluid img" src="{{ asset('upload/avater.jpg') }}">
                        @endif
                    </td>
                    <td>{{ Str::words($data->news_title,5) }}</td>
                    <td>@if ($data->news_category==0)
                        <button type="button" class="btn btn-info w-lg waves-effect waves-light">No Category</button>
                        @else
                        <button type="button" class="btn btn-info w-sm waves-effect waves-light">{{ $data->categoryinfo->category_name }}</button>
                        @endif
                    </button>
                    </td>
                    <td> @if ($data->news_feature==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Feature On</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Feature Off</button>
                        @endif
                    </td>
                    <td>@if ($data->news_status==1)
                        <button type="button" class="btn btn-success w-lg waves-effect waves-light">Approved Post</button>
                        @else
                        <button type="button" class="btn btn-danger w-sm waves-effect waves-light">Pending Post</button>
                        @endif</td>
                    <td>
                    <div class="btn-group mb-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Manage <span class="caret"></span> </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('news_restore',$data->news_id) }}">Restore</a>
                                <a class="dropdown-item" href="{{ route('news_delete',$data->news_id) }}" data-bs-toggle="modal" data-bs-target="#dark-header-modal{{ $data->news_id }}">Delete</a>
                            </div>
                        </div>
                    </div>
                  </td>
                </tr>
                  <!-- /.modal -->
                  <div id="dark-header-modal{{ $data->news_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dark-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                                <h4 class="modal-title" id="dark-header-modalLabel">Warning</h4>
                            </div>
                            <div class="modal-body">
                                <h5 class="mt-0">Delete Alart</h5>
                                <p>Are You Sure To Delete <b>{{ $data->news_title }}</b>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                                <a href="{{ route('news_delete',$data->news_id) }}" class="btn btn-dark">Yes</a>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              @endforeach
            </tbody>
          </table>
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
    <!-- DataTables -->
    <link href="{{asset('backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
     <!-- Responsive datatable examples -->
     <link href="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('coustom_js')
           <!-- Required datatable js -->
           <script src="{{asset('backend')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
           <!-- Buttons examples -->
           <script src="{{asset('backend')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/jszip/jszip.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

           <!-- Responsive examples -->
           <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
           <script src="{{asset('backend')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

           <!-- Datatable init js -->
           <script src="{{asset('backend')}}/assets/js/pages/datatables.init.js"></script>
@endsection
