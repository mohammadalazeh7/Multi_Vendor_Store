@extends('layouts.dashboard')

@section('title', 'Edit Category')

@section('breadcrumb')
    @parent
    <i class="breadcrumb-item active">Categories</i>
    <i class="breadcrumb-item active">Edit Category</i>
@endsection


@section('content')

    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('put')

        @include('dashboard.categories._form', [
            'button_label' => 'Update',
        ])

    </form>

@endsection
