@extends('dashboard.admin.layouts.app')
@section('home', '/dashboard/categories')
@section('subtitle', __('words.update_category'))
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-solid fa-list font-22 text-primary me-1"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.update_category') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('categories.update', $category->id) }}' method="POST">
                        @method('put')
                        @csrf
                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.category_name') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" value="{{$category->name}}" name="name" class="mb-3">
                            </div>
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.update_category') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
