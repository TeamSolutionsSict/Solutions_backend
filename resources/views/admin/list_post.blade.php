@extends('admin.master')
@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Danh sách user<small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tất cả<small>Users</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên bài post</th>
                          <th>Người post</th>
                          <th>Views</th>
                          <th>Votes</th>
                          <th>Comments</th>
                          <th>Ngày post</th>
                          <th>Action</th>
                           <th>Keyword</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($post as $key=>$value)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{substr($value['title'],0,80)}}</td>
                          <td>{{$value['username']}}</td>
                          <td>{{$value['view']}}</td>
                          <td>{{$value['votes']}}</td>
                          <td>{{$value['num_comment']}}</td>
                          <td>{{$value['timepost']}}</td>
                          <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                @if($value['status'] == 1)
                                    <a href="{{ route('get.DisablePost',$value['id']) }}" class="btn btn-info btn-xs"><i class="fa fa-ban"></i> Disable </a>
                                @elseif($value['status'] == 0)
                                    <a href="{{ route('get.ActivePost',$value['id']) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Active </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                @endif
                            </td>
                          <td>@foreach($value['keyWordName'] as $val)
                                <span class="label label-success">{{$val}}</span>
                              @endforeach
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection
