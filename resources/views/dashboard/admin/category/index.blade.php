@extends('dashboard.admin.layouts.app')
@section('home', '/dashboard')
@section('subtitle', __('words.categories'))
@section('button_create')
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('categories.create') }}" type="button" class="btn btn-primary">+</a>
        </div>
    </div>
@stop
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.categories') }}</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                @include('dashboard.admin.layouts.messages')
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('words.categories') }}</th>
                        <th>{{ __('words.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class="btn btn-warning"
                                href="{{ route('categories.edit', $category->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection