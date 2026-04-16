@extends('layouts.backend.app')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('title', 'Order')

@section('content')
    <style>
        .order-status {
            width: 155px !important;
            border: none !important;
            text-align: center !important;
        }
    </style>
    <div class="widget-content widget-content-area br-6">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 style="color: gray; font-weight: 600">Order List</h4>

            </div>
        </div>
        <div class="table-responsive mb-4 mt-4">
            <table class="multi-table table table-striped table-bordered table-hover non-hover" style="width:100%;height:auto;">
                <thead>
                    <tr>
                        <th class="text-center" width="%">ID</th>
                        <th>Order NO</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Delivary Charge</th>
                        <th>Total Price</th>
                        <th class="text-center">status</th>
                        <th class="text-center">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key =>  $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $order->order_no }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td> {{ $order->quantity }}</td>
                            <td>{{ $order->subtotal }} BDT</td>
                            <td>{{ $order->delivery_charge }} BDT</td>
                            <td>{{ $order->total_price }} BDT</td>
                            

                            <td class="text-center">
                                <form>
                                    <select class="order-status" data-id={1200} name="status"
                                        onchange="updateStatus(this)">
                                        <option value="Pending-{{ $order->id }}"
                                            {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Confirm-{{ $order->id }}"
                                            {{ $order->status == 'Confirm' ? 'selected' : '' }}>Confirm
                                        </option>
                                        <option value="Delivered-{{ $order->id }}"
                                            {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                            Delivered</option>
                                    </select>
                                </form>
                                
                            </td>
                            <td>
                            {{-- Show Button Below Status --}}
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info mt-2">
                                    Show
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function updateStatus(selectElement) {

            let selectedOption = selectElement.value; // Get selected <option>

            let arr = selectedOption.split("-");

            $.ajax({
                url: '{{ route('admin.order.status') }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    // mode: mode,
                    id: arr[1],
                    status:arr[0]
                },
                success: function(response) {
                    console.log(response.msg);
                    if (response.status == true) {
                        alert(response.msg);
                    } else {
                        alert('The was an error');
                    }


                }
            })


        }

        $(document).ready(function() {
            $('.dropify').dropify();



        });

        function deleteproduct(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });

                    let form = $(`#delete-form-${id}`);
                    form.submit();
                }
            });
        }
    </script>
@endpush
