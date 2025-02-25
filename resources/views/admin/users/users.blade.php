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
            <h2>Maklerler</h2>

            <div class="clearfix"></div>

            <div align="right">
              @if(auth()->check() && auth()->user()->role === 'admin')
              <a href="{{route('admin.register')}}"><button class="btn btn-success btn-xs">Yeni Makler Əlavə Et</button></a>
              @endif


            </div>
          </div>
          <div class="x_content">



            <br>
            <div class="alert alert-success">


            </div>



            <!-- Div İçerik Başlangıç -->
            <input type="hidden" {{$say = '1'}}>
            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
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
                  <th>Email</th>
               
                  <th>İcra</th>
                  
                </tr>
              </thead>

              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td width="20">{{$say}}</td>
                  <td>
                    <div class="image-container">
                      <img src="{{ Storage::url($user->image) }}" alt="Blog Image" class="custom-image" data-toggle="modal" data-target="#galleryModal{{$user->id}}">
                    </div>
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                 
                  <td class="">
                    <div class="button-wrapper">
                     
                      <a href="{{ route('admin.delete_user',$user->id ) }}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Item?')">Sil</a>
                      
                    </div>
                  </td>
                

                </tr>

                <input type="hidden" {{$say++}}>
                @endforeach
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