@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Ratefy | Offers')
@section('content')

  <div class="px-0 px-md-5 py-5">
      <h4 class="auth-dashboard-subheading mb-2">
          What are you <span class="ratefy-gradient">Exchanging Today?</span>
      </h4>
      <p class="auth-dashboard-lead-paragraph">
          Select the exchange rate offer that suits best, Calculate your potential receiving amount, Sell you fund safely and instantly.
      </p>
      <livewire:users-dashboard-exchange-rate>
  </div>

@endsection