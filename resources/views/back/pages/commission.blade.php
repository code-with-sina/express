@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'home')
@section('content')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Commissions
        </h2>
      </div>
    </div>
  </div>

<div class="row mt-3 px-0">
    
    <div class="col-md-6">
      @if (auth()->user()->type == 1)
        <div class="row">
          <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <h3>Affiliate Payment Notification</h3>
                </div>
                  @php 
                      $affiliate = \App\Models\AffiliateWithdrawals::where('status', 'unpaid')->get();
                      if($affiliate)
                        $aff_props = $affiliate;
                      else
                        $aff_props = null;
                  @endphp

                 @if($aff_props !== null)
                    @foreach($aff_props as $property)
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <p>
                            @php 
                                $name = \App\Models\CounterPartyAccount::where('uuid', $property->uuid)->first();
                            @endphp
                            name:  {{ $name->account_name }}
                            </p>
                          </div>
                          <div class="col-3">
                            <p class="text-center">amount: {{ $property->amount }}</p>
                          </div>
                          <div class="col-3">
                            <form action="{{ route('author.commission-process')}}" method="post">
                              @csrf
                              <input type="hidden" name="uuid" id="uuid" value="{{ $property->uuid}}">
                              <input type="hidden" name="amount" id="amount" value="{{ $property->amount}}">
                              <input type="hidden" name="approval" id="approval" value="{{ $property->approval}}">
                              <button type="submit" id="disburse" class="btn btn-primary float-end ">Disburse</button>
                            </form>
                            
                          </div>
                        </div>
                      </div>
                    @endforeach
                 @endif
                
              </div>
          </div>
          
        </div>
      
      @endif
     
    </div>
    
</div>
@endsection
@push('scripts')

@endpush