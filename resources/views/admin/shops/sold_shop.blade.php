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
                        <h2>Satılmış Obyektlər</h2>

                        <div class="clearfix"></div>

                        <div align="right">
                            <a href="{{route('admin.shop_create')}}"><button class="btn btn-success btn-xs">Yeni Əlavə Et</button></a>
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
                                        <th>Sahə</th>
                                        <th>Tip</th>
                                        <th>Qiymət</th>
                                        <th>M faizi</th>
                                        <th>M pulu</th>
                                        <th>Ş faizi</th>
                                        <th>Ş pulu</th>
                                        <th>Məlumat</th>
                                        <th>icra</th>

                                    </tr>
                                </thead>

                                <tbody>


                                    @if($shop->isEmpty())
                                    <tr>
                                        <td colspan="14" class="text-center">Obyekt yoxdur</td>
                                    </tr>
                                    @else
                                    @foreach ($shop as $shops)
                                    <tr>
                                        <td width="20">{{$say}}</td>
                                        <td>
                                            <div class="image-container">
                                                <img src="{{ Storage::url($shops->image) }}" alt="Blog Image" class="custom-image" data-toggle="modal" data-target="#galleryModal{{$shops->id}}">
                                            </div>
                                        </td>
                                        <td>{{$shops->user->name}}</td>
                                        <td>{{$shops->title}}</td>
                                        <td>{{$shops->owner_name}}</td>
                                        <td>{{$shops->owner_contact}}</td>
                                        <td>{{$shops->address}}</td>
                                        <td>{{$shops->area.$shops->area_unit}}</td>
                                        <td>{{$shops->sale_type}}</td>
                                        <td>{{$shops->price}}</td>
                                        <td>{{$shops->makler_faiz}}%</td>
                                        <td>{{$shops->makler_pulu}}Azn</td>
                                        <td>{{$shops->faiz_derecesi}}%</td>
                                        <td>{{$shops->sirketin_pulu}}Azn</td>
                                        <td>
                                            <!-- Description textini göstərmək üçün Read More linki -->
                                            <a href="#" data-toggle="modal" data-target="#descriptionModal{{$shops->id}}">Read More</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="descriptionModal{{$shops->id}}" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel{{$shops->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="descriptionModalLabel{{$shops->id}}">Description</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Tam description mətni burada göstəriləcək -->
                                                            <p>{{$shops->description}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @if (empty($shops->makler_pulu) || $shops->makler_pulu === 0)
                                        <td class="">
                                            <div class="button-wrapper">
                                                <a href="{{ route('admin.shop_makler_faiz', $shops->id) }}" class="btn btn-info">Makler Faizi </a>

                                            </div>
                                        </td>
                                        @endif

                                    </tr>

                                    <!-- Modal for Gallery -->
                                    <div class="modal fade" id="galleryModal{{$shops->id}}" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel{{$shops->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="galleryModalLabel{{$shops->id}}">Galereya Şəkilləri</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if($shops->gallery->isNotEmpty())
                                                    @foreach ($shops->gallery as $galleryImage)
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
                                    @endif
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