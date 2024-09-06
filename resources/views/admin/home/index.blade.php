@extends('admin.layouts.main')


@section('content')
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">{{ $title }}</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </div>
    <div class="col-md-7 align-self-center">
      <a href="/admin/user/change_password"
        class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down text-white"> Ubah Password</a>
    </div>
  </div>
  
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body">
          <center class="mt-4">
            @if (Auth::user()->photo == null)  
              <img src="{{ asset('assets/images/users/1.jpg') }}" class="img-circle" width="150" />
            @else
              <img src="{{ asset('storage/'.Auth::user()->photo) }}" class="img-circle" width="150" />
            @endif
            <h4 class="card-title mt-2">{{ Auth::user()->name }}</h4>
            <h6 class="card-subtitle">Accoubts Type {{ Auth::user()->role->role }}</h6>
            <div class="row text-center justify-content-md-center">
              <div class="col-4"><a href="javascript:void(0)" class="link"><i
                class="fa fa-user"></i>
                <font class="font-medium">254</font>
                </a>
              </div>
              <div class="col-4"><a href="javascript:void(0)" class="link"><i
                class="fa fa-camera"></i>
                <font class="font-medium">54</font>
                </a>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <!-- Tab panes -->
        <div class="card-body">
          
          @if(session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
          @if(session('danger'))
            <div class="alert alert-danger">
              {{session('danger')}}
            </div>
          @endif

          <form class="form-horizontal form-material mx-2" action="/admin/update_profile" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12">Full Name</label>
              <div class="col-md-12">
                <input type="text" placeholder="Johnathan Doe"
                  class="form-control form-control-line" value="{{ Auth::user()->name }}" name="name">
              </div>
            </div>
            <div class="form-group">
              <label for="example-email" class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" placeholder="johnathan@admin.com"
                  class="form-control form-control-line" name="email"
                  id="example-email" value="{{ Auth::user()->email }}" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="example-join" class="col-md-12">Join At</label>
              <div class="col-md-12">
                <input type="text" placeholder="johnathan@admin.com"
                  class="form-control form-control-line" name="join"
                  id="example-join" value="{{ Auth::user()->created_at }}" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="example-file" class="col-md-12">file At</label>
              <div class="col-md-12">
                <input type="file"
                  class="form-control form-control-line" name="photo"
                  id="example-file" value="{{ Auth::user()->photo }}">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Update Profile</button>
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