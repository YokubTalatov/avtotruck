@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add a Truck</h1>
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
         <form method="post" action="{{ route("truckSave") }}">
             @csrf
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
                <input type="text" class="form-control" name="truckname"  />
            </div>
            <div class="form-group">
                <label for="first_name">Plate number:</label>
                <input type="text" class="form-control" name="platenumber"  />
            </div>
            <div class="form-group">
                <label for="first_name">Info:</label>
                <input type="text" class="form-control" name="info"/>
            </div>

             <button type="submit" class="btn btn-primary">Add truck</button>
         </form>
     </div>
   </div>
   </div>
@endsection
