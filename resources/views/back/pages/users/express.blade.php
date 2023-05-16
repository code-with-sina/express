@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Users home')
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

<div class="row mt-3">
    <div class="col-md-4">
      <livewire:selling-wallet /> 
      <button type="button" class="btn btn-primary">Queue SELL</button>
    </div>
    <div class="col-md-4">
      @if (auth()->user()->type == 1)
        <div class="row">
          <div class="col-md-12 mb-1">
            <div class="card card-sm">
                <div class="card-body">
                  <h3>Seller's Notification</h3>
                </div>
              </div>
          </div>
          <livewire:seller-announcement />
        </div>
      
      @endif
    </div>
    <div class="col-md-4">
      @if (auth()->user()->type == 1)
        <p>Exchange Rate</p>
        <div class="row">
          <livewire:add-exchange-data />
          <livewire:get-exchange-data />
        </div>
      @endif
    </div>
</div>
@endsection