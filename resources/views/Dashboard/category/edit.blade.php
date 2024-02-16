<x-Admin.template>
    <x-Admin.form title="create User" action="{{ route('admin.categories.update', $category->id) }}">
        @method('put')
        @csrf
        <x-input-label value="Name"/>
        <x-text-input class="form-control" value="{{$category->name}}"  name='name'/>
       
        <x-primary-button class="form-control btn btn-primary">
            Update Category
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>