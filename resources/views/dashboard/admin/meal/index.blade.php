@extends('dashboard.admin.layouts.app')
@section('home', '/')
@section('subtitle', __('words.meals'))
@section('button_create')
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('meals.create') }}" type="button" class="btn btn-primary">+</a>
        </div>
    </div>
@stop
@section('content')
    <h6 class="mb-0 text-uppercase">{{ __('words.meals') }}</h6>
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
                        <th>{{ __('words.category') }}</th>
                        <th>{{ __('words.calories') }}</th>
                        <th>{{ __('words.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($meals as $key => $meal)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $meal->name }}</td>
                            <td>{{ $meal->displayed_price }}</td>
                            <td>{{ $meal->Category->name }}</td>
                            <td>{{ $calories }}</td>
                            <td>
                                <a class="btn btn-warning"
                                href="{{ route('meals.edit', $meal->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection