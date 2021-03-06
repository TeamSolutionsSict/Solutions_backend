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
                          <th>STT</th>
                          <th>Avatar</th>
                          <th>Tên</th>
                          <th>email</th>
                          <th>Phone</th>
                          <th>Số post</th>
                          <th>Số status </th>
                          <th>Level</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($user as $key=>$value)
                        <tr>
                          <td>{{$key}}</td>
                          <td><img class="img-responsive" src="{{url('avatar')}}"></td>
                          <td>{{$value['username']}}</td>
                           <td>{{$value['email']}}</td>
                          <td>{{$value['phone']}}</td>
                          <td>{{$value['num_post']}}</td>
                          <td>{{$value['num_comment']}}</td>
                          <td>
                            @if($value['level']==1)
                               <span class="badge badge-secondary">USER</span>
                            @elseif ($value['level']==2)
                                <span class="badge badge-success">ADMIN</span>
                            @endif
                          </td>
                          <td> @if($value['status'] == 1)
                                    <a href="{{ route('get.DisableUser',$value['id']) }}" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> BAN </a>
                                @elseif($value['status'] == 0)
                                    <a href="{{ route('get.ActiveUser',$value['id']) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Active </a>
                                @endif</td>
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