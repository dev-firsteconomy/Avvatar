@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
<div class="card">
    <h5 class="card-header">Edit State</h5>
    <div class="card-body">
      <form method="post" action="{{route('cities.update',$city->id)}}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="state_id" class="col-form-label">States  <span class="text-danger">*</span></label>
            <select name="state_id" class="form-control">
              <option value="">Select State</option>
              @foreach ($states as $state_id => $state )
                <option {{ $state->id }}" {{isset($city) && $city->state_id == $state->id ? 'selected' : '' }} value="{{$state_id}}">{{$state->name }}</option>
              @endforeach
            </select>
            @error('state_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
          <label for="name" class="col-form-label">City <span class="text-danger">*</span></label>
          <input id="name" type="text" name="name" placeholder="Enter State Name"  value="{{$city->name}}" class="form-control">
            @error('name')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>        

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="1" {{$city->status == 1 ? 'selected':''}}>Active</option>
              <option value="0" {{$city->status == 0 ? 'selected':''}}>Inactive</option>
          </select>
          @error('status')
             <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
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
