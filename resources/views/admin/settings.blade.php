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
            <h2>Parametrler</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

          <form action="{{ route('admin.setting_update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div class="form-group">
        <label for="title">Başlıq</label>
        <input type="text" name="title" class="form-control" value="{{ old('title',$setting->name ) }}">
    </div>


    <!-- Title -->
    <div class="form-group">
        <label for="title">Aciqlama</label>
        <input type="text" name="footer" class="form-control" value="{{ old('footer',$setting->footer) }}">
    </div>





  <!-- Image -->
<div class="form-group">
    <label for="image">Logo</label>
    <input type="file" name="image" class="form-control">
    @if($setting->image)
          <div class="col-md-6 col-sm-6 col-xs-12">
          <img src="{{ Storage::url($setting->image) }}" alt="Logo" style="max-width: 100%; height: auto;">
          </div>
        @endif
</div>


    <button type="submit" class="btn btn-primary">Yadda Saxla</button>
</form>


          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->

<style>
  .gallery-container {
    display: flex; /* Şəkilləri soldan sağa düzür */
    flex-wrap: wrap; /* Əgər çox şəkil varsa, növbəti sətrə keçsin */
    gap: 10px; /* Şəkillər arasında boşluq */
}

.gallery-item {
    position: relative;
    display: inline-block;
}

.gallery-item img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 5px;
}

.delete-btn {
    position: absolute;
    top: 5px; /* Yuxarı küncdə */
    right: 5px; /* Sağ küncdə */
    background: red;
    color: white;
    border: none;
    padding: 2px 6px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 50%;
    transition: 0.3s;
}

.delete-btn:hover {
    background: darkred;
}

</style>

@endsection