@extends('layouts.landing.app')
@section('css')
    <style>
        .profile-user-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 15px 25px;
            border: 1px solid black;
            border-radius: 15px;
        }

        .rides {
            padding: 15px 25px;
            border: 1px solid black;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .rides h4 {
            color: #003361;
            font-size: 19px;
            font-weight: 600;
            align-self: flex-start;
        }

        a {
            text-decoration: none;
        }

        .user-details a {
            text-decoration: none;
            align-self: flex-start;
        }

        .profile-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            color: #566577;
            cursor: pointer;
        }

        .profile-btn i {
            font-size: 14px;
        }

        .profile-btn p {
            font-size: 14px;
            font-weight: 600;
            margin-top: 0;
        }

        .user-image {
            margin-top: 1.5rem;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid black;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-image img {
            width: 50px;
            height: 50px;
        }

        .username {
            margin-top: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #003361;
        }

        .details {
            margin-top: 15px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid black;
            border-radius: 10px;
        }

        .box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 12px 0;
            color: black;
        }

        .box i {
            font-size: 20px;
        }

        .box p {
            font-size: 14px;
            font-weight: 600;
            margin-top: 0;
        }

        .no-orders {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 1rem;
            font-size: 16px;
            font-weight: 600;
        }

        .no-orders a {
            text-decoration: none;
            color: #f89520;
        }

        .table td {
            font-size: 14px;
            font-weight: 600;
        }

        .table .delivery-boy {
            padding: 5px 10px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: red;
            cursor: pointer;
        }

        .table>:not(caption)>*>* {
            border-bottom-width: 0px;
        }

        .delivery-boy-details {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .delivery-boy-details h4 {
            font-size: 16px;
            font-weight: 600;
        }

        .delivery-boy-details p {
            font-size: 14px;
            font-weight: 500;
        }

        .my-orders,
        .my-transaction {
            margin-top: 20px;
            width: 100%;
        }

        .my-orders button,
        .my-transaction button {
            width: 100%;
            padding: 8px 12px;
            border: none;
            outline: none;
            border-radius: 8px;
            background-color: rgb(114, 228, 114);
            font-size: 14px;
            font-weight: 700;
        }

        .my-orders button:hover,
        .my-transaction button:hover {
            background-color: green;
            color: white;
        }

        #ride-page {
            display: block;
        }

        #transaction-page {
            display: none;
        }

        @media (max-width: 767px) {
            .table-responsive {
                overflow-x: auto;
            }

            .table {
                min-width: 600px;
            }
        }
    </style>
@endsection
@section('content')
    @if (
        $user->userkyc === null ||
            ($user->userkyc && $user->userkyc->is_verified == 0 && $user->userkyc->is_reject == 0) ||
            ($user->userkyc && $user->userkyc->is_reject == 2))
        <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
            <h3 style="text-align: center; color:red; margin-top: 100px;">Please Verify your <a href="/profile"
                    style="color:blue;">KYC</a> and Track your orders</h3>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

            <lottie-player src="https://lottie.host/8d774174-a825-4f4a-9b0f-0d044a7c4635/ngGjtlOoqe.json"
                background="##FFFFFF" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1"
                mode="normal"></lottie-player>
        </div>
    @else
        <div class="container-fluid px-5" style="margin-top: 2rem; margin-bottom: 2rem;" id="ride-page">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 mt-3">
                    <div class="profile-user-details">
                        <a href="#" class="profile-btn">
                            <div class="profile-btn">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p class="mb-0">Profile</p>
                            </div>
                        </a>
                        <div class="user">
                            <div class="user-image">
                                <img src="/public/assets/landing/image/user.svg" alt="User">
                            </div>
                        </div>

                        <h4 class="username">{{ Auth::user()->f_name }}</h4>

                        <div class="details">
                            <div class="box">
                                <i class="fa-solid fa-phone"></i>
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                            <div class="box">
                                <i class="fa-solid fa-envelope"></i>
                                <p class="mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="my-transaction" onclick="showTransactionPage()">
                            <button>My Transactions</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-12 mt-3">
                    <div class="rides">
                        <h4>My Rides</h4>

                        <div class="table-responsive">
                            <div class="rides-list" style="margin-top: 2rem; width:100%;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Product Name</th>
                                            <th>Total Price</th>
                                            <th>Ride Status</th>
                                            <th>Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($orders->isEmpty())
                                            <tr>
                                                <td colspan="5" style="text-align: center;">
                                                    <div class="no-orders">
                                                        <p class="mb-0 mt-0">No Trips Found</p>
                                                        <a href="{{ route('rental_bike') }}">Plan one Now!</a>
                                                    </div>
                                                    <iframe
                                                        src="https://lottie.host/embed/843abefb-7087-4f85-91a6-69cba120f737/fmtl9wHyEa.json"></iframe>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($orders as $index => $order)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $order->items[0]->bike->name }}</td>
                                                    <td>{{ $order->order_amount ?? 'N/A' }}</td>
                                                    <td>{{ $order->order_status ?? 'N/A' }}</td>
                                                    <td class="delivery-boy" type="button" data-toggle="modal">
                                                        <a href="{{ route('invoice', ['id' => $order->id]) }}">View</a>
                                                    </td>

                                                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delivery
                                                                        Boy
                                                                        Details</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="delivery-boy-details">
                                                                        <h4>Harish</h4>
                                                                        <a href="#"></a>
                                                                        <p>9876543210</p>
                                                                        </a>
                                                                        <p>Kindly Contact him for further process</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-5" style="margin-top: 4rem; margin-bottom: 2rem;" id="transaction-page">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="profile-user-details">
                        <a href="#" class="profile-btn">
                            <div class="profile-btn">
                                <i class="fa-solid fa-arrow-left"></i>
                                <p class="mb-0">Profile</p>
                            </div>
                        </a>
                        <div class="user">
                            <div class="user-image">
                                <img src="/public/assets/landing/image/user.svg" alt="User">
                            </div>
                        </div>

                        <h4 class="username">{{ Auth::user()->f_name }}</h4>

                        <div class="details">
                            <div class="box">
                                <i class="fa-solid fa-phone"></i>
                                <p class="mb-0">{{ Auth::user()->phone }}</p>
                            </div>
                            <div class="box">
                                <i class="fa-solid fa-envelope"></i>
                                <p class="mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <div class="my-orders" onclick="showOrderPage()">
                            <button>My Orders</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 col-12 mt-4">
                    <div class="rides">
                        <h4>Transaction History</h4>

                        <div class="table-responsive">
                            <div class="rides-list" style="margin-top: 2rem; width:100%;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Product Name</th>
                                            <th>Total Price</th>
                                            <th>Payment ID</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($orders->isEmpty())
                                            <tr>
                                                <td colspan="5" style="text-align: center;">
                                                    <div class="no-orders">
                                                        <p class="mb-0 mt-0">No Transactions</p>
                                                    </div>
                                                    <iframe
                                                        src="https://lottie.host/embed/e641a942-8bfa-46a5-8886-dee0cd01666e/Wm8JpUSH6X.json"></iframe>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($orders as $index => $order)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $order->items[0]->name }}</td>
                                                    <td>{{ $order->order_amount ?? 'N/A' }}</td>
                                                    <td>{{ $order->transaction_reference ?? 'N/A' }}</td>
                                                    <td class="order-date">{{ $order->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection

<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateElements = document.querySelectorAll('.order-date');
        dateElements.forEach(function(element) {
            const rawDate = element.innerText;
            const formattedDate = moment(rawDate).format('DD-MM-YYYY');
            element.innerText = formattedDate;
        });
    });
</script>

<script>
    function showTransactionPage() {
        var transactionPage = document.getElementById('transaction-page');
        var ridePage = document.getElementById('ride-page');

        ridePage.style.display = 'none';
        transactionPage.style.display = 'block';
    }

    function showOrderPage() {
        var transactionPage = document.getElementById('transaction-page');
        var ridePage = document.getElementById('ride-page');

        ridePage.style.display = 'block';
        transactionPage.style.display = 'none';
    }
</script>
