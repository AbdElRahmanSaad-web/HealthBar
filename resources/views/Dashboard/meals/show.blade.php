<x-Admin.template>
    <x-table title="Meals" createRoute="{{ route('admin.meals.create') }}">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>{{ __('words.name') }}</th>
                    <td>{{ $meal->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('words.displayed_price') }}</th>
                    <td>{{ $meal->displayed_price }}</td>
                </tr>
                <tr>
                    <th>{{ __('words.actual_price') }}</th>
                    <td>{{ $meal->actual_price }}</td>
                </tr>
                <tr>
                    <th>{{ __('words.calories') }}</th>
                    <td>{{ $meal->calories }}</td>
                </tr>
                {{-- <tr> 
                    <th>{{ __('words.category') }}</th>
                    <td>{{ $meal->name }}</td>
                </tr> --}}
            </table>
        </div>
    </x-table>
</x-Admin.template>