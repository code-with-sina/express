<div>
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <h4>Categories</h4>
                    </li>
                    
                    <li class="nav-item ms-auto">
                      <button class="btn btn-primary" data-bs-target='#categories_modal' data-bs-toggle='modal'>Add Category</button>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-vcenter card-table table-striped">
                        <thead>
                          <tr>
                            <th>Category Name</th>
                            <th>No. of Sub-Categories</th>
                            <th class="w-1"></th>
                          </tr>
                        </thead>
                        <tbody id="sortable_category">
                            @forelse ($categories as $category)
                                <tr class="alert alert-primary" data-index='{{$category->id}}' data-ordering='{{ $category->ordering}}'>
                                    <td>{{ $category->category_name }}</td>
                                    <td class="text-muted">
                                    {{ $category->subcategories->count() }}
                                    </td>
                                    <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-outline-primary" wire:click.prevent='editCategory({{ $category->id }})'>Edit</a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" wire:click.prevent='deleteCategory({{ $category->id }})'>Delete</a>
                                    </div>
                                    </td>
                                </tr> 
                            @empty
                                <tr class="alert alert-danger">
                                    <span aria-colspan="3" class="text-danger">No category found</span>
                                </tr> 
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <h4>Sub-categories</h4>
                </li>
                
                <li class="nav-item ms-auto"> 
                  <button class="btn btn-primary" data-bs-target="#subcategories_modal" data-bs-toggle="modal">Add subcategory</button>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-vcenter card-table table-striped">
                  <thead>
                    <tr>
                      <th>SubCategory Name</th>
                      <th>Parent Categories</th>
                      <th>No. of Post</th>
                      <th class="w-1"></th>
                    </tr>
                  </thead>
                  <tbody id="sortable_subcategory">
                    @forelse ($subcategories as $subcategory)
                        <tr class="alert alert-primary" data-index='{{ $subcategory->id }}' data-ordering='{{ $subcategory->ordering }}'>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td class="text-muted">
                                {{ $subcategory->parent_category != 0 ? $subcategory->category->category_name : '-' }}
                            </td>
                            <td class="text-muted">
                                {{ $subcategory->posts->count() }}
                            </td>
                            <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-outline-primary" wire:click.prevent='editSubCategory({{ $subcategory->id }})'>Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger" wire:click.prevent='deleteSubCategory({{ $subcategory->id }})'>Delete</a>
                            </div>
                            </td>
                        </tr>
                    @empty
                    <tr class="alert alert-danger">
                        <td colspan="4" class="text-danger">No subcategory found</td>
                    </tr> 
                    @endforelse
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      


    {{-- Modals --}}

  {{-- Modal for Category --}}
  <div wire:ignore.self class="modal modal-blur fade" id="categories_modal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form class="modal-content" method="POST"
        @if ($updateCategoryMode)
           wire:submit.prevent='updateCategory()' 
        @else
        wire:submit.prevent='addCategory()'  
        @endif
      >
        <div class="modal-header">
          <h5 class="modal-title">{{ $updateCategoryMode ? 'Update Category' : 'Add Category'}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if ($updateCategoryMode)
              <input type="hidden" wire:model='seleted_category_id'>
          @endif
          <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Enter category name" wire:model='category_name'>
            @error('category_name')
                <span class="text-danger">{{ $message }}</span>  
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">{{ $updateCategoryMode? 'Update' : 'Save' }}</button>
        </div>
      </form>
    </div>
  </div>


  {{-- Modal for subcategory --}}
  <div wire:ignore.self class="modal modal-blur fade" id="subcategories_modal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form class="modal-content" method="POST" 
      @if ($updateSubCategoryMode)
            wire:submit.prevent='updateSubCategory()' 
        @else
        wire:submit.prevent='addSubCategory()'  
        @endif
      >
        <div class="modal-header">
          <h5 class="modal-title">{{ $updateSubCategoryMode ? 'Update SubCategory' : 'Add SubCategory'}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($updateSubCategoryMode)
                <input type="hidden" wire:model='seleted_subcategory_id'>
            @endif
          <div class="mb-3">
            <div class="form-label">Parent Category</div>
            <select class="form-select" name="parent_category" wire:model='parent_category'>
                @if(!$updateSubCategoryMode)
                    <option value="0">-- Uncategorized --</option>
                @endif
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>    
                @endforeach
              
            </select>
            @error('parent_category')
                <span class="text-danger">{{ $message }}</span>  
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Add SubCategory</label>
            <input type="text" class="form-control" name="example-text-input" placeholder="Enter subcategory name" wire:model='subcategory_name'>
            @error('subcategory_name')
                <span class="text-danger">{{ $message }}</span>  
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">{{ $updateSubCategoryMode? 'Update' : 'Save' }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
