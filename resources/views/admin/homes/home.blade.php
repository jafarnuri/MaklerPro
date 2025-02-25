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
                        <h2>Mənzillər</h2>

                        <div class="clearfix"></div>

                        <div align="right">
                            <a href="{{route('admin.home_create')}}"><button class="btn btn-success btn-xs">Yeni Əlavə Et</button></a>
                        </div>
                    </div>
                    <div class="x_content">

                        <!-- Div İçerik Başlangıç -->
                        <input type="hidden" {{$say = 1}}>

                        <div class="table-responsive"> <!-- Bu div ilə cədvəli sürüşdürə biləcəyik -->
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @elseif(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Şəkil</th>
                                        <th>M.Ad</th>
                                        <th>Başlıq</th>
                                        <th>M.S</th>
                                        <th>Tel</th>
                                        <th>Üunvan</th>
                                        <th>Y.O</th>
                                        <th>H.O</th>
                                        <th>Sahə</th>
                                        <th>Növ</th>
                                        <th>Tip</th>
                                        <th>Qiymət</th>
                                        <th>M faizi</th>
                                        <th>M pulu</th>
                                        <th>Ş faizi</th>
                                        <th>Ş pulu</th>
                                        <th>Məlumat</th>
                                        <th>İcra</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($homes as $home)
                                    <tr>
                                        <td width="20">{{$say}}</td>
                                        <td>
                                            <div class="image-container">
                                                <img src="{{ Storage::url($home->image) }}" alt="Blog Image" class="custom-image" data-toggle="modal" data-target="#galleryModal{{$home->id}}">
                                            </div>
                                        </td>
                                        <td>{{$home->user->name}}</td>
                                        <td>{{$home->title}}</td>
                                        <td>{{$home->owner_name}}</td>
                                        <td>{{$home->owner_contact}}</td>
                                        <td>{{$home->address}}</td>
                                        <td>{{$home->rooms}}</td>
                                        <td>{{$home->bathrooms}}</td>
                                        <td>{{$home->area.$home->area_unit}}</td>
                                        <td>{{$home->house_type}}</td>
                                        <td>{{$home->sale_type}}</td>
                                        <td>{{$home->price}}</td>
                                        <td>{{$home->makler_faiz}}%</td>
                                        <td>{{$home->makler_pulu}}Azn</td>
                                        <td>{{$home->faiz_derecesi}}%</td>
                                        <td>{{$home->sirketin_pulu}}Azn</td>
                                        <td>
                                            <!-- Description textini göstərmək üçün Read More linki -->
                                            <a href="#" data-toggle="modal" data-target="#descriptionModal{{$home->id}}">Read More</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="descriptionModal{{$home->id}}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{$home->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="descriptionModalLabel{{$home->id}}">Description</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Tam description mətni burada göstəriləcək -->
                                                            <p>{{$home->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="">
                                            <div class="button-wrapper">
                                                <a href="{{ route('admin.home_edit', $home->id) }}" class="btn btn-info">Yenilə</a>
                                                <a href="{{ route('admin.home_delete', $home->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Item?')">Sil</a>
                                            </div>
                                        </td>


                                    </tr>

                                    <!-- Modal for Gallery -->
                                    <div class="modal fade" id="galleryModal{{$home->id}}" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel{{$home->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="galleryModalLabel{{$home->id}}">Galereya Şəkilləri</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($home->gallery->isNotEmpty())
                                                    @foreach ($home->gallery as $galleryImage)
                                                    <img src="{{ Storage::url($galleryImage->image) }}" alt="Gallery Image" class="img-fluid mb-3">
                                                    @endforeach
                                                    @else
                                                    <p>Bu evə aid qalereya şəkili yoxdur.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" {{$say++}}>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- table-responsive div end -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection