@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Order</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('updateuser', $order->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="first_name">User_id:</label>
                <select name="users" id="users" class="form-control">
                    @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Status_id:</label>
                <select name="status_id" id="status" class="form-control">
                    @foreach ($status_ids as $status_id)
                        <option value="{{ $status_id->id }}">{{ $status_id->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="first_name">Source:</label>
                <input type="text" class="form-control" name="source"  />
            </div>
            <div class="form-group">
                <label for="first_name">From:</label>
                <input type="text" class="form-control" name="from"  />
            </div>
            <div class="form-group">
                <label for="first_name">From_location:</label>
                <input type="text" class="form-control" name="from_location"  />
            </div>
            <div class="form-group">
                <label for="first_name">To:</label>
                <input type="text" class="form-control" name="to"  />
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
                <label for="first_name">Commodity:</label>
                <input type="text" class="form-control" name="commodity"  />
            </div>
            <div class="form-group">
                <label for="first_name">Weight:</label>
                <input type="text" class="form-control" name="weight"  />
            </div>
            <div class="form-group">
                <label for="first_name">Drive_price:</label>
                <input type="text" class="form-control" name="drive_price"  />
            </div>
            <div class="form-group">
                <label for="first_name">Load_number:</label>
                <input type="text" class="form-control" name="load_number"  />
            </div>
            <div class="form-group">
                <label for="first_name">Bol_image:</label>
                <input type="text" class="form-control" name="bol_image"  />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
