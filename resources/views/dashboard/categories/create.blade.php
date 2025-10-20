@extends('layouts.dashboard')

@section('title', 'Create Categories')

@section('breadcrumb')
    @parent
    <i class="breadcrumb-item active">Categories</i>
    <i class="breadcrumb-item active">Create Categories</i>
@endsection

@section('content')

    <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        @include('dashboard.categories._form')

    </form>

@endsection
