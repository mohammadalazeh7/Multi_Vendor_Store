@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <i class="breadcrumb-item active">Categories</i>
@endsection

@section('content')

    <div class="mb-5">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary">Create Category</a>
        <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-sm btn-outline-dark">Trash</a>
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
                <th>Parent</th>
                <th>Products Count</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="#" height="50" width="50">
                    </td>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('dashboard.categories.show' , $category->id) }}">{{ $category->name }}</a></td>
                    {{-- <td>{{ $category->parent_name }}</td> --}}
                    {{-- <td>{{ $category->parent ? $category->parent->name : 'Null' }}</td> --}}
                    <td>{{ $category->parent->name}}</td>
                    <td>{{ $category->products_count}}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <div class="action-button">
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="btn btn-info rounded-pill"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post"
                                style="display: inline;">
                                @csrf
                                {{-- Form Method Spoofing --}}
                                {{-- <input type="hidden" name="_method" value="delete"> --}}
                                @method('delete')
                                <button type="submit" class="btn btn-danger rounded-pill"><i class="fas fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="8"> No Categories Defined!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->withQueryString()->links() }}
    {{-- {{ $categories->withQueryString()->links('folder/file you make it {view pagination}') }} --}}
@endsection
