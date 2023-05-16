@extends('back.layouts.users-auth-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Forgot Password')
@section('content')
    <livewire:users-forgot />     
@endsection