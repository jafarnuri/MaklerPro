@extends('admin_layout.master')

@section('contect')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <br>
            <br>
            <h2>Mənim Profilim</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <br>
            <div class="alert alert-success">


            </div>

            <form action="{{ route('admin.profile_update', $users->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="name" name="name" value="{{ old('name', $users->name) }}" class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="email" id="email" name="email" value="{{ $users->email }}" class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <img src="{{ Storage::url($users->image) }}" alt="Profil Şəkili" style="max-width: 100%; height: auto;">
    </div>

    <div class="ln_solid"></div>

    <div class="form-group">
        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Yenilə</button>
        </div>
    </div>
</form>



          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->
@endsection