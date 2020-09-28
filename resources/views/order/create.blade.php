@extends('layout')
@section('begin')

<div class="container-fluid">
@if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
           </ul>
         </div><br />
       @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="h3">Add a Order</h1>
                        </div>
                            <div class="card-body">
                                <form method="post" class="form-row" action="{{ route("ordersSave") }}">
                                    @csrf
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">User_id:</label>
                                        <select name="users" id="users" class="form-control">

                                          {{-- {{ $orders = App\Models\User::find(1)->orders }} --}}

                                            @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="first_name">Source:</label>
                                        <input type="text" class="form-control" name="source"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">From_location:</label>
                                        <input type="text" class="form-control" name="from_location"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">To_location:</label>
                                        <input type="text" class="form-control" name="to_location"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">Pickup_time:</label>
                                        <input type="text" class="form-control" name="pickup_time"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">Weight:</label>
                                        <input type="text" class="form-control" name="weight"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">Load_number:</label>
                                        <input type="text" class="form-control" name="load_number"  />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Order</button>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first_name">Status_id:</label>
                                            <select name="status_id" id="status" class="form-control">
                                                @foreach ($status_ids as $status_id)
                                                    <option value="{{ $status_id->id }}">{{ $status_id->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">From:</label>
                                            <input type="text" class="form-control" name="from"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">To:</label>
                                            <input type="text" class="form-control" name="to"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Commodity:</label>
                                            <input type="text" class="form-control" name="commodity"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Drive_price:</label>
                                            <input type="text" class="form-control" name="drive_price"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="first_name">Bol_image:</label>
                                            <input type="text" class="form-control" name="bol_image"  />
                                        </div>

                                    </div>
                                </form>
                            </div>
                    </div>
            </div>
            </div>
</div>

@endsection
