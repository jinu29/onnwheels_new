@extends('layouts.landing.app')
@section('css')
<style>

    body {
        background-color: #efeeee;
    }

    .user-details {
        display: flex;
        flex-direction: column;
        background-color: white;
        padding: 15px 25px;
    }

    .profile-btn {
        display: flex;
        align-items: center;
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
    }

    .user {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 2rem 0;
        gap: 15px;
    }

    .user-image {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        border: 2px solid #6C99FB;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-image img {
        width: 75px;
        height: 75px;
        border-radius: 50%;
    }

    .user-name {
        font-size: 18px;
        font-weight: 700;
    }

    .details {
        display: flex;
        align-items: center;
        gap: 15px;
        color: #566577;
    }

    .details p {
        font-size: 13px;
        font-weight: 600;
    }

    .edit-profile {
        background-color: #efeeee;
        color: black;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 10px;
        border-radius: 15px;
        font-size: 12px;
        cursor: pointer;
    }

    .edit-profile p {
        font-weight: 600;
    }

    .profile-contact-details {
        display: flex;
        flex-direction: column;
        align-self: flex-start;
        margin-top: 25px;
        gap: 15px;
    }

    .box {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .contact {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #566577;
        font-size: 14px;
    }

    .contact p {
        font-weight: 600;
    }

    .box h6 {
        font-size: 14px;
        font-weight: 600;
    }

    .booking-details {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }

    .booking-title {
        font-size: 15px;
        font-weight: 600;
    }

    .booking {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .booking-btn {
        padding: 10px 15px;
        background-color: rgba(228, 97, 97, 0.829);
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-radius: 15px;
        color: white;
        cursor: pointer;
        border: none;
        outline: none;
    }

    .booking-btn:nth-child(2) {
        background-color: green;
    }

    .booking-btn:nth-child(3) {
        background-color: rgb(218, 218, 76);
    }

    /* ------------------------------------------- */
    .transaction-details {
        background-color: white;
        padding: 15px 25px;
        border-radius: 20px;
    }

    .icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #e0ffee;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon img {
        width: 20px;
        height: 20px;
    }

    .bikes {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .counts p {
        font-size: 12px;
        font-weight: 600;
        color: #ACACAC;
    }

    .counts h3 { 
        font-size: 18px;
        font-weight: 600;
    }

    .transaction-history {
        background-color: white;
        padding: 15px 25px;
        border-radius: 20px;
    }

    .row-one {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .row-one h4 {
        font-size: 20px;
        font-weight: 600;
    }

    .transaction-table {
        margin: 1.5rem 0;
    }

    th {
        color: #B5B7C0;
        font-size: 13px;
        font-weight: 600;
    }

    .name {
        color: black;
    }

    td {
        color: black;
        font-size: 13px;
        font-weight: 500;
    }

    .status {
        text-align: center;
        color: green;
        font-size: 15px;
        font-weight: 600;
    }

    .table thead th {
        border: none;
    }

    tbody tr {
        border-top: 1px solid #dee2e6;
    }

    .pages {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .entries {
        color: #B5B7C0;
        font-size: 14px;
        font-weight: 500;
    }

    /* --------------------------------- */
    .transaction-page {
        display: block;
    }

    .booking-page {
        display: none;
    }

    .wishlist-page {
        display: none;
    }

    .docs-page {
        display: none;
    }

    .profile-page {
        display: none;
    }

    .bookings {
        background-color: white;
        padding: 15px 25px;
        border-radius: 20px;
    }

    .booking-table {
        margin: 2rem 0;
    }

    .tracking p {
        color: #566577;
        font-size: 14px;
        font-weight: 600;
    }

    .tracking a {
        text-decoration: none;
    }

    /* -------------------------- wishlist products*/
    .card {
        border-radius: 8px;
    }
    
    .card-body {
        position: relative;
        border-radius: 20px;
    }
    
    .fa-heart {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .new {
        font-size: 12px;
        font-weight: bold;
        color: #fff;
    }
    
    .new {
        --f: .5em; 
        position: absolute;
        top: 0;
        left: 0;
        line-height: 1.8;
        padding-inline: 1lh;
        padding-bottom: var(--f);
        border-image: conic-gradient(#0008 0 0) 51%/var(--f);
        clip-path: polygon(
        100% calc(100% - var(--f)),100% 100%,calc(100% - var(--f)) calc(100% - var(--f)),var(--f) calc(100% - var(--f)), 0 100%,0 calc(100% - var(--f)),999px calc(100% - var(--f) - 999px),calc(100% - 999px) calc(100% - var(--f) - 999px));
        transform: translate(calc((cos(45deg) - 1)*100%), -100%) rotate(-45deg);
        transform-origin: 100% 100%;
        background-color: red; /* the main color  */
    }
    
    .discount {
        position: absolute;
        background-color: green;
        padding: 2px 8px;
        font-size: 10px;
        font-size: 700;
        color: white;
        top: 230px;
        right: 0;
    }
    
    .icons {
        color: rgb(194, 192, 192);
        font-size: 15px;
    }
    
    .product-title {
        font-size: 13px;
        font-weight: 700;
        color: #003360;
    }
    
    .price {
        font-size: 14px;
        font-weight: 700;
    }

    .btn {
        padding: 8px 15px;
        background-color: #003360;
        color: white;
        font-size: 12px;
        font-weight: 500;
        border: none;
        outline: none;
        align-self: center;
        border-radius: 8px;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 600;
    }

    .form-group input {
        border: 1px solid rgb(241, 238, 238);
    }

    .page-row-one {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-row-one i {
        cursor: pointer;
    } 

    .profile-page {
        background-color: white;
        padding: 15px 25px;
        border-radius: 20px;
    }

    .profile {
        margin: 2rem 0;
    }


    /* --------------------------------- */

    .group {
        position: relative;
        margin: 45px 0;
    }
  
    textarea {
        resize: none;
    }
    
    input,
    textarea {
        background: none;
        font-size: 18px;
        padding: 8px 0 5px 0;
        display: block;
        width: 320px;
        border: none;
        border-radius: 0;
        border-bottom: 1px solid black;
        &:focus {
        outline: none;
        }
        &:focus ~ label,
        &:valid ~ label {
        top: -14px;
        font-size: 12px;
        color: #2196F3;
        }
        &:focus ~ .bar:before {
        width: 320px;
        }
    }
    
    input[type="password"] {
        letter-spacing: 0.3em;
    }
    
    label {
        font-size: 16px;
        font-weight: 600;
        position: absolute;
        pointer-events: none;
        left: 5px;
        top: 10px;
        transition: 300ms ease all;
        color:#003360;
    }
    
    .bar {
        position: relative;
        display: block;
        width: 320px;
        &:before {
        content: '';
        height: 2px;
        width: 0;
        bottom: 0px;
        position: absolute;
        background: #003360;
        transition: 300ms ease all;
        left: 0%;
        }
    }

    .file-input__label {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        border-radius: 4px;
        font-size: 14px;
        font-weight: 600;
        color: black;
        font-size: 14px;
        padding: 10px 12px;
        background-color: #003360;
    }

    .file-input__label svg {
        height: 16px;
        margin-right: 4px;
    }

  
</style>
@endsection
@section('content')
    <div class="container" style="margin-top: 2rem; margin-bottom: 2rem;">
        <div class="row">
            <div class="col-4">
                
                <div class="user-details">
                    <a href="#">
                        <div class="profile-btn">
                            <i class="fa-solid fa-arrow-left"></i>
                            <p class="mb-0">Profile</p>
                        </div>
                    </a>

                    <div class="user">
                        <div class="user-image">
                        <img src="{{ asset('public/assets/profile/' . $user->image) }}" alt="User">
                        </div>
                        <h4 class="user-name mb-0">{{$user->f_name}}</h4>
                        <div class="details">
                            <p class="age mb-0">22</p>
                            <p class="place mb-0">BHEL</p>
                            <p class="place mb-0">Trichy</p>
                        </div>
                        <div class="edit-profile" onclick="showProfilePage()">
                            <i class="fa-solid fa-pencil"></i>
                            <p class="mb-0">Edit Profile</p>
                        </div>
                        <div class="profile-contact-details">
                            <div class="box">
                                <div class="contact">
                                    <i class="fa-solid fa-phone"></i>
                                    <p class="mb-0">Contact</p>
                                </div>
                                <h6 class="mb-0">{{$user->phone}}</h6>
                            </div>

                            <div class="box">
                                <div class="contact">
                                    <i class="fa-solid fa-envelope"></i>
                                    <p class="mb-0">Email</p>
                                </div>
                                <h6 class="mb-0">{{$user->email}}</h6>
                            </div>

                            <div class="box">
                                <div class="contact">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="mb-0">Location</p>
                                </div>
                                <h6 class="mb-0">Gandhipuram</h6>
                            </div>
                        </div>
                    </div>

                    <div class="booking-details">
                        <h4 class="booking-title">Booking Details</h4>
                        <div class="booking">
                            <button type="button" class="booking-btn" onclick="showBookingPage()">
                                My Bookings <i class="fas fa-arrow-right"></i>
                            </button>

                            <button type="button" class="booking-btn" onclick="showWishlistPage()">
                                Wishlist <i class="fas fa-arrow-right"></i>
                            </button>

                            <button type="button" class="booking-btn"  onclick="showDocPage()">
                                KYC Verification <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="transaction">
                    <div class="row">

                        <div class="col-12">
                            <div class="transaction-details row">

                                <div class="bikes col-4 p-0">
                                    <div class="icon">
                                        <img src="/public/assets/landing/image/profile-2user.png" alt="">
                                    </div>
                                    <div class="counts">
                                        <p class="mb-0">Total Bike Booked</p>
                                        <h3 class="mb-0">25</h3>
                                    </div>
                                </div>

                                <div class="bikes col-4 p-0">
                                    <div class="icon">
                                        <img src="/public/assets/landing/image/profile-tick.png" alt="">
                                    </div>
                                    <div class="counts">
                                        <p class="mb-0">Total transaction</p>
                                        <h3 class="mb-0">Rs.2500</h3>
                                    </div>
                                </div>

                                <!-- <div class="bikes col-4 p-0">
                                    <div class="icon">
                                        <img src="/public/assets/landing/image/monitor.png" alt="">
                                    </div>
                                    <div class="counts">
                                        <p class="mb-0">Wallet</p>
                                        <h3 class="mb-0">RS.1580</h3>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="col-12 p-0 mt-3 transaction-page">
                            <div class="transaction-history">
                                <div class="row-one">
                                    <h4 class="mb-0">Transaction History</h4>
                                    <div class="search">
                                        <div class="input-group search-bar">
                                            <div class="input-group-prepend" style="cursor: pointer;">
                                              <span class="input-group-text search-icon"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search">
                                        </div>
                                    </div>
                                </div>
                                <div class="transaction-table">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">UPI ID</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>Logeshwar@Axisbank</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Success</td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>Logeshwar@Axisbank</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Success</td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>Logeshwar@Axisbank</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Success</td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>Logeshwar@Axisbank</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Success</td>
                                          </tr>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>Logeshwar@Axisbank</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Success</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pages">
                                    <div class="entries">
                                        <p class="mb-0">Showing data 1 to 8 of  256 entries</p>
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 p-0 mt-3 booking-page">
                            <div class="bookings">
                                <div class="page-row-one" onclick="showTransactionPage()">
                                    <i class="fas fa-arrow-left"></i>
                                    <h4 class="mb-0">Bookings</h4>
                                </div>
                                <div class="booking-table">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Bike Number</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row" class="name">Keerthi</th>
                                            <td>7373851852</td>
                                            <td>TN 43 AK 4301</td>
                                            <td>16.04.2024</td>
                                            <td class="status">Approved</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tracking">
                                    <a href="https://www.google.com/maps/dir//Current+Location/Your+Destination/@currentLocation" target="_blank">
                                        <p>Track my Booking</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 p-0 mt-3 wishlist-page">
                            <div class="bookings">
                                <div class="page-row-one" onclick="showTransactionPage()">
                                    <i class="fas fa-arrow-left"></i>
                                    <h4 class="mb-0">Wishlist</h4>
                                </div>
                                <div class="products row mt-4">
                                    <div class="col-4">
                                        <div class="card text-center">
                                            <div class="card-body p-2 d-flex flex-column text-center">
                                                <img src="/public/assets/landing/image/scooty1.png">
                                                <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                    <p class="new">New</p>
                                                    <div class="card-title text-center mb-0">
                                                        <h4 class="product-title mb-0">TVS Jupiter</h4>
                                                    </div>
                                                    <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-regular fa-star-half-stroke"></i>
                                                    </div>
                                                    <div class="icons d-flex justify-content-around">
                                                        <i class="fa-solid fa-people-group"></i>
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                    </div>
                                                        <p class="price mb-0 text-center">Rs.600
                                                            <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                                                        </p>
                                                    <button class="btn mb-0 mt-1">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="card text-center">
                                            <div class="card-body p-2 d-flex flex-column text-center">
                                                <img src="/public/assets/landing/image/scooty1.png">
                                                <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                    <p class="new">New</p>
                                                    <div class="card-title text-center mb-0">
                                                        <h4 class="product-title mb-0">TVS Jupiter</h4>
                                                    </div>
                                                    <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-regular fa-star-half-stroke"></i>
                                                    </div>
                                                    <div class="icons d-flex justify-content-around">
                                                        <i class="fa-solid fa-people-group"></i>
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                    </div>
                                                        <p class="price mb-0 text-center">Rs.600
                                                            <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                                                        </p>
                                                    <button class="btn mb-0 mt-1">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="card text-center">
                                            <div class="card-body p-2 d-flex flex-column text-center">
                                                <img src="/public/assets/landing/image/scooty1.png">
                                                <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
                                                    <i class="fa-solid fa-heart" style="color: red;"></i>
                                                    <p class="new">New</p>
                                                    <div class="card-title text-center mb-0">
                                                        <h4 class="product-title mb-0">TVS Jupiter</h4>
                                                    </div>
                                                    <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-regular fa-star-half-stroke"></i>
                                                    </div>
                                                    <div class="icons d-flex justify-content-around">
                                                        <i class="fa-solid fa-people-group"></i>
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                        <i class="fa-solid fa-gauge"></i>
                                                    </div>
                                                        <p class="price mb-0 text-center">Rs.600
                                                            <small class="old-price mb-0" style="text-decoration: line-through;">Rs.800</small> / day
                                                        </p>
                                                    <button class="btn mb-0 mt-1">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 p-0 mt-3 docs-page">
                            <div class="bookings">
                                <div class="page-row-one" onclick="showTransactionPage()">
                                    <i class="fas fa-arrow-left"></i>
                                    <h4 class="mb-0"></i>Document Verification</h4>
                                </div>
                                <div class="docs row" style="margin-top: 2rem;">

                                    <div class="col-6">
                                        <div class="group">
                                            <input type="text" required>
                                            <span class="bar"></span>
                                            <label for="">Enter Aadhar Number</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="group">
                                            <input type="text" required>
                                            <span class="bar"></span>
                                            <label for="">Enter PAN Number</label>
                                        </div>
                                    </div>

                                    <div class="file-input">
                                        <input type="file" name="file-input" id="file-input" class="file-input__input"/>
                                        <label class="file-input__label" for="file-input">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                                            </svg>
                                            <span>Upload file</span>
                                        </label>
                                    </div>

                                    <button class="btn mt-3">Upload</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 p-0 mt-3 profile-page">
                            <div class="bookings">
                                <div class="page-row-one" onclick="showTransactionPage()">
                                    <i class="fas fa-arrow-left"></i>
                                    <h4 class="mb-0"></i>Edit Profile</h4>
                                </div>
                                <div class="profile">
                                    <div class="profile-input row">
                                        <form action="{{route ('user.update', $user->id)}}" method=POST enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Enter Your Name" name="f_name" value="{{$user->f_name}}" required>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Enter Your Email"  name="email" value="{{$user->email}}" required>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <input type="tel" class="form-control" placeholder="Enter Your Number" name="phone" value="{{$user->phone}}" required>
                                                </div>
                                            </div>

                                            <div class="col-6 mt-3">
                                                <div class="form-group">
                                                    <input type="file" class="form-control" value="" name="image" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn mt-3">Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

    function showBookingPage() {
    var transactionPage = document.querySelector('.transaction-page');
    var bookingPage = document.querySelector('.booking-page');
    var wishlistPage = document.querySelector('.wishlist-page');
    var profilePage = document.querySelector('.profile-page');
    var docspage = document.querySelector('.docs-page');

    transactionPage.style.display = 'none';
    bookingPage.style.display = 'block';
    wishlistPage.style.display = 'none';
    profilePage.style.display = 'none';
    docspage.style.display = 'none';
    }

    function showWishlistPage() {
    var transactionPage = document.querySelector('.transaction-page');
    var bookingPage = document.querySelector('.booking-page');
    var wishlistPage = document.querySelector('.wishlist-page');
    var profilePage = document.querySelector('.profile-page');
    var docspage = document.querySelector('.docs-page');

    transactionPage.style.display = 'none';
    bookingPage.style.display = 'none';
    wishlistPage.style.display = 'block';
    profilePage.style.display = 'none';
    docspage.style.display = 'none';
    }

    function showDocPage() {
    var transactionPage = document.querySelector('.transaction-page');
    var bookingPage = document.querySelector('.booking-page');
    var wishlistPage = document.querySelector('.wishlist-page');
    var docspage = document.querySelector('.docs-page');
    var profilePage = document.querySelector('.profile-page');

    transactionPage.style.display = 'none';
    bookingPage.style.display = 'none';
    wishlistPage.style.display = 'none';
    docspage.style.display = 'block';
    profilePage.style.display = 'none';
    }

    function showTransactionPage() {
    var docsPage = document.querySelector('.docs-page');
    var transactionPage = document.querySelector('.transaction-page');
    var bookingPage = document.querySelector('.booking-page');
    var wishlistPage = document.querySelector('.wishlist-page');
    var profilePage = document.querySelector('.profile-page');

    docsPage.style.display = 'none';
    transactionPage.style.display = 'block';
    bookingPage.style.display = 'none';
    wishlistPage.style.display = 'none';
    profilePage.style.display = 'none';
    }

    function showProfilePage() {
  var docsPage = document.querySelector('.docs-page');
  var transactionPage = document.querySelector('.transaction-page');
  var bookingPage = document.querySelector('.booking-page');
  var wishlistPage = document.querySelector('.wishlist-page');
  var profilePage = document.querySelector('.profile-page');

  docsPage.style.display = 'none';
  transactionPage.style.display = 'none';
  bookingPage.style.display = 'none';
  wishlistPage.style.display = 'none';
  profilePage.style.display = 'block';

}
</script>
@endsection