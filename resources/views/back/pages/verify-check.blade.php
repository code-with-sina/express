@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Verify Users
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    <div class="col-md-4 p-0">
      <div class="card">
        <div class="card-body">
            <img src="/storage/images/verification/thumbnails/resized_{{ $mage->nin_path }}" alt="NIN" class="img-fluid" />
        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <img src="/storage/images/verification/thumbnails/resized_{{ $mage->selfie_path }}" alt="Selfie" class="img-fluid" />
            </div>
        </div>
    </div>
    <div class="col-md-4 p-0">

            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
    
                <a href="{{ url('/author/verify-users/deny')  }}/{{ $mage->users_id }}" class="btn btn-warning">Deny</a>
                <a href="{{ url('/author/verify-users/approve')}}/{{ $mage->users_id }}" class="btn btn-success">Approve</a>
            </div>
            <h1>{{ $mage->status }}</h1>
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