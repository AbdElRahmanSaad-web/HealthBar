@extends('dashboard.admin.layouts.app')
@section('home', '/items')
@section('subtitle', __('words.update_item'))
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-solid fa-list font-22 text-primary me-1"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.update_item') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('items.update', $item->id) }}' method="POST">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.name') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" value="{{$item->name}}"  type="text" name="name" id="regions" class="mb-3">
                            </div>
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">{{ __('words.quantity') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" value="{{$item->quantity}}" type='number' step="0.1" name="quantity" id="regions" class="mb-3">
                            </div>
                            @error('quantity')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">{{ __('words.price') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" type='number' value="{{$item->price}}" step="0.1" name="price" id="regions" class="mb-3">
                            </div>
                            @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.calories') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" type='number' value="{{$item->calories}}" name="calories" id="regions" class="mb-3">
                            </div>
                            @error('calories')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.description') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" type="text" value="{{$item->description}}" name="description" id="regions" class="mb-3">
                            </div>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.update_item') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
