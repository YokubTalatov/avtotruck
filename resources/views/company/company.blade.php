@extends('layout')
@section('begin')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="container-fluid">
                <div class="col-sm-12">
                    @if(session()->get('success'))
                      <div class="alert alert-success">
                        {{ session()->get('success') }}
                      </div>
                    @endif
                  </div>
                    <div>
                    <a style="margin: 19px;" href="{{ route('createcompany')}}" class="btn btn-primary">New company</a>
                    </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Company Tables</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-responsive-sm table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                            <tr>
                              <th class="text-center">№</th>
                              {{-- <th class="text-center">ID</th> --}}
                              <th>Name</th>
                              <th>Truck</th>
                              <th>Driver</th>
                              <th>Order</th>
                              <th colspan = 2>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($companies as $k => $company)
                            <tr>
                                <th class="text-center">{{ ++$k }}</th>
                                {{-- <td class="text-center">{{$company->id}}</td> --}}
                                <td>{{$company->name}}</td>
                                {{-- <td>{{$company->driver->name}}</td> --}}
                                <td>
                                    <a href="truck" class="m-0 font-weight-bold text-center">Truck</a>
                                </td>
                                <td>
                                    <a href="driver" class="m-0 font-weight-bold text-primary">Driver</a>
                                </td>
                                <td>
                                    <a href="order" class="m-0 font-weight-bold text-primary">Order</a>
                                </td>
                                <td>
                                    <form action="{{ route('deletecompany', $company->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                            <a href="{{ route('companyEdit', $company->id)}}" class="btn btn-primary btn-sm">Show</a>
                                            <a href="{{ route('companyEdit', $company->id)}}" class="btn btn-primary btn-sm ">Edit</a>
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
        </div>
@endsection
