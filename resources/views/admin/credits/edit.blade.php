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
      <a href="/admin/credit"
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
          <form class="form-horizontal form-material mx-2" action="/admin/credit/{{ $arrays->id }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label class="col-md-12">Game ID</label>
              <div class="col-md-12">
                <select name="game_id" id="game_id" class="form-control form-control-line @error('game_id') is-invalid @enderror">
                  @foreach ($games as $item)
                    <option value="{{ $item->id }}" {{ ($arrays->game_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                  @endforeach
                </select>
                @error('game_id')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Information</label>
              <div class="col-md-12">
                <input type="text" name="information" placeholder="Diamond - 100" class="form-control form-control-line @error('information') is-invalid @enderror" id="information" value="{{ $arrays->information }}">
                @error('information')
                  <span class="invalid-feedback" name="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12">Price</label>
              <div class="col-md-12">
                <input type="number" name="price" placeholder="100000" class="form-control form-control-line @error('price') is-invalid @enderror" id="price" value="{{ $arrays->price }}">
                @error('price')
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