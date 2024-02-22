<x-Admin.template>
    <x-Admin.form title="Create PromoCode" action="">
        <x-input-label value="Code"/>
        <x-text-input class="form-control"  name='code'/>
        <x-input-label value="Discount percentage" />
        <x-text-input class="form-control" name='discount_percentage'/>
        <x-input-label value="Max uses" />
        <x-text-input class="form-control" name='max_uses'/>
        {{-- <x-input-label value="password" />
        <x-text-input class="form-control" name='password'/> --}}
        <x-input-label value="Valid from" />
        <input class="form-control" type="date" name="valid_from">
        <x-input-label value="Valid to" />
        <input class="form-control" type="date" name="valid_to">
        <x-primary-button class="form-control btn btn-primary">
            Create PromoCode
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>
