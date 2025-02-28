@extends('user_dashboard_layout.master')

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@section('content')


             @livewire('user-profile')


 @endsection
