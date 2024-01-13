@extends('dashboard.admin.layouts.app')
@section('home', '/dashboard')
@section('subtitle', __('words.items'))
@section('button_create')
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('items.create') }}" type="button" class="btn btn-primary">+</a>
        </div>
    </div>
@stop
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.items') }}</h6>
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
                        <th>{{ __('words.name') }}</th>
                        <th>{{ __('words.price') }}</th>
                        <th>{{ __('words.quantity') }}</th>
                        <th>{{ __('words.calories') }}</th>
                        <th>{{ __('words.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->calories }}</td>
                            <td>
                                <a class="btn btn-warning"
                                href="{{ route('items.edit', $item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection