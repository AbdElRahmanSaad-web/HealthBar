<x-Admin.template>
    <x-table title="categories" createRoute="{{ route('admin.items.create') }}">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('words.name') }}</th>
                    <th>{{ __('words.price') }}</th>
                    <th>{{ __('words.quantity') }}</th>
                    <th>{{ __('words.calories') }}</th>
                    <th>{{ __('words.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->calories }}</td>
                        <td>
                            <a class="btn btn-warning"
                            href="{{ route('admin.items.edit', $item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-table>
</x-Admin.template>