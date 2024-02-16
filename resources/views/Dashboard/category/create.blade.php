<x-Admin.template>
    <x-Admin.form title="create User" action="{{ route('admin.categories.store') }}">
        <x-input-label value="Name"/>
        <x-text-input class="form-control"  name='name'/>
       
        <x-primary-button class="form-control btn btn-primary">
            create Category
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>