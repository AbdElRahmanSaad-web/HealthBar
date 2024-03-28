<x-Admin.template>
    <x-Admin.form title="Update User" action="{{route('admin.promoCodes.update')}}" method="post">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{$promoCode->id}}">
        <x-input-label value="Code"/>
        <x-text-input class="form-control"  name='code' value="{{$promoCode->code}}"/>
        @error('code')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Discount percentage" />
        <x-text-input class="form-control" name='discount_percentage' value="{{$promoCode->discount_percentage}}"/>
        @error('discount_percentage')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Max uses" />
        <x-text-input class="form-control" name='max_uses' value="{{$promoCode->max_uses}}"/>
        @error('max_uses')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        {{-- <x-input-label value="password" />
        <x-text-input class="form-control" name='password'/> --}}
        <x-input-label value="Valid from" />
        <input class="form-control" type="date" name="valid_from" value="{{$promoCode->valid_from}}">
        @error('valid_from')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-input-label value="Valid to" />
        <input class="form-control" type="date" name="valid_to" value="{{$promoCode->valid_to}}">
        @error('valid_to')
        <small class="form-text text-danger">{{ $message }}</small>
        @enderror

        <x-primary-button class="form-control btn btn-primary">
            Update promo Code
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template>


{{-- <x-Admin.template>
    <x-Admin.form title="Update User" action="{{ route('admin.users.update', $user->id)}}" method="post">
        @method('put')
        @csrf
        <x-input-label value="Name"/>
        <x-text-input class="form-control"  name='name' value="{{$user->name}}"/>
        <x-input-label value="email" />
        <x-text-input class="form-control" name='email' value="{{$user->email}}"/>
        <x-input-label value="phone" />
        <x-text-input class="form-control" name='phone' value="{{$user->phone}}"/>
        <x-input-label value="password" />
        <x-text-input class="form-control" name='password'/>
        <x-primary-button class="form-control btn btn-primary">
            Update User
        </x-primary-button>
    </x-Admin.form>
</x-Admin.template> --}}
