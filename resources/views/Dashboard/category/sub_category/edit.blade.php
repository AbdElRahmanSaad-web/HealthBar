<x-Admin.template>
    <x-Admin.form title="Update Sub Category" action="{{ route('admin.sub_categories.update', $cat->id) }}">
        @csrf
        @method('put')
        <x-input-label value="Name"/>
        <x-text-input class="form-control" value='{{$cat->name}}'  name='name'/>

        <div class="col-12">
            <label for="state" class="form-label">{{ __('words.main_category') }}</label>
            <div class="input-group"> <span class="input-group-text bg-transparent">
                    <i class="fa-solid fa-list"></i>
                </span>
                <select class="form-control multiple-select" multiple='multiple' name="categories[]" class="mb-3">
                    @foreach ($categories as $category)                                    
                        <option value="{{$category->id}}" @selected(in_array($category->id, $cat->MainCategory->pluck('id')->toArray()))>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('category.*')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
       
        <x-primary-button class="form-control btn btn-primary">
            Update Sub Category
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>

