@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Competitors Stats
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    <div class="col-md-7 p-0">
      
    <div class="card card-primary" bis_skin_checked="1">
        <div class="card-header" bis_skin_checked="1">
            <h3 class="card-title">Insert stats</h3>
        </div>

        <form action="{{ route('author.compstats')}}" method="POST">
            @csrf
            <div class="card-body" bis_skin_checked="1">
                <div class="form-group mb-2" bis_skin_checked="1">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
                </div>
                <div class="form-group mb-2" bis_skin_checked="1">
                    <label for="exampleInputPassword1">Withrawal Fee</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Withrawal Fee" name="withdrawl_fee">
                </div>
                <div class="form-group mb-2" bis_skin_checked="1">
                    <label for="exampleInputPassword1">Conversion Fee</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Conversion Fee" name="conversion_fee">
                </div>
                <div class="form-group mb-2" bis_skin_checked="1">
                    <label for="exampleInputPassword1">Service Fee</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Service Fee" name="service_fee">
                </div>
            </div>

            <div class="card-footer" bis_skin_checked="1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    </div>

    <div class="col-md-5">
      <div class="card card-primary" bis_skin_checked="1">
          <div class="card-header" bis_skin_checked="1">
              <h3 class="card-title">competitors stats</h3>
          </div>

          <div class="row">
            @if(@$comps !== null)
                @foreach($comps as $stats)
                <div class="col-12">
                  <div class="row">
                    <div class="col-5 py-2"><p class="px-2 "> {{ $stats->name }}</p></div>
                    <div class="col-1 py-2"><p class="px-2"> {{ $stats->withdraw_in_fee }} </p></div>
                    <div class="col-1 py-2"><p class="px-2"> {{ $stats->conversion_fee }}</p></div>
                    <div class="col-2 py-2"><p class="px-2"> {{ $stats->service_fee }} </p></div>
                    <div class="col-3 py-2 px-2">
                      <form action="{{ route('author.compstats-delete') }}" method="post">
                        @csrf
                          <input type="hidden" name="id" value="{{ $stats->id }}">
                          <button type="submit" class="btn btn-danger mx-2">Delete</button>
                      </form>
                    </div>
                    
                  </div>
                </div>
                @endforeach
            @endif
          </div>
      </div>
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