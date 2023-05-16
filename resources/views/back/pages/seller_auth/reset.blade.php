@extends('back.layouts.users-auth-layouts')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')
@section('content')
    <livewire:users-reset-form />
@endsection