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
                        <h2>Maklerin faizi</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @elseif(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('admin.home.makler_faiz', $home->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Broker Commission -->
                            <div class="form-group">
                                <label for="faiz_derecesi">Maklerin Komissiya Faizi (%)</label>
                                <input type="text" name="makler_faiz" class="form-control" value="{{ old('makler_faiz', $home->makler_faiz) }}">
                                <input type="hidden" name="sirketin_pulu" class="form-control" value="{{ old('sirketin_pulu', $home->sirketin_pulu) }}">
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