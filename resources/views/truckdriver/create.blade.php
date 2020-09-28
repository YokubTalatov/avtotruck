@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add a Truck driver</h1>
     <div>
       @if ($errors->any())
         <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
           </ul>
         </div><br />
       @endif
         <form method="post" action="{{ route("truckdriversSave") }}">
             @csrf
             <div class="form-group">
                <label for="first_name">Driver_id:</label>
                <select name="drivers" id="drivers" class="form-control">
                    @foreach($drivers as $drive)
                <option value="{{ $drive->id }}">{{ $drive->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Truck_id:</label>
                <select name="truck_id" id="truck" class="form-control">
                    @foreach ($truck_ids as $truck_id)
                        <option value="{{ $truck_id->id }}">{{ $truck_id->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Date:</label>
                <input type="text" class="form-control" name="date"  />
            </div>
             <button type="submit" class="btn btn-primary">Add user</button>
         </form>
     </div>
   </div>
   </div>
@endsection
