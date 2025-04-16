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
                Processing
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('author.chats')}}">Pending</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('author.processing-transaction')}}">Processing</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('author.success-transaction')}}">Success</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('author.cancelled-transaction')}}">Cancelled</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
@php 
        
        $detail = \App\Models\ExpressTransaction::where('transaction_status', 'processing')->latest()->paginate(5);
       
       

    @endphp

    @forelse($detail as $details)
        @php
            $user = \App\Models\User::where('id', $details->seller_id)->first();
            $chatNotification = \App\Models\ChatSubscription::where('session_id', $details->order_id)->where('status', 'attended')->orWhere('session_id', $details->order_id)->where('status', 'attention')->first();

        @endphp
        @if($details->count() > 0 && @$chatNotification->status !== null) 
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="row g-0">
                    <div class="col-md-4  {{ $chatNotification->status === "attention" ? "btn-danger" : "btn-success"}}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                                
                            <h5 class="card-title">{{ $chatNotification->status === "attention" ? "New" : "Old"}} Transactions</h5>
                            <p class="card-text mb-0">{{ $user->name }} <span class="chat_date"></p>
                            <p class="card-text mb-0"> {{ __($details->wallet_name)}}  {{__($details->wallet_currency)}} {{__($details->wallet_amount)}} | {{ __($details->conversion_name)}}  {{__($details->conversion_amount)}}</p>
                            <p class="card-text my-1"><small class="text-body-secondary">Last updated {{ \Carbon\Carbon::now()->format($chatNotification->created_at)}}</small></p>
                            <a href="{{ route('author.express-transactions', ['id' => $chatNotification->session_id ]) }}" class="btn {{ $chatNotification->status === "attention" ? "btn-danger" : "btn-success"}} stretched-link"> {{ $chatNotification->status === "attention" ? "attention need"  : "Attended"}} </a>
                        
                            
                            <small  class="text-secondary float-end"> {{ $details->transaction_status }} </small>
                            <small  class="text-secondary float-end text-muted mr-1"> {{ $details->order_id }} </small>  
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif

    @endforeach
    <div class="col-md-12">
        {{ $detail->links() }}
    </div>
</div>
@endsection

