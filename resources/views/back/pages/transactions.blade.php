@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Transactions')
@section('content')

    {{ $transactions->id }}
    <br>

    {{ $transactions->amount }}
    <br>

    {{ $transactions->start == 1 ? 'start' : 'not started' }}

    @if ($transactions->start == 0)
    <a href="{{ url('author/accept', $transactions->transaction_id) }}" class="btn btn-primary">Accept transaction</a> 
    @endif
   
    <br>

    {{ $transactions->selling }}
    <br>

    {{ $transactions->currency }}
    <br>

    {{ $transactions->transaction_id }}
    <br>

    {{ $transactions->end == 1 ? 'end' : 'on going' }}
    <br>

    @if ($transactions->end == 0)
    <a href="{{ url('author/confirm', $transactions->transaction_id) }}" class="btn btn-primary">Confirm Transation</a> 
    <a href="{{ url('transactions/chatify/'.$transactions->users_id) }}" class="btn btn-primary">chat with buyer</a>
    @endif

   
@endsection