@extends('layout')
@section('begin')


 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-10">All</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">75</div>
              </div>
              {{-- <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div> --}}
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">On processing</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Finished</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
              </div>
              {{-- <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div> --}}
            </div>
          </div>
        </div>
      </div>

       <!-- Orders without BOL -->
       @if (auth()->user()->roles->name != "admin")
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-danger shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Orders without BOL</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
               </div>
               {{-- <div class="col-auto">
                 <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
               </div> --}}
             </div>
           </div>
         </div>
       </div>
       @endif

    <!-- Page Heading -->
    <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
      </div>

      <div>
        <a style="margin: 19px;" href="{{ route('createorders')}}" class="btn btn-primary">New Order</a>
        </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Order Table </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-responsive-sm table-sm table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th class="text-center" width="50">№</th>
                    <th class="text-center">ID</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Source</th>
                  <th>From</th>
                  <th>From_location</th>
                  <th>To</th>
                  <th>To_location</th>
                  <th>Pickup_time</th>
                  <th>Commodity</th>
                  <th>Weight</th>
                  <th>Drive_price</th>
                  <th>Load_number</th>
                  <th>Bol_image</th>
                  <th colspan = 1>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $k => $order)
                <tr>
                    <th class="text-center" width="50">{{ ++$k }}</th>
                    <td  class="text-center" width="50">{{$order->id}}</td>
                    @isset($order->user->name)
                    @if ($order->user->name == "Dispatcher")
                    <td>{{$order->user->name}}</td>
                    @endif
                    @endisset
                    @isset($order->status->name)
                    <td class="text-success">{{$order->status->name}}</td>
                    @endisset
                    <td>{{$order->source}}</td>
                    <td>{{$order->from}}</td>
                    <td>{{$order->from_location}}</td>
                    <td>{{$order->to}}</td>
                    <td>{{$order->to_location}}</td>
                    <td>{{$order->pickup_time}}</td>
                    <td>{{$order->commodity}}</td>
                    <td>{{$order->weight}}</td>
                    <td>{{$order->drive_price}}</td>
                    <td>{{$order->load_number}}</td>
                    <td>{{$order->bol_image}}</td>
                    <td>
                        <form action="{{ route('deleteorders', $order->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                            <a href="{{ route('ordersEdit', $order->id)}}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('ordersEdit', $order->id)}}" class="btn btn-primary btn-sm ">Edit</a>
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
