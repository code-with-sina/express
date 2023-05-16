<div class="col-md-4 border-start">
    <div class="container py-5 px-2">
        <div class="mb-5">
            <form action="{{ route('search_posts') }}">
                <label class="text-white fs-6 px-3 py-2">Search</label>
                <input type="text" name="query" class="form-control rounded-pill bg-transparent text-white" placeholder="Search" value="{{ Request('query') }}">
            </form>
        </div>
        <div class="mb-3 px-2 pb-5">

            @if (recommended_posts())
                @foreach (recommended_posts() as $item)
                <a href="#" class="nav-link mb-2 text-truncate">
                    <span class="badge bg-success rounded-pill text-success me-3"></span>
                    {{ $item->post_title }}
                </a>  
                @endforeach
            @endif
        </div>


        <div class="pb-5 px-3">
            <p class="text-success">See full list</p>
        </div>
        <div class="py-3">
            <p class="text-white">
                Topics
            </p>
            
            
            @foreach (\App\Models\Category::whereHas('subcategories', function($q){
                $q->whereHas('posts');
        })->orderBy('ordering', 'asc')->get() as $category)

                    @foreach (\App\Models\SubCategory::where('parent_category', $category->id)->whereHas('posts')->orderBy('ordering', 'asc')->get() as $subcategory)
                        <a class="bg-light py-2 px-4 rounded-pill text-muted btn m-1" href="{{ route('category_posts', $subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a>
                    @endforeach
        @endforeach
        
      
        
            
        </div>

        <div class="py-3">
            <p class="text-secondary">
                {{ \App\Models\Setting::find(1)->blog_name }}  {{ date('Y') }}
            </p>
        </div>
    </div>
</div>