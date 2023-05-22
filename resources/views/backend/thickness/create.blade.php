@extends('backend.layouts.master')
@section('title','ROYALE TOUCHE || Thickness Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Thickness</h5>
    <div class="card-body">
      <form method="post" action="{{route('thickness.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Thickness <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="thickness" placeholder="Enter Thickness"  value="{{old('thickness')}}" class="form-control">
          @error('thickness')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="name" placeholder="Enter Title"  value="{{old('name')}}" class="form-control">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>


        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sort Number <span class="text-danger">*</span></label>
          <input id="inputTitle" type="number" name="sort_order" placeholder="Enter Name"  value="{{old('sort_order')}}" class="form-control">
          @error('sort_order')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>



                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Photo</label>
                            <div class="input-group">
                                {{-- <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span> --}}
                            <input id="thumbnail" class="form-control" type="file" name="icon_tag" value="{{old('icon_tag')}}">
                          </div>
                        </div>
        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
