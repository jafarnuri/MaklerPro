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
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nömrə</th>
                                        <th>Şəkil</th>
                                        <th>Ümumi Şəkillər</th>
                                        <th>Status</th>
                                        <th>Makler Ad</th>
                                        <th>Başlıq</th>
                                        <th>Sahibkar</th>
                                        <th>Telefon</th>
                                        <th>Adress</th>
                                        <th>Otaq sayı</th>
                                        <th>Hamam otağı</th>
                                        <th>Sahəsi</th>
                                        <th>Növ</th>
                                        <th>Kateqoriya</th>
                                        <th>Qiymət</th>
                                        <th>Makler faizi</th>
                                        <th>Makler pulu</th>
                                        <th>Ümumi məlumat</th>
                                        <th>Əməliyyatlar</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   @foreach ($homes as $home)
                                    <tr>
                                        <td width="20">{{$say}}</td>
                                        <td><img src="{{ Storage::url($home->image) }}" alt="Blog Image" class="custom-image"> </td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#galleryModal{{$home->id}}">Galereya</button>
                                        </td>
                                        <td>
    @if($home->status == 'qalir')
        <span class="badge badge-success">Qalır</span>
    @elseif($home->status == 'satildi')
        <span class="badge badge-danger">Satıldı</span>
    @elseif($home->status == 'verildi')
        <span class="badge badge-primary">İcarəyə Verildi</span>
  
    @endif
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
                                        <td>{{$home->faiz_derecesi}}%</td>
                                        <td>{{$home->makler_pulu}}Azn</td>
                                        <td>{{$home->description}}</td>
                                        <td class="action-column">
                                            <a href="" class="btn btn-info">Yenilə</a>
                                            <a href="" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Item?')">Sil</a>
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
