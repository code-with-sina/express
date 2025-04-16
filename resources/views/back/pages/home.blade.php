@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Dashboard
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    <div class="col-md-4 p-0">
      @if (auth()->user()->type == 1)
          <livewire:conversion /> 
      @endif
      
      @if (auth()->user()->type == 2)
          <livewire:author-post /> 
      @endif

      @if (auth()->user()->type == 3)
      <div class="row">
        <div class="col-md-12 mb-1 px-4">
          <div class="card card-sm">
              <div class="card-body">
                <h3>Seller's Profile</h3>
              </div>
            </div>
        </div>
        <livewire:seller-profile /> 
      </div>
          
      @endif
    </div>
    <div class="col-md-3">
      @if (auth()->user()->type == 1)
        <div class="row">
          <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <h3>Edit Rate</h3>
                </div>
              </div>
          </div>
            <div>
              
            </div>

           <livewire:seller-announcement /> 
           <br class="mb-2" />
           <livewire:rate-switch /> 
           <br class="mb-2" />
           <livewire:manual-rate /> 
        </div>
      
      @endif
      @if (auth()->user()->type == 3)
        <div class="row">
          <div class="col-md-12 mb-1 px-4">
            <div class="card card-sm">
                <div class="card-body">
                  <h3>Buying's Profile</h3>
                </div>
              </div>
          </div>
          <livewire:buyer /> 
        </div>
      @endif
    </div>
    <div class="col-md-5 p-0">
      @if (auth()->user()->type == 1)
        <p>Exchange Rate</p>
        <div class="row p-0">
          <livewire:add-exchange-data />
          <livewire:get-exchange-data />
        </div>
      @endif
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