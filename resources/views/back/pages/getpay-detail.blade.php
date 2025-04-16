@extends('back.layouts.pages-layouts')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'detail' )
@section('content')

@push('styles')
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0" />
@endpush
@vite(['resources/js/adminsecchats.js'])

@php 
    $failed = App\Models\FailedTransaction::where('failed_transact_rfx_id', $status->data->id)->first();
    
@endphp

@if($failed !== null)
    @include('back.pages.get-repaid')
@else 
    @include('back.pages.get-paid')
@endif

@endsection