<x-Admin.template>

    <x-table title="Promo Codes" >
        {{ $dataTable->table() }}
    </x-table>
    
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-Admin.template>

