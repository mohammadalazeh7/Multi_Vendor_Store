@extends('layouts.dashboard')

@section('title', 'Trash Categories')

@section('breadcrumb')
    @parent
    <i class="breadcrumb-item active">Categories</i>
    <i class="breadcrumb-item active">Trash Categories</i>
@endsection

@section('content')

    <div class="mb-5">
        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-primary">Back</a>
    </div>

    <x-alert type="success" />
    <x-alert type="info" />
    <x-alert type="delete" />

    <form action="{{ URL::current() }}" method="get" class="d-flex">

        <x-form.input name="name" placeholder="Name" :value="request('name')" />

        <select name="status" class="form-control">
            <option value="">All</option>
            <option value="active" @selected(request('status') == 'active')>Active</option>
            <option value="archived" @selected(request('status') == 'archived')>Archived</option>
        </select>

        <button type="submit" class="btn btn-primary">Filter</button>

    </form>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Delete At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="#" height="50" width="50">
                    </td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->deleted_at }}</td>
                    <td>
                        <div class="action-button">

                            <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-info rounded-pill"><i class="fas fa-trash"></i>Restore</button>
                            </form>

                            <form action="{{ route('dashboard.categories.force-delete', $category->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger rounded-pill"><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="7"> No Categories Defined!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->withQueryString()->links() }}
    {{-- {{ $categories->withQueryString()->links('folder/file you make it {view pagination}') }} --}}
@endsection
