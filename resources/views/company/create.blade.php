@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add a Company</h1>
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
         <form method="post" action="{{ route("companySave") }}">
             @csrf
             <div class="form-group">
                 <label for="first_name">Name:</label>
                 <input type="text" class="form-control" name="name"/>
             </div>
             <button type="submit" class="btn btn-primary">Add Company</button>
         </form>
     </div>
   </div>
   </div>
@endsection
