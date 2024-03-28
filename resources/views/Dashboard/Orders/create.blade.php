<x-Admin.template>
    <x-Admin.form title="Create PromoCode" action="{{route('admin.promoCodes.store')}}">
        <x-input-label value="Code"/>
        <x-text-input class="form-control"  name='code'/>
        @error('code')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Discount percentage" />
        <x-text-input class="form-control" name='discount_percentage'/>
        @error('discount_percentage')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Max uses" />
        <x-text-input class="form-control" name='max_uses'/>
        @error('max_uses')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        {{-- <x-input-label value="password" />
        <x-text-input class="form-control" name='password'/> --}}
        <x-input-label value="Valid from" />
        <input class="form-control" type="date" name="valid_from">
        @error('valid_from')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Valid to" />
        <input class="form-control" type="date" name="valid_to">
        @error('valid_to')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-primary-button class="form-control btn btn-primary">
            Create PromoCode
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>
