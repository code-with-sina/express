<div>
    <div>
        <div class="row row-cards mt-3">
            @forelse ($posts as $post)

                    <div class="card p-0 w-75">
                        <img src="/storage/images/post_images/thumbnails/resized_{{ $post->featured_image }}" alt="" class="card-img-top img-fluid">
                        <div class="card-body p-2">
                            <h3 class="m-0 mb-1">{{ $post->post_title }}</h3>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('author.posts.edit-post', ['post_id' => $post->id])}}" class="card-btn"> Edit </a>
                            <a href="" class="card-btn" wire:click.prevent='deletePost({{ $post->id }})'> Delete </a>
                        </div> 
                    </div>
  
            @empty
                <span class="alert alert-danger text-danger">No post(s) found</span>
            @endforelse
        </div>
    
        <div class="d-block my-2">
            {{ $posts->links('livewire::simple-bootstrap') }}
        </div>
    </div>
    
</div>
