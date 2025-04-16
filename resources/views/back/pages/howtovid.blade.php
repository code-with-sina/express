@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
        How to Videos
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    <div class="col-md-8 p-0">

        @if(Session::has('success')) 
            {{ Session::get('success') }}
        @endif

        <form action="{{ route('author.create-Youtube-Video') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Youtube Link</label>
                <input type="text" name="links" class="form-control" id="exampleFormControlInput1" placeholder="https://youtube.com/watch?v=tcu183Lp3Xs">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Fireboy DML & D Smoke - Champion (Official Video)">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"> Description | Optional</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $('table tbody#sortable_items').sortable({
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
        window.livewire.emit('updateItemsOrdering', positions);
      }
    });   
</script>
@endpush