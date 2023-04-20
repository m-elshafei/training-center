@extends('layouts.app')
@section('title', 'Companies')
@section('content')
    <div class="rounded bg-white p-3 m-3">
        <h1 class="text-center">Companies</h1>
        <div class="d-flex justify-content-end mb-3">
            <div><a name="" id="" class="btn btn-primary" target="_blank" href="" role="button">Add New
                    Company</a></div>
        </div>
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">owner</th>
                        <th scope="col">tax numebr</th>
                        <th scope="col">created at</th>
                        <th scope="col">updated at</th>

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
                            <td>{{ $company->updated_at->diffForHumans() }}</td>

                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="6">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>


        </div>

        {{ $companies->links('vendor.pagination.bootstrap-5') }}
    </div>
    {{-- {{ $dt = new DateTime()->format('Y-m-d H:i:s');
    $dt->format('Y-m-d H:i:s') }}; --}}
@endsection
