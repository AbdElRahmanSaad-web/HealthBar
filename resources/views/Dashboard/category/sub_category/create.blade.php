<x-Admin.template>
    <x-Admin.form title="Create Sub Category" action="{{ route('admin.sub_categories.store') }}">
        <x-input-label value="Name"/>
        <x-text-input class="form-control"  name='name'/>

        <div class="col-12">
            <label for="state" class="form-label">{{ __('words.main_category') }}</label>
            <div class="input-group"> <span class="input-group-text bg-transparent">
                    <i class="fa-solid fa-list"></i>
                </span>
                <select class="form-control multiple-select" multiple='multiple' name="categories[]" class="mb-3">
                    @foreach ($categories as $category)                                    
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('category.*')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
       
        <x-primary-button class="form-control btn btn-primary">
            Create Sub Category
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>

