@extends('layouts.app')
@section('title',  __('message.categories'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{  __('message.categories') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('category.create') }}"
                    role="button">{{__('message.add_new_category') }}</a></div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @elseif (session()->has('message_er'))
            <div class="alert alert-danger" role="alert">
                <strong>{{ session('message_er') }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('message.name') }}</th>
                        <th scope="col">{{__('message.created_at') }}</th>
                        <th scope="col">{{__('message.updated_at') }}</th>
                        <th scope="col">{{__('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $key => $category)
                        <tr class="">
                            <td scope="row">{{ $key + $categories->firstItem() }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('category.destroy', $category->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('category.edit', $category->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{__('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>

    </div>
@endsection
