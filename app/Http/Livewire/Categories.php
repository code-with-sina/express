<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{

    public $category_name;
    public $seleted_category_id;
    public $updateCategoryMode = false;

    public $parent_category = 0 ;
    public $subcategory_name;
    public $seleted_subcategory_id;
    public $updateSubCategoryMode = false;

    protected $listeners = [
        'resetModalForm',
        'deleteCategoryAction',
        'deleteSubCategoryAction',
        'updateCategoryOrdering',
        'updateSubCategoryOrdering'
    ];

    public function resetModalForm(){
        $this->resetErrorBag();
        $this->category_name = null;
        $this->parent_category = null;
        $this->subcategory_name = null;
    }

    public function addCategory(){
        $this->validate([
            'category_name'     => 'required|unique:categories,category_name'
        ]);

        $category = new Category();
        $category->category_name    =   $this->category_name;
        $saved  = $category->save();

        if($saved){
            $this->dispatchBrowserEvent('hideAddCategoryModal');
            $this->category_name = null;
            $this->showToastr('New category has been successfully added.', 'success');
        }else{
            $this->showToastr('Something went wrong', 'error');
        }
    }

    

    public function updateCategory(){
        if($this->selected_category_id){
            $this->validate([
                'category_name' => 'required|unique:categories,category_name,'.$this->selected_category_id
            ]);

            $category = Category::findOrFail($this->selected_category_id);
            $category->category_name = $this->category_name;
            $updated = $category->save();

            if($updated){
                $this->dispatchBrowserEvent('hideCategoriesModal');
                $this->updateCategoryMode = false;
                $this->category_name = null;
                $this->showToastr('Category has been successfully updated', 'success');
            }else{
                $this->showToastr('Something went wrong', 'error');
            }
        }
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showCategoriesModal');
    }



    public function addSubCategory(){
        $this->validate([
            'parent_category'      => 'required', 
            'subcategory_name'     => 'required|unique:sub_categories,subcategory_name'
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name    =     $this->subcategory_name;
        $subcategory->parent_category      =    $this->parent_category;
        $subcategory->slug                 =    Str::slug($this->subcategory_name);
        $saved  = $subcategory->save();

        if($saved){
            $this->dispatchBrowserEvent('hideAddSubCategoryModal');
            $this->parent_category = null;
            $this->subcategory_name = null;
            $this->showToastr('New subcategory has been successfully added.', 'success');
        }else{
            $this->showToastr('Something went wrong', 'error');
        }
    }

    
    public function updateSubCategory(){
        if($this->selected_subcategory_id){
            $this->validate([
                'parent_category'      => 'required', 
                'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$this->selected_subcategory_id
            ]);

            $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
            $subcategory->subcategory_name      =   $this->subcategory_name;
            $subcategory->parent_category       =   $this->parent_category;
            $subcategory->slug                  =    Str::slug($this->subcategory_name);
            $updated = $subcategory->save();

            if($updated){
                $this->dispatchBrowserEvent('hideSubCategoriesModal');
                $this->updateSubCategoryMode = false;
                $this->parent_category = null;
                $this->subcategory_name = null;
                $this->showToastr('SubCategory has been successfully updated', 'success');
            }else{
                $this->showToastr('Something went wrong', 'error');
            }
        }
    }

    public function editSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showSubCategoriesModal');
    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type'      => $type,
            'message'   => $message
        ]);
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $this->dispatchBrowserEvent('deleteCategory', 
        [
            'title' => 'Are your sure!',
            'html'  => 'You want to delete this: <br/> <b> '.$category->category_name.'</b>',
            'id'    => $id
        ]);
    }

    public function deleteCategoryAction($id){
        $category           = Category::where('id', $id)->first();
        $subcategories      = SubCategory::where('parent_category', $category->id)
                            ->whereHas('posts')->with('posts')->get();
        
        if( !empty($subcategories) && count($subcategories) > 0 ){
            $totalPosts = 0;

            foreach($subcategories as $subcat){
                $totalPosts += Post::where('category_id', $subcat->id)->get()->count();
            }

            $this->showToastr('This category has ('.$totalPosts.') posts to it. It cannot be deleted', 'error');
        }else{
            SubCategory::where('parent_category', $category->id)->delete();
            $category->delete();
            $this->showToastr('Category has been successfully deleted.', 'info');
        }
        
    }

    public function deleteSubCategory($id){
        $subcategory = SubCategory::find($id);
        $this->dispatchBrowserEvent('deleteSubCategory', 
        [
            'title' => 'Are your sure!',
            'html'  => 'You want to delete this: <br/> <b> '.$subcategory->subcategory_name.'</b>',
            'id'    => $id
        ]);
    }

    public function deleteSubCategoryAction($id){
        $subcategory = SubCategory::where('id', $id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();

        if( !empty($posts) && count($posts) > 0 ){
            $this->showToastr('This subcategory has ('.count($posts).') posts to it. It cannot be deleted', 'error');
        }else{
            $subcategory->delete();
            $this->showToastr('This subcategory has been successfully deleted', 'info');
        }
    }

    public function updateCategoryOrdering($positions){
        foreach($positions as $position){
            $index          = $position[0];
            $newposition     = $position[1];
            Category::where('id', $index)->update([
                'ordering'  => $newposition
            ]);

            $this->showToastr('Categories ordering has been successfully updated', 'success');
        }
    }

    public function updateSubCategoryOrdering($positions){
        foreach($positions as $position){

            $index              = $position[0];
            $newposition        = $position[1];

            SubCategory::where('id', $index)->update([
                'ordering'  => $newposition
            ]);

            $this->showToastr('Sub categories ordering has been successfully updated', 'success');
        }
    }

    public function render()
    {
        return view('livewire.categories', 
                [
                    'categories'        => Category::orderBy('ordering', 'asc')->get(),
                    'subcategories'     => SubCategory::orderBy('ordering', 'asc')->get()
                ]);
    }
}
