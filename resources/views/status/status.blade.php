@extends('layout')
@section('begin')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="col-sm-12">
            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
          </div>

          <div>
            <a style="margin: 19px;" href="{{ route('createstatuses')}}" class="btn btn-primary">New status</a>
            </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-responsive-sm table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" width="50">№</th>
                          <th class="text-center">Id</th>
                          <th>Name</th>
                          <th colspan = 2>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statuses as $k => $status)
                        <tr>
                            <th class="text-center" width="50">{{ ++$k }}</th>
                            <td class="text-center" width="50">{{$status->id}}</td>
                            <td>{{$status->name}}</td>
                            <td>
                                <form action="{{ route('deletestatuses', $status->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                        <a href="{{ route('statusesEdit', $status->id)}}" class="btn btn-primary btn-sm">Show</a>
                                        <a href="{{ route('statusesEdit', $status->id)}}" class="btn btn-primary btn-sm ">Edit</a>
                                        <a href="#" onclick="this.closest('form').submit()" class="btn btn-primary btn-danger btn-sm "><i class="fas fa-trash"></i></a>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <p>No data found</p>
                        @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection
