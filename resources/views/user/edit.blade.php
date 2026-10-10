@extends('layouts.index')
@section('content')
    


    <link rel="stylesheet" href={{asset('assets/bootstrap/css/bootstrap.min.css')}}>
    <script src={{ asset('assets/bootstrap/js/bootstrap.min.js') }}></script>
     <div class="container-fluid mt-4 m-5 mx-auto" style="max-width: 600px">
         <div class="card " style="width: 900px height:500px">
             <div class="card-body">
                     <h3>Edit User</h3>
                     @if ($errors->any())
                         <div class="alert alert-danger">
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{$error}}</li>
                                 @endforeach
                             </ul>
                         </div>
                         
                     @endif
                     <form action="{{route('user.update', $user->id)}}" method="POST">
                         @csrf
                         @method('PUT') 
                         <div class="mb-3">
                             <label for="username" class="form-label">Username</label>
                             <input type="text" class="form-control" id="username" name="username" value="{{old('username', $user->username)}}" required>
                         </div>
                         <div class="mb-3">
                             <label for="password" class="form-label">Password</label>
                             <input type="password" class="form-control" name="password" id="password" placeholder="kosongkan jiga tidak ingin mengubah password">
                             <small class="text-muted">Isi hanya jika ingin mengganti password lama</small>
                         </div> 
                         <div class="mb-3">
                             <label for="role" class="form-label">Role</label>
                             <select name="role" id="role" class="form-select">
                                 <option value="Admin" {{old('role', $user->role) == 'Admin' ? 'selected' : ''}}>admin</option>
                                 <option value="operator" {{old('role', $user->role) == 'Operator' ? 'selected' : ''}}>operator</option>
                             </select>
                         </div>
                         <button type="submit" class="btn btn-primary">Update</button>
                         <a href="{{route('user.index')}}" class="btn btn-secondary">Kembali</a>
             
                     </form>
                 
     
             </div>
     
         </div>


     </div>

@endsection