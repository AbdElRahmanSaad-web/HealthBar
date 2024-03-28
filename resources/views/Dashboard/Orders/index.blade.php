<x-Admin.template>

    <x-table title="Orders" >
        {{ $dataTable->table() }}
    </x-table>
    
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-Admin.template>

