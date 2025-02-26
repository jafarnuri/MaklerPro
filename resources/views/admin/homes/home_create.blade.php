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
                        <h2>Yeni mənzil əlavə et</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


   <form action="{{route('admin.home_store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Title -->
    <div class="form-group">
        <label for="title">Başlıq</label>
        <input type="text" name="title" class="form-control" >
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Açıqlama</label>
        <textarea name="description" class="form-control" rows="3" ></textarea>
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Qiymət</label>
        <input type="text" name="price" class="form-control" step="0.01" >
    </div>

    <!-- Rooms & Bathrooms -->
    <div class="form-group">
        <label for="rooms">Otaq sayı</label>
        <input type="text" name="rooms" class="form-control" >
    </div>

    <div class="form-group">
        <label for="bathrooms">Hamam sayı</label>
        <input type="text" name="bathrooms" class="form-control" >
    </div>

    <!-- Area & Unit -->
    <div class="form-group">
        <label for="area">Sahə</label>
        <input type="text" name="area" class="form-control" >
    </div>

    <div class="form-group">
        <label for="area_unit">Sahə vahidi</label>
        <select name="area_unit" class="form-control">
            <option value="m²" selected>m²</option>
            <option value="ft²">ft²</option>
        </select>
    </div>

    <!-- Address -->
    <div class="form-group">
        <label for="address">Ünvan</label>
        <input type="text" name="address" class="form-control" >
    </div>

    <!-- House Type -->
    <div class="form-group">
        <label for="house_type">Evin tipi</label>
        <select name="house_type" class="form-control">
            <option value="heyet evi">Həyət evi</option>
            <option value="bina evi">Bina evi</option>
            <option value="bag evi">Bağ evi</option>
        </select>
    </div>

    <!-- Sale Type -->
    <div class="form-group">
        <label for="sale_type">Satış növü</label>
        <select name="sale_type" class="form-control">
            <option value="satiliq">Satılıq</option>
            <option value="kiraye">Kirayə</option>
        </select>
    </div>

    <!-- Broker Commission -->
    <div class="form-group">
        <label for="faiz_derecesi">Şirkətin Komissiya Faizi (%)</label>
        <input type="text" name="faiz_derecesi" class="form-control"  >
    </div>

    <!-- Gallery -->
    <div class="form-group">
        <label for="gallery">Qalereya Şəkilləri</label>
        <input type="file" name="gallery[]" multiple class="form-control">
    </div>

    <!-- Image -->
    <div class="form-group">
        <label for="image">Ana Şəkil</label>
        <input type="file" name="image" class="form-control">
    </div>

    <!-- Owner Name & Contact -->
    <div class="form-group">
        <label for="owner_name">Mənzil Sahibinin Adı</label>
        <input type="text" name="owner_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="owner_contact">Mənzil Sahibinin Əlaqə Nömrəsi</label>
        <input type="text" name="owner_contact" class="form-control">
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Yadda Saxla</button>
</form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection