<x-Admin.template>
    <x-table title="Meals" createRoute="{{ route('admin.meals.create') }}">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('words.name') }}</th>
                    <th>{{ __('words.price') }}</th>
                    <th>{{ __('words.calories') }}</th>
                    <th>{{ __('words.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($meals as $key => $meal)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $meal->name }}</td>
                        <td>{{ $meal->actual_price }}</td>
                        <td>{{ $meal->calories }}</td>
                        <td>
                            <a class="btn btn-success"
                            href="{{ route('admin.meals.show', $meal->id) }}"><i class="fa-solid fa-eye"></i></a> 
                            <a class="btn btn-warning"
                            href="{{ route('admin.meals.edit', $meal->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-table>
</x-Admin.template>