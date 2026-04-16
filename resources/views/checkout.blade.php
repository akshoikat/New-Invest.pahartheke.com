<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />

    <title>Pahar Theke</title>

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- siliguri font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- roboto font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
    <style>
        .total-number-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qty-btn {
            background-color: #ddd;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
        }

        .qty-btn:hover {
            background-color: #bbb;
        }
        @media (max-width: 560px) {
            .total-img-wrap img {
                height: 40px!important;
            }
        }
    </style>


    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '994412389332701');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=994412389332701&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>
    <section class="checkout-section">
        <div class="container">
            <div class="checkout-form">
                <!-- form aria -->
                {{-- <p class="text-center">Order Section</p> --}}
                <form id="checkout-form" class="billing-layout"
                    action ="{{ route('frontend.checkout.store', $product->id) }}" method="GET">
                    @csrf
                    <div class="billing-block">
                        <h4 class="form-blocks-title">Billing details</h4>
                        <div class="inputs-wrapper">

                            <input type="text" name="name" class="mb-3" placeholder="আপনার নাম *" name="" id=""
                                required>
                            {{-- <span class="error-text">আপনার নাম is required</span> --}}
                            <input type="number" name="phone" class="mb-3" placeholder="মোবাইল নাম্বার *" name=""
                                id="" required>
                            {{-- <span class="error-text">মোবাইল নাম্বার * is required</span> --}}
                            <input type="text" name="address" placeholder="বাড়ী, রোড, থানা, জেলা, বিভাগ *" name=""
                                id="" required>
                            {{-- <span class="error-text">সম্পূর্ণ ঠিকানা is required</span> --}}

                        </div>
                    </div>
                    <div class="order-block">
                        <h4 class="form-blocks-title">Your order</h4>

                        <div class="product-subtotal-wrap">
                            <span>Product</span>
                            <span>Subtotal</span>
                        </div>

                        @php
                            $subtotal = 0;
                        @endphp


                        @php
                            $subtotal += $product->discount_price * $product->quantity;
                        @endphp
                        <div class="total-block" data-id="{{ $product->id }}"
                            data-price="{{ $product->discount_price }}">
                            <div class="total-img-wrap">
                                <img style="height: 90px; width:auto;" src="{{ $product->thumb_url }}" alt="">
                                <div class="total-title">{{ $product->name }}</div>
                            </div>
                            <div class="total-number-wrap">
                                <a class="qty-btn minus">−</a>
                                <span class="tatal-number">{{$product->quantity}}</span>
                                <input type="hidden" class="tatal-number" value="{{$product->quantity}}" id="quantity" name="quantity">
                                <a class="qty-btn plus">+</a>
                            </div>
                            <div class="total-price">
                                <span class="price">{{ $product->discount_price * $product->quantity }}</span>
                                <span class="currency-symble">৳</span>
                            </div>
                        </div>


                        <div class="product-subtotal-wrap">
                            <span>Subtotal</span>
                            <span class="total-price"> <span id="subtotal">{{ $subtotal }}</span> <span
                                    class="currency-symble">৳</span></span>
                        </div>




                        <div class="shiping">
                            <span class="shiping-text">shipping</span>
                            <div>
                                <input type="radio" name="shipping" id="shipping_cost" value="{{ $product->shipping_cost }}" checked>
                                <label for="shipping_cost">{{ $product->shipping_cost }} ৳</label>
                            </div>
                        </div>


                         <!-- <div class="shiping">
                            <span class="shiping-text">Shipping</span>
                            <div class="Outside-inside-wrapper">
                                <div class="">
                                    <input type="radio" name="shipping" id="shipping" value="{{ $product->shipping_cost }}" checked>
                                    <label for="shipping_cost"><span class="currency">{{$product->shipping_cost}} <span
                                    class="currency-symble">৳</span></span></label>
                                </div>
                            </div>
                        </div>  -->
                        <div class="total-wrapper">
                            <span>Total</span>
                            <span>
                                <span class="currency" id="total">{{ $subtotal + $product->shipping_cost }}</span>
                                <span class="currency-symble">৳</span>
                            </span>
                        </div>

                        <div class="total-wrapper mt-4">
                            <p>Note: Total amount may vary due to the actual weight of the product.</p>
                        </div>

                        <div class="cash-on">
                            <div class="cash-on-title">Cash on delivery</div>
                            <div class="cash-on-short-text">
                                পন্য হাতে পেয়ে ডেলিভারী ম্যানকে পেমেন্ট করতে পারবেন।
                            </div>
                        </div>

                        <div class="cash-on-button-aria">
                            <div class="personal-info">
                                Your personal data will be used to process your order, support your experience
                                throughout this website,
                                and for other purposes described in our <a href="#">privacy policy</a>
                            </div>
                            <button class="order-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-lock"></i>
                                <span class="order-place-text">
                                    <span class="place-order">Place order</span>
                                </span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>


<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="width: 98vw; max-height: 90vh; overflow: hidden;">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Order Placed Successfully!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="overflow-y: auto; max-height: 75vh; padding: 10px;">
                <p id="successMessage1" style="font-size: 18px;">Thank You For Your Order!</p>
                <p id="successMessage2">Your order has been placed successfully.</p>
                <div id="order_table">

                </div>
            </div>
            <div class="modal-footer">
                <a style="margin: auto" href="{{route("frontend.home")}}"><button  type="button" class="btn btn-primary" data-bs-dismiss="modal" style="margin: auto; width: 90px;">OK</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="width: 98vw; max-height: 90vh; overflow: hidden;">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">Error!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="overflow-y: auto; max-height: 75vh; padding: 10px;">
                <p id="errorMessage" style="font-size: 18px;">An error occurred. Please try again later.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="margin: auto; width: 90px;">OK</button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Left-align the table header */
    .table thead {
        direction: ltr;
    }

    .table thead th {
        text-align: left;
    }

    /* Right-align the table body */
    .table tbody {
        direction: rtl;
    }

    .table tbody td {
        text-align: right;
    }

    /* Scrollable Modal Body */
    @media (max-width: 400px) {
        .modal-dialog {
            max-width: 98vw;
        }

        .modal-content {
            width: 98vw;
            max-height: 90vh;
        }

        .modal-body {
            max-height: 75vh;
            overflow-y: auto;
        }

        .table {
            font-size: 12px;
        }

        .table th, .table td {
            padding: 5px;
        }

        .modal-footer button {
            width: 80px;
        }
    }
</style>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>

    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- custom js -->
    <script src="{{ asset('frontend/js/swiper.js') }}"></script>


    <script>

        document.addEventListener("DOMContentLoaded", function() {
            const updateTotal = () => {
                let subtotal = 0;
                document.querySelectorAll(".total-block").forEach((block) => {
                    let quantity = parseInt(block.querySelector(".tatal-number").innerText);
                    let price = parseFloat(block.dataset.price);
                    let totalPriceElement = block.querySelector(".price");

                    let totalPrice = price * quantity;
                    totalPriceElement.innerText = totalPrice.toFixed(2);
                    subtotal += totalPrice;
                });

                document.getElementById("subtotal").innerText = subtotal.toFixed(2);

                let shippingCost = parseFloat(document.querySelector("input[name='shipping']:checked").value);
                let total = subtotal + shippingCost;
                document.getElementById("total").innerText = total.toFixed(2);
                document.getElementById("final-total").innerText = total.toFixed(2);
            };

            var minQty ="{{$product->quantity}}";

            document.querySelectorAll(".qty-btn").forEach((btn) => {
                btn.addEventListener("click", function() {
                    let block = this.closest(".total-block");
                    let quantityElement = block.querySelector(".tatal-number");
                    let quantity = parseInt(quantityElement.innerText);

                    if (this.classList.contains("plus")) {
                        quantity++;
                    } else if (this.classList.contains("minus") && quantity > minQty) {
                        quantity--;
                    }

                    quantityElement.innerText = quantity;
                    document.getElementById('quantity').value = quantity;
                    updateTotal();
                });
            });

            document.querySelectorAll("input[name='shipping']").forEach((radio) => {
                radio.addEventListener("change", updateTotal);
            });

            updateTotal();
        });

        $(document).ready(function() {
            $("#checkout-form").submit(function(event) {
                event.preventDefault(); 

                let formData = $(this).serialize(); 

                $.ajax({
                    url: $(this).attr("action"), 
                    type: "GET", 
                    data: formData,
                    dataType: "json", 
                    beforeSend: function() {
                        $(".order-button").prop("disabled", true).text("Processing...");
                    },
                    success: function(response) {
                        if (response.success) {
                            // Show Success Modal
                            $("#successModalLabel").text("Order Placed Successfully!");
                            $("#successMessage1").text("Thank You For Your Order!");
                            $("#successMessage2").text("Your order has been placed successfully.");
                            $("#successMessage3").text("Show Order Dettails");

                            if(response.order){

                                let html = "";
                                const order = response.order;

                                html += `<div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead class="table-light"> 
                                                    <tr>
                                                        <th>Order No</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Subtotal</th>
                                                        <th>Delivery Charge</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>${order.order_no}</td>
                                                        <td>${order.name}</td>
                                                        <td>${order.quantity}</td>
                                                        <td>${order.subtotal}</td>
                                                        <td>${order.delivery_charge}</td>
                                                        <td>${order.total_price}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>`;

                                $('#order_table').html(html);

                            }
                            $("#successModal").modal("show");
                        }
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            let errorMsg = Object.values(errors).map(err => err.join("\n")).join("\n");
                            $("#errorModalLabel").text("Error!");
                            $("#errorMessage").text("ত্রুটি:\n" + errorMsg);
                        } else {
                            $("#errorModalLabel").text("Error!");
                            $("#errorMessage").text("কিছু ভুল হয়েছে, অনুগ্রহ করে পরে চেষ্টা করুন!");
                        }
                        // Show Error Modal
                        $("#errorModal").modal("show");
                    },
                    complete: function() {
                        $(".order-button").prop("disabled", false).text("Place Order");
                    }
                });
            });
        });

    </script>
</body>

</html>
