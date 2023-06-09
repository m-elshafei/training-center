@extends('layouts.app')
@section('title', __('message.companies'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.companies') }}</h1>
        <div class="row">
            <div class="col-md-4">
                <form method="GET" action="{{ route('company.index') }}">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="search" id="search" aria-describedby="helpId"
                            placeholder="Search By Name">
                    </div>
                </form>
            </div>
        </div>
        @if (Auth::user()->role == 'admin')
            <div class="d-flex justify-content-end mb-3">
                <div><a name="" id="" class="btn btn-primary" target="_blank"
                        href="{{ route('company.create') }}" role="button">{{ __('message.add_company') }}</a>
                </div>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.owner') }}</th>
                        <th scope="col">{{ __('message.tax_numebr') }}</th>
                        <th scope="col">{{ __('message.created_at') }}</th>
                        <th scope="col">{{ __('message.updated_at') }}</th>
                        @if (Auth::user()->role == 'admin')
                            <th scope="col">{{ __('message.actions') }}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $key => $company)
                        <tr class="">
                            <td scope="row">{{ $key + $companies->firstitem() }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->owner }}</td>
                            <td>{{ $company->tax_number }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td>{{ $company->updated_at }}</td>
                            @if (Auth::user()->role == 'admin')
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <a name="" id="" class="btn btn-warning"
                                            href="{{ route('branch.show', $company->id) }}" role="button">
                                            <i class="fa-solid fa-code-branch fa-shake"></i>
                                        </a>
                                        <form action="{{ route('company.destroy', $company->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('company.edit', $company->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                    </div>
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">{{ __('message.no_data_found') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        {{ $companies->links() }}
    </div>

@endsection
