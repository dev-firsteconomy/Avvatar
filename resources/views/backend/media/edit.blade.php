@extends('backend.layouts.master')

@section('main-content')
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Edit Media</h5>
        <div class="card-body">
            <form method="post" action="{{route('media.update',$media->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type" class="col-form-label">Type <span class="text-danger">*</span></label>
                            <select name="media_type" class="form-control">
                                <option value=""> Select Media Type </option>
                                <option value="Video" {{ $media->media_type == 'Video' ? 'selected':'' }}>Video</option>
                                <option value="News"  {{ $media->media_type == 'News'  ? 'selected':'' }}>News</option>
                                <option value="Image" {{ $media->media_type == 'Image' ? 'selected':'' }}>Image</option>
                            </select>
                            @error('media_type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" placeholder="Enter Title"
                                value="{{ old('title') ? old('title') : $media->title }}" class="form-control">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Tag" class="form-label">Tag</label>
                            <input type="text" name="tag" id="tag" placeholder=" EnterTag"
                                value="{{ old('tag') ? old('tag') : $media->tag }}" class="form-control">
                            @error('tag')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            @if(isset($media))
                                <img src="{{ asset($media->thumbnail_image) }}" alt="image" style="height:100px; width: 100px;">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="thumbnail_image" class="form-label">Change Thumbnail Image</label>
                            <input type="file" name="thumbnail_image" id="thumbnail_image" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="video_link" class="form-label">Video Link</label>
                            <input type="video_link" name="video_link" id="video_link" placeholder="Enter Video Link"
                                value="{{ old('video_link') ? old('video_link') : $media->video_link }}" class="form-control">
                            @error('video_link')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" id="date" placeholder="Enter Date"
                                value="{{ old('date') ? old('date') : $media->date }}" class="form-control">
                            @error('date')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="news_link" class="form-label">News Link</label>
                            <input type="news_link" name="news_link" id="news_link" placeholder="Enter news_link"
                                value="{{ old('news_link') ? old('news_link') : $media->news_link }}" class="form-control">
                            @error('news_link')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="news_url" class="form-label">News Url</label>
                            <input type="news_url" name="news_url" id="news_url" placeholder="Enter Url of Navigte News"
                                value="{{ old('news_url') ? old('news_url') : $media->news_url }}" class="form-control">
                            @error('news_url')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        {{ old('short_desc') ? old('short_desc') : $media->short_desc }}
                            <label for="short_desc" class="form-label">Short Description</label>
                            <textarea class="form-control" id="short_desc" name="short_desc">{{ old('short_desc') ? old('short_desc') : $media->short_desc }}</textarea>
                            @error('short_desc')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $media->status == 1 ? 'selected':'' }}>Active</option>
                                <option value="0" {{ $media->status == 0 ? 'selected':''}}>Inactive</option>
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
    $('#short_desc').summernote({
        placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
});
</script>
@endpush