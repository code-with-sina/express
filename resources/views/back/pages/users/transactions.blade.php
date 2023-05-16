@extends('back.layouts.users-pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Transactions')
@section('content')

    {{ $transactions->id }}
    <br>

    {{ $transactions->amount }}
    <br>

    {{ $transactions->start == 1 ? 'start' : 'not started' }}
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
        <a href="{{ url('transactions/chatify/'.$transactions->seller_id) }}" class="btn btn-primary">chat with buyer</a>
    @endif
@endsection