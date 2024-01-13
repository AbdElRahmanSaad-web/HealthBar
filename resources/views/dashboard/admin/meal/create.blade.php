@extends('dashboard.admin.layouts.app')
@section('home', '/meals')
@section('subtitle', __('words.create_meal'))
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto mt-5">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="fa-solid fa-list font-22 text-primary me-1"></i>
                        </div>
                        <h5 class="mb-0 text-primary">{{ __('words.create_meal') }}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action='{{ route('meals.store') }}' method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.name') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control"  type="text" name="name" id="regions" class="mb-3">
                            </div>
                            @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="state" class="form-label">{{ __('words.description') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" type="text" name="description" id="regions" class="mb-3">
                            </div>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">{{ __('words.price') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <input class="form-control" type='number' step="0.1" name="price" id="regions" class="mb-3">
                            </div>
                            @error('price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6">
                            <label for="state" class="form-label">{{ __('words.category') }}</label>
                            <div class="input-group"> <span class="input-group-text bg-transparent">
                                    <i class="fa-solid fa-list"></i>
                                </span>

                                <select class="form-control multiple-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                      

                        <div id="form-container" class="mt-5">
                            <div class="row form-group">
                                <div class="col-8">
                                    <label for="state" class="form-label">{{ __('words.item') }}</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
        
                                        <select class="form-control multiple-select" name="items[0][id]">
                                            @foreach ($items as $item)
                                                <option value="{{$item}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('items.0[id]')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        
                                <div class="col-md-4">
                                    <label for="inputLastName1" class="form-label">{{ __('words.quantity') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent"></span>
                                        <input type="number" name="items[0][quantity]" value="{{ old('quantity') }}" class="form-control border-start-0" id="inputLastName1" placeholder="{{ __('words.quantity') }}" />
                                        <div class="col-md-2">
                                            <button type="button" class="form-control btn btn-primary add-field">+</button>
                                        </div>
                                    </div>
                                    @error('items.0[quantity]')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex">
                            <button type="submit"
                                class="btn btn-primary px-5 ms-auto">{{ __('words.create_meal') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
            'w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    
</script>

<script>
    $(document).ready(function () {
        var index = 0;

        $(document).on('click', '.add-field', function (e) {
            e.preventDefault();
            var clonedField = $(this).closest('.form-group').clone();

            index++;

            clonedField.find('select[name^="items[0][\'id\']"]').attr('name', 'items[' + index + '][\'id\']');
            clonedField.find('input[name^="items[0][\'quantity\']"]').attr('name', 'items[' + index + '][\'quantity\']');

            clonedField.find('.add-field').removeClass('btn-primary add-field').addClass('btn-danger remove-field').text('-');
            $('#form-container').append(clonedField);
        });

        $(document).on('click', '.remove-field', function () {
            $(this).closest('.form-group').remove();
        });
    });
</script>

@endsection