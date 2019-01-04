@extends('admin.master')
@section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Danh sách keyword<small></small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
             
            
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Tags</th>
                          <th>No.Post</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($keyword as $key => $item) 
                          
                            <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item['keyword'] }}</td>
                            <td>{{$countPost[$item['keyword']]}}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                @if($item['status'] == 1)
                                    <a href="{{ route('get.DisableKeyWord',$item['id']) }}" class="btn btn-info btn-xs"><i class="fa fa-ban"></i> Disable </a>
                                @elseif($item['status'] == 0)
                                    <a href="{{ route('get.ActiveKeyWord',$item['id']) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Active </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                @endif

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
