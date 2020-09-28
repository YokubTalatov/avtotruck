@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Driver</h1>
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
        <form method="post" action="{{ route('updatedrivers', $driver->id) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="first_name">Driver_type_id:</label>
                <select name="drivertypes" id="drivertype" class="form-control">
                    @foreach($driver_types as $driver_type)
                <option value="{{ $driver_type->id }}">{{ $driver_type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Comapany_id:</label>
                <select name="company_id" id="company" class="form-control">
                    @foreach ($company_ids as $company_id)
                        <option value="{{ $company_id->id }}">{{ $company_id->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="drivername" value="{{$driver->name}}"/>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
