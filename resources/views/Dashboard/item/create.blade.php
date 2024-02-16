<x-Admin.template>
    <x-Admin.form title="create User" action="{{ route('admin.items.store') }}" method='post'>
        @csrf
        <x-input-label value="Name"/>
        <x-text-input class="form-control" name='name'/>
        <x-input-label value="Quantity"/>
        <x-text-input class="form-control" type='number' step="0.1" name='quantity'/>
        <x-input-label value="Price"/>
        <x-text-input class="form-control" type='number' step="0.1" name='price'/>
        <x-input-label value="Calories"/>
        <x-text-input class="form-control" type='number' step="0.1" name='calories'/>
        <x-input-label value="Description"/>
        <x-text-input class="form-control" name='description'/>
       
        <x-primary-button class="form-control btn btn-primary">
            Update Item
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>