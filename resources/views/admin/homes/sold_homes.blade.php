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
                        <h2>Satılmış Mənzillər</h2>

                        <div class="clearfix"></div>

                        <div align="right">
                            <a href="{{route('admin.home_create')}}"><button class="btn btn-success btn-xs">Yeni Əlavə Et</button></a>
                           

                        </div>
                    </div>
                    <div class="x_content">




                        <!-- Div İçerik Başlangıç -->
                        <input type="hidden" {{$say = '1'}}>

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                    <th>Nömrə</th>
                                    <th>Şəkil</th>
                                    <th>Ümumi Şəkillər</th>
                                    <th>Makler Ad</th>
                                    <th>Başlıq</th>
                                    <th>Sahibkar</th>
                                    <th>Telefon</th>
                                    <th>Adress</th>
                                    <th>Növ</th>
                                    <th>Kateqoriya</th>
                                    <th>Qiymət</th>
                                    <th>Makler faizi</th>
                                    <th>Makler pulu</th>
                                    <th>Ümumi məlumat</th>
                                    
                                </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td width="20"></td>
                                <td><img src="" alt="Blog Image" class="custom-image"> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                </tr>


  
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection