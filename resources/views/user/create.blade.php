@extends('layout')
@section('begin')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add a User</h1>
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
         <form method="post" action="{{ route("userSave") }}">
             @csrf
             <div class="form-group">
                <label for="first_name">Role_id:</label>
                <select name="roles" id="roles" class="form-control">
                    @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                <input type="text" class="form-control" name="username"  />
            </div>
            <div class="form-group">
                <label for="first_name">E-mail:</label>
                <input type="text" class="form-control" name="email"  />
            </div>
            <div class="form-group">
                <label for="first_name">Password:</label>
                <input type="text" class="form-control" name="passwor"/>
            </div>
            <div class="form-group">
                <label for="first_name">Telegram User Id:</label>
                <input type="text" class="form-control" name="telegramuserid"  />
            </div>

             <button type="submit" class="btn btn-primary">Add user</button>
         </form>
     </div>
   </div>
   </div>
@endsection
