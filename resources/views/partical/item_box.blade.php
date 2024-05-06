@foreach ( $item as $items )
<div class="card text-center">
    <div class="card-body p-2 d-flex flex-column text-center">
        <a href="{{$item_url}}">
            <img class="avatar avatar-lg mr-3 onerror-image" src="{{ \App\CentralLogics\Helpers::onerror_image_helper( $items['image'] ?? '', asset('storage/app/public/product').'/'.$items['image'] ?? '', asset('public/assets/admin/img/160x160/img2.jpg'),'product/') }}" data-onerror-image="{{asset('public/assets/admin/img/160x160/img2.jpg')}}" alt="{{$items->name}} image">
        </a>
        <div class="card-details d-flex flex-column p-1 mt-1 text-center" style="gap: 12px;">
            <i class="fa-regular fa-heart"></i>
            @if ($items->discount != 0)
            <p class="new">{{$items->discount}} %</p>
            @endif
            <div class="card-title text-center mb-0">
                <h4 class="product-title mb-0">{{$items->name}}</h4>
            </div>
            <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star-half-stroke"></i>
            </div>
            {{-- <div class="icons d-flex justify-content-around">
                <i class="fa-solid fa-people-group"></i>
                <i class="fa-solid fa-briefcase"></i>
                <i class="fa-solid fa-gauge"></i>
                <i class="fa-solid fa-gauge"></i>
            </div> --}}
            <p class="price mb-0 text-center">Rs. {{$items->price}}
                {{-- @if ($items->discount != 0)
                <small class="old-price mb-0" style="text-decoration: line-through; color:grey;">{{$items->discount}}</small> / day
                @endif --}}
            </p>
            <a href="{{route('product.product_detail')}}" class="btn mb-0 mt-1">Book Now</a>
        </div>
    </div>
</div>
@endforeach
