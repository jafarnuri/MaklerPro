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
            <h2>Mənzili Yenilə</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="" method="POST" id="demo-form2"
              enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="title" value=""
                    class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="content" value=""
                    class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="description" value=""
                    class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Author
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="author" value=""
                    class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name" name="image" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Passive</option>
                                    </select>

                                </div>
                            </div>

 

              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="" class="btn btn-success">Update</button>
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