<x-Admin.template>
<style>
    .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

/* Ensure both select and button are displayed inline */
.d-flex {
    display: flex;
    align-items: center; /* Align items vertically */
}

/* Add margin between select and button */
.mr-2 {
    margin-right: 0.5rem; /* Adjust as needed */
}
</style>

    <x-table title="Orders">
        {{-- <div class="card">
            <div class="card-body"> --}}
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered w-100">
                <tr>
                    <th>Order ID</th>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <th>Clint name</th>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{ $order->productName }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    {{-- <td>{{ $order->status }}</td> --}}
                    <td>
                        <form method="POST" action="{{route('admin.orders.status',$order->id)}}">
                            @csrf
                            @method('PUT')
                        <div class="form-group d-flex">
                            <select name="status" class="form-control">
                                <option value="{{$order->status}}">{{$order->status }}</option>
                                    <option  value="pending">pending</option>
                                    <option  value="in_progress">in Progress</option>
                                    <option  value="out_for_delivery">Out For Delivery</option>
                                    <option  value="delivered">Delivered</option>
                            </select>
                            <button type="submit" class="btn btn-success">Aprove</button>
                        </div>
                        </form>
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $order->price }}</td>
                </tr>
                <tr>
                    <th>Delivery price</th>
                    <td>{{ $order->delivery_price }}</td>
                </tr>
                <tr>
                    <th>Promo Code</th>
                    <td>{{ $order->promoCode->code ?? '' }}</td>
                </tr>
                <tr>
                    <th>discount</th>
                    <td>{{ $order->discount ?? '' }}</td>
                </tr>
                <tr>
                    <th>total Price</th>
                    <td>{{ $order->total_price ?? '' }}</td>
                </tr>
                <tr>
                    <th>Total price after discount</th>
                    <td>{{ $order->total_price_after_discount ?? '' }}</td>
                </tr>
                <tr>
                    <th>Order date</th>
                    <td>{{ $order->order_date ?? '' }}</td>
                </tr>
                <tr>
                    <th>Notes</th>
                    <td>{{ $order->notes ?? '' }}</td>
                </tr>
            </table>
        </div>
        {{-- </div>
        </div> --}}

    </x-table>
</x-Admin.template>

{{--   $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->timestamp('order_date')->nullable();
            $table->string('status')->default('pending');
            $table->decimal('service_price')->nullable();
            $table->decimal('delivery_price')->nullable();
            $table->decimal('total_price')->nullable();
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('total_price_after_discount')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('promo_code_id')->references('id')->on('promo_codes');
--}}
