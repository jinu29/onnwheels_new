@if($items->isNotEmpty())
    <div class="row">
        @foreach($items as $item)
            <div class="col-3 mb-3 search-result">
                <div class="card d-flex flex-column align-items-center">
                    <img class="card-img" src="{{ asset('storage/app/public/product/') . '/' . $item->image }}" alt="{{ $item->name }} image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <div class="rating d-flex justify-content-center mb-0 text-center" style="font-size: 12px; color: rgb(248, 82, 82);">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <p class="price mb-0 text-center">Rs. {{ $item->price }}</p>
                        <a href="{{ route('product.product_detail', ['slug' => $item->slug]) }}" class="btn mb-0 mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No items found</p>
@endif