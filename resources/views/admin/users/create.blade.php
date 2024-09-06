@extends('admin.layouts.main')


@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">{{ $title }}</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </div>
    <div class="col-md-7 align-self-center">
      <a href="/admin/user"
        class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Kembali</a>
    </div>
  </div>
  
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-9 col-md-7">
      <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" action="/admin/user" method="post">
            @csrf
            
            <div class="form-group mb-3">
              <label class="col-md-12">Name User</label>
              <div class="col-md-12">
                <input type="text" placeholder="Type Here"
                  class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                
                @error('name')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" placeholder="Type Here"
                  class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                
                @error('email')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Role</label>
              <div class="col-md-12">
                <select name="role_id" id="role_id" class="form-control form-control-line @error('role_id') is-invalid @enderror">
                  @foreach ($roles as $row)
                    <option value="{{ $row->id }}" {{ (old('role_id') == $row->id) ? 'selected' : '' }}>{{ $row->role }}</option>
                  @endforeach
                </select>
                
                @error('role')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label class="col-md-6">Password</label>
                <input type="password" placeholder="Type Here"
                  class="form-control form-control-line @error('password') is-invalid @enderror" name="password">
                
                @error('password')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="col-md-6">
                <label class="col-md-6">Confirm Password</label>
                <input type="password" placeholder="Type Here"
                  class="form-control form-control-line @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                
                @error('password_confirmation')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
  
</div>
@endsection