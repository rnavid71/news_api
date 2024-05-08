@extends('layouts.admin.admin-layout')
@section('title','APINews')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">APINews</h1>
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
                    <div class="col-md-12">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">News API Latest News</h3>
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
                                            <th>action</th>
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
                                                <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#{{$newsapi_item->id}}">
                                                        Edit
                                                    </button></td>
                                            </tr>
                                            {{--Modal--}}
                                            <div class="modal fade" id="{{$newsapi_item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header ltr">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Title & Description</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('update-newsapi',$newsapi_item)}}" method="post">
                                                            @csrf
                                                            <div class="modal-body form-group">
                                                                <textarea class="form-control ltr" type="text" name="title">{{$newsapi_item->title}}</textarea>
                                                                <textarea class="form-control ltr mt-3" type="text" name="description" rows="5">{{$newsapi_item->description}}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success ml-2">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="my-2" style="display: flex; justify-content: space-around;">
                                @if ($newsapi->hasMorePages())
                                    <a href="{{ $newsapi->nextPageUrl() }}" class="btn btn-primary">Next Page</a>
                                @endif

                                @if ($newsapi->currentPage() > 1)
                                    <a href="{{ $newsapi->previousPageUrl() }}" class="btn btn-secondary">Previous Page</a>
                                @endif
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
