@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Edit Posts')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
        <h2 class="page-title">
            Edit Post
        </h2>
        </div>
    </div>
</div>

<div class="row mt-3">
    <form action="{{ route('author.posts.update-post', ['post_id' => Request('post_id')])}}" method="POST" id="editPostForm" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row gap-auto">
                    <div class="col-md-9">
                        <div class="mb-3">
                          <label for="" class="form-label">Post Title</label>
                          <input type="text"
                            class="form-control" name="post_title" id="" aria-describedby="helpId" placeholder="Enter Post Title" value="{{ $post->post_title }}">
                            <span  class="form-text error-text post_title_error text-danger"></span>                          
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Post Content <span class="form-label-description">56/100</span></label>
                            <textarea class="ckeditor form-control" id="ckeditor" name="post_content" rows="6" placeholder="Content..">{!! $post->post_content !!}</textarea>
                            <span  class="form-text error-text post_content_error text-danger"></span>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Post Category</label>
                            <select class="form-select" name="post_category" id="">
                                <option>No selected</option>
                                @foreach (\App\Models\SubCategory::all() as $subcategory)
                                <option value="{{ $subcategory->id}}" {{ $post->category_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}  </option>
                                @endforeach 
                            </select>
                            <span  class="form-text error-text post_category_error text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Featured image</div>
                            <input type="file" class="form-control" name="featured_image" value="/storage/images/post_images/thumbnails/resized_{!! $post->featured_image !!}">
                            <span  class="form-text error-text featured_image_error text-danger"></span>
                        </div>
                        <div class="mb-3 image_holder" style="max-width: 300px;">
                            <img src=""  class="img-thumbnail w-full"  id="image-preview" data-ijabo-default-img='/storage/images/post_images/thumbnails/resized_{!! $post->featured_image !!}'>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags" value="{{ $post->post_tags}}">
                        </div>
                        <button class="btn btn-primary">Update post</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="/ckeditor/ckeditor.js">

    </script>
    <script>
        $(function(){
            $('input[name="featured_image"]').ijaboViewer({
                preview: '#image-preview',
                imageShape: 'rectangular',
                allowedExtensions:['jpg', 'jpeg', 'png'],
                onErrorShape:function(message, element){
                alert(message);
                },
                onInvaliedType:function(message, element){
                alert(message);
                },
                onSuccess:function(message, element){

                }
            });
        });
         
        $('form#editPostForm').on('submit', function(e){
            e.preventDefault();
            toastr.remove();
            let post_content = CKEDITOR.instances.ckeditor.getData();
            let form = this;
            let fromData = new FormData(form);

            fromData.append('post_content', post_content);
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: fromData,
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function(){
                    $(form).find('span.error-text').text('');
                },
                success: function(response){
                    toastr.remove();
                    if(response.code == 1){
                        toastr.success(response.msg);
                    }else{
                        toastr.error(response.msg);
                    }
                },
                error: function(response){
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix, val){
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        });
    </script>
@endpush