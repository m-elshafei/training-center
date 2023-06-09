@extends('layouts.app')
@section('title', __('message.managers'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{  __('message.managers') }}</h1>
        @if (Auth::user())
            <div class="d-flex justify-content-end mb-3">
                <div><a name="" id="" class="btn btn-primary" target="_blank"
                        href="{{ route('manager.create') }}" role="button">{{  __('message.add_new_manager') }}</a></div>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{  __('message.name') }}</th>
                        <th scope="col">{{  __('message.company') }}</th>
                        <th scope="col">{{  __('message.created_at') }}</th>
                        <th scope="col">{{  __('message.updated_at') }}</th>
                        @if (Auth::user())
                            <th scope="col">{{__('message.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($managers as $key => $manager)
                        <tr class="">
                            <td scope="row">{{ $key + $managers->firstitem() }}</td>
                            <td>{{ $manager->name }}</td>
                            <td>{{ $manager->company->name }}</td>
                            <td>{{ $manager->created_at }}</td>
                            <td>{{ $manager->updated_at->diffForHumans() }}</td>
                            @if (Auth::user())
                                <td>
                                    <div class="d-flex justify-content-evenly">

                                        <form action='{{ route('manager.destroy', $manager->id) }}' method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('manager.edit', $manager->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                    </div>
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{  __('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        {{ $managers->links() }}
    </div>

@endsection
