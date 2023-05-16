@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'New Transaction chat')
@section('content')

@push('stylesheets')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet" />

@endpush
<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                Express Notification 
            </h2>
        </div>
    </div>
</div>

<div class="row">
    @php
        $chatNotification = \App\Models\ChatSubscription::all();
    @endphp 
     @foreach ($chatNotification as $notification)
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row g-0">
                <div class="col-md-4  {{ $notification->status === "attention" ? "btn-danger" : "btn-success"}}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                            @php
                                $user = \App\Models\User::where('id', $notification->user_id)->first();
                                $detail = \App\Models\ExpressTransaction::where('order_id', $notification->session_id)->first();
                            @endphp
                        <h5 class="card-title">{{ $notification->status === "attention" ? "New" : "Old"}} Transactions</h5>
                        <p class="card-text mb-0">{{ $user->name }} <span class="chat_date"></p>
                        <p class="card-text mb-0"> {{ __($detail->wallet_name)}}  {{__($detail->wallet_currency)}} {{__($detail->wallet_amount)}} | {{ __($detail->conversion_name)}}  {{__($detail->conversion_amount)}}</p>
                        <p class="card-text my-1"><small class="text-body-secondary">Last updated {{ \Carbon\Carbon::now()->format($notification->created_at)}}</small></p>
                        <a href="{{ route('author.express-transactions', ['id' => $notification->session_id ]) }}" class="btn {{ $notification->status === "attention" ? "btn-danger" : "btn-success"}} stretched-link"> {{ $notification->status === "attention" ? "attention need"  : "Attended"}} </a>

                        <small  class="text-secondary float-end"> {{ $detail->transaction_status }} </small>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

