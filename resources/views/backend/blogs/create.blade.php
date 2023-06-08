@extends('backend.layouts.master')

@section('main-content')

<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Add Blog</h5>
        <div class="card-body">
            <form method="post" action="{{route('blogs.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" placeholder=" Enter Meta Title"
                                value="{{old('meta_title')}}" class="form-control">
                            @error('meta_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Meta Description</label>
                            <input type="text" name="meta_description" id="meta_description"
                                placeholder=" Enter Meta Description" value="{{ old('meta_description') }}"
                                class="form-control">
                            @error('meta_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Meta Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" placeholder=" Enter Meta Keyword"
                                value="{{ old('meta_keyword') }}" class="form-control">
                            @error('meta_keyword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Canonical</label>
                            <input type="text" name="canonical" id="canonical" placeholder=" Enter Canonical"
                                value="{{ old('canonical') }}" class="form-control">
                            @error('canonical')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter Title"
                                value="{{ old('title') }}" class="form-control" required>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Tag</label>
                            <input type="text" name="tag" id="tag" placeholder=" EnterTag" value="{{ old('tag') }}"
                                class="form-control" required>
                            @error('tag')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="short_desc" class="form-label">Short Description</label>
                            <input type="text" name="short_desc" id="short_desc" placeholder=" Enter Short Description"
                                value="{{ old('short_desc') }}" class="form-control" required>
                            @error('short_desc')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea class="form-control" id="description"
                                name="description">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="thumbnail_image" class="form-label">Thumbnail Image</label>
                            <input type="file" name="thumbnail_image" id="thumbnail_image" class="form-control" required>
                            @error('thumbnail_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="images" name="image" required>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" placeholder="Enter Date"
                                value="{{ old('name') }}" class="form-control" required>
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Expert Speaks</label>
                            <div class="form-check form-check-primary">
                                <input type="checkbox" id="is_expert_speaks" name="is_expert_speaks"
                                    class="form-check-input" value="1">Is Expert Speaks ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fitness Trends & Updates</label>
                            <div class="form-check form-check-primary">
                                <input type="checkbox" id="is_trends" name="is_trends" class="form-check-input"
                                    value="1">Is Fitness Trends & Updates ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
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
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Submit</button>
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
        placeholder: "Write description.....",
        tabsize: 2,
        height: 150
    });
});
</script>
@endpush