<div class="container-fluid">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="/blog" class="nav-link text-white">Categories</a>
        </li>
        @foreach (\App\Models\Category::whereHas('subcategories', function($q){
                $q->whereHas('posts');
        })->orderBy('ordering', 'asc')->get() as $category)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ $category->category_name }}</a>
                <ul class="dropdown-menu bg-dark">
                    @foreach (\App\Models\SubCategory::where('parent_category', $category->id)->whereHas('posts')->orderBy('ordering', 'asc')->get() as $subcategory)
                    <li><a class="dropdown-item bg-transparent text-white" href="{{ route('category_posts', $subcategory->slug) }}">{{ $subcategory->subcategory_name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>