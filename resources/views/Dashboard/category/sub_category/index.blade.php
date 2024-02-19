<x-Admin.template>
    <x-table title="sub categories" createRoute="{{ route('admin.sub_categories.create') }}">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('words.main_category') }}</th>
                    <th>{{ __('words.sub_category') }}</th>
                    <th>{{ __('words.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <td>{{ $key++ }}</td>
                        <td>
                            @foreach ($category->MainCategory as $cat)        
                                {{ $cat->name }}
                            @endforeach
                        </td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-warning"
                            href="{{ route('admin.sub_categories.edit', $category->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-table>
</x-Admin.template>
