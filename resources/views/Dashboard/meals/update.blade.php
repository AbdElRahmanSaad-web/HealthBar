<x-Admin.template>
    <x-Admin.form title="Create Meal" action="{{ route('admin.meals.store') }}" method='post'>
        @csrf
        <x-input-label value="Name"/>
        <x-text-input class="form-control" value={{$meal->name}} name='name'/>
        <x-input-label value="Description"/>
        <x-text-area name='description' class="form-control">{{$meal->description}}</x-text-area>
        <x-input-label value="Price"/>
        <x-text-input class="form-control" type='number' step="0.1"  value={{$meal->displayed_price}} name='displayed_price'/>


        <div class="fv-row col-12">
            <label class="required fs-6 mb-2 text-capitalize">Category</label>
            <select class="form-select form-select-solid mb-3 mb-lg-0 "  name="category[]" aria-label="" required>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @selected($category->id == $meal->categories)>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="fv-row col-12">
            <label class="required fs-6 mb-2 text-capitalize">Item</label>
            <select class="form-select form-select-solid mb-3 mb-lg-0 "  name="item[]" aria-label="" required>
                @foreach ($items as $item)
                    <option value="{{$item->id}}" @selected($item->id == $meal->item)>{{$item->name}}</option>
                @endforeach
            </select>

            <x-input-label value="Quantity"/>
            <x-text-input class="form-control" type='number' step="0.1" name='quantity'/>
        </div>

       
        <x-primary-button class="form-control btn btn-primary">
            Create Meal
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>