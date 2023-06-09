@extends('layouts.app')
@section('title', __('message.employees'))
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">{{ __('message.employees') }}</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="{{ route('employee.create') }}"
                    role="button">{{ __('message.add_new_employee') }}</a></div>
        </div>
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
                        <th scope="col">{{ __('message.job_title') }}</th>
                        <th scope="col">{{ __('message.salary') }}</th>
                        <th scope="col">{{ __('message.hire_date') }}</th>
                        <th scope="col">{{ __('message.name') }}</th>
                        <th scope="col">{{ __('message.created_at') }}</th>
                        <th scope="col">{{ __('message.updated_at') }}</th>
                        <th scope="col">{{ __('message.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $key => $employee)
                        <tr class="">
                            <td scope="row">{{ $key + $employees->firstItem() }}</td>
                            <td>{{ $employee->job_title }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->hire_date }}</td>
                            <td>{{ $employee->user->name }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <form action='{{ route('employee.destroy', $employee->id) }}' method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('employee.edit', $employee->id) }}" role="button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>
@endsection
