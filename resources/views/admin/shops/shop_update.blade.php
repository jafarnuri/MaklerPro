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
                        <h2>Obyekt Yenilə</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form action="{{ route('admin.shop_update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Başlıq</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $shop->title) }}">
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Açıqlama</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description', $shop->description) }}</textarea>
                            </div>

                            <!-- Price -->
                            <div class="form-group">
                                <label for="price">Qiymət</label>
                                <input type="text" name="price" class="form-control" step="0.01" value="{{ old('price', $shop->price) }}">
                            </div>

                            <!-- Area & Unit -->
                            <div class="form-group">
                                <label for="area">Sahə</label>
                                <input type="text" name="area" class="form-control" value="{{ old('area', $shop->area) }}">
                            </div>

                            <div class="form-group">
                                <label for="area_unit">Sahə vahidi</label>
                                <select name="area_unit" class="form-control">
                                    <option value="m²" {{ $shop->area_unit == 'm²' ? 'selected' : '' }}>m²</option>
                                    <option value="ft²" {{ $shop->area_unit == 'ft²' ? 'selected' : '' }}>ft²</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Ünvan</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $shop->address) }}">
                            </div>


                            <!-- Sale Type -->
                            <div class="form-group">
                                <label for="sale_type">Satış növü</label>
                                <select name="sale_type" class="form-control">
                                    <option value="sale" {{ $shop->sale_type == 'sale' ? 'selected' : '' }}>Satılıq</option>
                                    <option value="rent" {{ $shop->sale_type == 'rent' ? 'selected' : '' }}>Kirayə</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="qalir" {{ $shop->status == 'qalir' ? 'selected' : '' }}>Qalir</option>
                                    <option value="satildi" {{ $shop->status == 'satildi' ? 'selected' : '' }}>Satildi</option>
                                    <option value="verildi" {{ $shop->status == 'verildi' ? 'selected' : '' }}>Verildi</option>
                                </select>
                            </div>

                            <!-- Broker Commission -->
                            <div class="form-group">
                                <label for="faiz_derecesi">Şirkətin Komissiya Faizi (%)</label>
                                <input type="text" name="faiz_derecesi" class="form-control" value="{{ old('faiz_derecesi', $shop->faiz_derecesi) }}">
                            </div>

                            <!-- Gallery -->
                            <div class="form-group">
                                <label for="gallery">Qalereya Şəkilləri</label>
                                <input type="file" name="gallery[]" multiple class="form-control">
                                @if($shop->gallery->isNotEmpty())
                                <div class="gallery-container">
                                    @foreach ($shop->gallery as $galleryImage)
                                    <div class="gallery-item">
                                        <img src="{{ Storage::url($galleryImage->image) }}" alt="Gallery Image" class="img-fluid">

                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <p>Bu evə aid qalereya şəkili yoxdur.</p>
                                @endif
                            </div>


                            <!-- Image -->
                            <div class="form-group">
                                <label for="image">Ana Şəkil</label>
                                <input type="file" name="image" class="form-control">
                                @if($shop->image)
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ Storage::url($shop->image) }}" alt="Ana Shekil" style="max-width: 100%; height: auto;">
                                </div>
                                @endif
                            </div>

                            <!-- Owner Name & Contact -->
                            <div class="form-group">
                                <label for="owner_name">Obtekt Sahibinin Adı</label>
                                <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name', $shop->owner_name) }}">
                            </div>

                            <div class="form-group">
                                <label for="owner_contact">Obtekt Sahibinin Əlaqə Nömrəsi</label>
                                <input type="text" name="owner_contact" class="form-control" value="{{ old('owner_contact', $shop->owner_contact) }}">
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

<style>
    .gallery-container {
        display: flex;
        /* Şəkilləri soldan sağa düzür */
        flex-wrap: wrap;
        /* Əgər çox şəkil varsa, növbəti sətrə keçsin */
        gap: 10px;
        /* Şəkillər arasında boşluq */
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
        top: 5px;
        /* Yuxarı küncdə */
        right: 5px;
        /* Sağ küncdə */
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