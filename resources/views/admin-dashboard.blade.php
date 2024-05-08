@extends('layouts.admin.admin-layout')
@section('title','داشبورد')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اخبار</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-6">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">News API Latest News</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>author</th>
                                        <th>source</th>
                                        <th>url</th>
                                        <th>publish date</th>
                                        <th>update date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($newsapi as $newsapi_item)
                                        <tr>
                                            <td>{{$newsapi_item->title}}</td>
                                            <td>{{$newsapi_item->author}}</td>
                                            <td><span class="badge badge-warning">{{$newsapi_item->source}}</span></td>
                                            <td><a href="{{$newsapi_item->url}}">Link</a></td>
                                            <td>{{\Carbon\Carbon::parse($newsapi_item->published_at)->format("Y-m-d")}}</td>
                                            <td>{{\Carbon\Carbon::parse($newsapi_item->updated_at)->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">See all</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- Right col -->
                <div class="col-md-6">
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Guardian Latest News</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-widget="remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>type</th>
                                        <th>section name</th>
                                        <th>url</th>
                                        <th>publish date</th>
                                        <th>update date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($guardian as $guardian_item)
                                        <tr>
                                            <td>{{$guardian_item->title}}</td>
                                            <td>{{$guardian_item->type}}</td>
                                            <td><span class="badge badge-success">{{$guardian_item->section_name}}</span></td>
                                            <td><a href="{{$guardian_item->url}}">Link</a></td>
                                            <td>{{\Carbon\Carbon::parse($guardian_item->published_at)->format("Y-m-d")}}</td>
                                            <td>{{\Carbon\Carbon::parse($guardian_item->updated_at)->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">See all</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
