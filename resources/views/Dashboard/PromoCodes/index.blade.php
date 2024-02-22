<x-Admin.template>
    <x-table title="Promo Codes" createRoute="{{ route('admin.promoCodes.create') }}">
        {{-- <div class="card">
            <div class="card-body"> --}}
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>code</th>
                                <th>Discount percentage</th>
                                <th>Max uses</th>
                                <th>Usage counter</th>
                                <th>Valid from</th>
                                <th>Valid to</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promoCodes as $promoCode)
                                <tr>
                                    <td>{{ $promoCode->code }}</td>
                                    <td>{{ $promoCode->discount_percentage }}</td>
                                    <td>{{ $promoCode->max_uses }}</td>
                                    <td>{{ $promoCode->usage_counter }}</td>
                                    <td>{{ $promoCode->valid_from }}</td>
                                    <td>{{ $promoCode->valid_to }}</td>
                                    {{-- <td>{{ $user->phone }}</td> --}}
                                    <td>
                                        <a href="" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    
                                        <a href="" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    
                                        <form action='' class='d-inline' method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    
                                    </td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            {{-- </div>
        </div> --}}

    </x-table>
    
    {{-- <x-table title="users" createRoute="{{ route('admin.users.create') }}"> --}}
        {{-- <div class="card">
            <div class="card-body"> --}}
                {{-- <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                                    
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    
                                        <form action='{{ route('admin.users.destroy', $user->id) }}' class='d-inline' method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    
                                    </td>                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
            {{-- </div>
        </div> --}}

    {{-- </x-table> --}}
    
</x-Admin.template>
