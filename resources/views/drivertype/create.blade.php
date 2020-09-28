@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add a Driver Type</h1>
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
         <form method="post" action="{{ route("drivertypesSave") }}">
             @csrf
            <div class="form-group">
                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="drivertypename"  />
            </div>

             <button type="submit" class="btn btn-primary">Add Driver Type</button>
         </form>
     </div>
   </div>
   </div>
@endsection
