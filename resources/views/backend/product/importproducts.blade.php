@extends('backend.layouts.master')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
        @include('backend.layouts.notification')
        </div>
    </div>

      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> Import Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <!-- <div style="margin-left:10px">
                    <a href="{{url('admin/exportMasterProducts')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip" data-placement="bottom" title="Select Data File"><i class="fas fa-download"></i> Export Product File</a>
                  </div> -->
                  <div style="margin-left:10px">
                    <a href="{{asset('sample/Product.xlsx')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip" data-placement="bottom" title="Download Sample File"><i class="fas fa-download"></i> Download Sample File</a>
                  </div>
                </ol>
            </div>
         </div>
      </div>

  <!-- <div class="card-header py-3">
    <a href="{{asset('sample/Product.xlsx')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip" data-placement="bottom" title="Download Sample File"><i class="fas fa-download"></i> Download Sample File</a>
  </div>
  <div class="card-header py-3">
    <a href="{{url('admin/exportMasterProducts')}}" class="btn btn-primary btn-sm float-left" data-toggle="tooltip" data-placement="bottom" title="Download Data File"><i class="fas fa-download"></i> Export File</a>
  </div> -->

  <br>
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <form method="post" action="{{url('admin/importProducts')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="file" class="col-form-label">Import Products </label>
                <div class="input-group">
                <input class="form-control" type="file" id="file" name="file" value="{{old('file')}}">
                </div>
            </div>

            <div class="form-group mb-3">
            <button class="btn btn-success" type="submit">Import</button>
            </div>
            <br>
        </form>
        </div>
    </div>
    </div>

@endsection



