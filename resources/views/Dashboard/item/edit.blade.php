<x-Admin.template>
    <x-Admin.form title="create User" action="{{ route('admin.items.update', $item->id) }}">
        @method('put')
        @csrf
        <x-input-label value="Name"/>
        <x-text-input class="form-control" value="{{$item->name}}"  name='name'/>
        <x-input-label value="Quantity"/>
        <x-text-input class="form-control" type='number' step="0.1" value="{{$item->quantity}}"  name='quantity'/>
        <x-input-label value="Price"/>
        <x-text-input class="form-control" type='number' step="0.1" value="{{$item->price}}"  name='price'/>
        <x-input-label value="Calories"/>
        <x-text-input class="form-control" type='number' step="0.1" value="{{$item->calories}}"  name='calories'/>
        <x-input-label value="Description"/>
        <x-text-input class="form-control" value="{{$item->description}}"  name='description'/>
       
        <x-primary-button class="form-control btn btn-primary">
            Update Item
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>