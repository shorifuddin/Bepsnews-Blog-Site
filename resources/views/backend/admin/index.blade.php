@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mini-stats-wid">
                    @php
                        $news = App\Models\Postnews::where('news_delete',1)->count();
                    @endphp
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="me-3">
                                <p class="text-muted mb-2">Total Post</p>
                                <h5 class="mb-0">{{ $news }}</h5> </div>
                            <div class="avatar-sm ms-auto">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-news"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card blog-stats-wid">
                 @php
                    $user = App\Models\user::where('user_status',1)->count();
                @endphp
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="me-3">
                                <p class="text-muted mb-2">Total Users</p>
                                <h5 class="mb-0">{{ $user }}</h5> </div>
                            <div class="avatar-sm ms-auto">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-group"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card blog-stats-wid">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="me-3">
                                <p class="text-muted mb-2">Pages</p>
                                <h5 class="mb-0">235</h5> </div>
                            <div class="avatar-sm ms-auto">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-message-square-dots"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card blog-stats-wid">
                    <div class="card-body">
                        <div class="d-flex flex-wrap">
                            <div class="me-3">
                                <p class="text-muted mb-2">Comments</p>
                                <h5 class="mb-0">4,235</h5> </div>
                            <div class="avatar-sm ms-auto">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-message-square-dots"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

@endsection
