@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Edit Blog</h5>
        <div class="card-body">
            <form method="post" action="{{route('blogs.update',$blog->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" placeholder=" Enter Meta Title"
                                value="{{ old('meta_title') ? old('meta_title') : $blog->meta_title }}"
                                class="form-control">
                            @error('meta_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Meta Description</label>
                            <input type="text" name="meta_description" id="meta_description"
                                placeholder=" Enter Meta Description"
                                value="{{ old('meta_description') ? old('meta_description') : $blog->meta_description }}"
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
                                value="{{ old('meta_keyword') ? old('meta_keyword') : $blog->meta_keyword }}"
                                class="form-control">
                            @error('meta_keyword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Canonical</label>
                            <input type="text" name="canonical" id="canonical" placeholder=" Enter Canonical"
                                value="{{ old('canonical') ? old('canonical') : $blog->canonical }}"
                                class="form-control">
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
                                value="{{ old('title') ? old('title') : $blog->title }}" class="form-control" required>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Tag</label>
                            <input type="text" name="tag" id="tag" placeholder=" EnterTag"
                                value="{{ old('tag') ? old('tag') : $blog->tag }}" class="form-control" required>
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
                                value="{{ old('short_desc') ? old('short_desc') : $blog->short_desc }}"
                                class="form-control" required>
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
                                name="description">{{ old('description') ? old('description') : $blog->description }}</textarea>
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
                            @if(isset($blog))
                            <img src="{{ asset($blog->thumbnail_image) }}" alt="image"
                                style="height:80px; width: 60px;">
                            @endif
                            <input type="file" name="thumbnail_image" id="thumbnail_image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            @if(isset($blog))
                            <img src="{{ asset($blog->image) }}" alt="image" style="height:80px; width: 60px;">
                            @endif
                            <input class="form-control" type="file" id="images" name="image">
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="related_blogs" class="col-form-label">Select Blog <span class="text-danger">*</span></label>
                        <select name="related_blogs[]" id="related_blogs" class="form-control related_blogsClass"
                            multiple>
                            @foreach($related_blogs as $key=>$blog)
                            <option value="{{$blog->id}}" {{ !empty($relatedBlogsList) && in_array($blog->id, $relatedBlogsList) ? 'selected':'' }} >{{$blog->title}}</option>
                            @endforeach
                        </select>
                        @error('related_blogs')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label><span class="text-danger">*</span>
                            <input type="date" name="date" id="date" placeholder="Enter Date"
                                value="{{ old('date') ? old('date') : $blog->date }}" class="form-control" required>
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Is Popular</label>
                            <div class="form-check form-check-primary">
                                <input type="checkbox" id="is_popular" name="is_popular" class="form-check-input"
                                    value="1" {{ isset($blog) && $blog->is_popular == 1 ? 'checked' : '' }}>Is Popular ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Expert Speaks</label>
                            <div class="form-check form-check-primary">
                                <input type="checkbox" name="is_expert_speaks" class="form-check-input" value="1"
                                    {{ isset($blog) && $blog->is_expert_speaks == 1 ? 'checked' : '' }}>
                                Is Expert Speaks ? <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fitness Trends & Updates</label>
                            <div class="form-check form-check-primary">
                                <input type="checkbox" name="is_trends" class="form-check-input" value="1"
                                    {{ isset($blog) && $blog->is_trends == 1 ? 'checked' : '' }}>
                                Is Fitness Trends & Updates ? <i class="input-helper"></i>
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
                                <option value="1" {{$blog->status == 1 ? 'selected':''}}>Active</option>
                                <option value="0" {{$blog->status == 0 ? 'selected':''}}>Inactive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
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

    $('.related_blogsClass').select2({
        placeholder: 'Select Blgs'
    });
});
</script>
@endpush