@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Categories')
@section('content')
<div class="page-header d-print-none">
  <div class="row align-items-center">
    <div class="col">
      <h2 class="page-title">
        Categories & Sub-categories
      </h2>
    </div>
  </div>
</div>


<livewire:categories />
  
@endsection

@push('scripts')
  <script>
    window.addEventListener('hideAddCategoryModal', function(e){
      $('#categories_modal').modal('hide');
    });

    window.addEventListener('showCategoriesModal', function(e){
      $('#categories_modal').modal('show');
    });
    
    window.addEventListener('hideCategoriesModal', function(e){
      $('#categories_modal').modal('hide');
    }); 


    window.addEventListener('hideAddSubCategoryModal', function(e){
      $('#subcategories_modal').modal('hide');
    });

    window.addEventListener('showSubCategoriesModal', function(e){
      $('#subcategories_modal').modal('show');
    });
    
    window.addEventListener('hideSubCategoriesModal', function(e){
      $('#subcategories_modal').modal('hide');
    }); 

    
    window.addEventListener('hideSubCategoriesModal', function(e){
      $('#subcategories_modal').modal('hide');
    }); 

    $('#subcategories_modal', '#categories_modal').on('hidden.bs.modal', function(e){
        Livewire.emit('resetModalForm');
    });

    window.addEventListener('deleteCategory', function(event){
      swal.fire({
          title: event.detail.title,
          html: event.detail.html,
          showCloseButton: true,
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete',
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          width: 300,
          allowOutsideClick: false
      }).then(function(result){
          if(result.value){
              window.livewire.emit('deleteCategoryAction', event.detail.id);
          }
      });
    });

    window.addEventListener('deleteSubCategory', function(event){
      swal.fire({
          title: event.detail.title,
          html: event.detail.html,
          showCloseButton: true,
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete',
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          width: 300,
          allowOutsideClick: false
      }).then(function(result){
          if(result.value){
              window.livewire.emit('deleteSubCategoryAction', event.detail.id);
          }
      });
    });

    $('table tbody#sortable_category').sortable({
      update:function(event, ui){
        $(this).children().each(function(index){
            if($(this).attr("data-ordering") != (index+1)){
              $(this).attr("data-ordering", (index+1)).addClass("updated");
            }
        });
        var positions = [];
        $(".updated").each(function(){
          positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
          $(this).removeClass("updated");
        });
        window.livewire.emit('updateCategoryOrdering', positions);
      }
    });

    $('table tbody#sortable_subcategory').sortable({
      update:function(event, ui){
        $(this).children().each(function(index){
          if($(this).attr("data-ordering") != (index+1)){
              $(this).attr("data-ordering", (index+1)).addClass("updated");
            }
        });
        var positions = [];
        $(".updated").each(function(){
          positions.push([$(this).attr("data-index"), $(this).attr("data-ordering")]);
          $(this).removeClass("updated");
        });
        window.livewire.emit('updateSubCategoryOrdering', positions);
      }
    });
</script>
@endpush
