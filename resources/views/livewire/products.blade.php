<div class="lg:w-3/4 pr-4 pl-4">
    <div class="flex flex-wrap  mt-4">
        @foreach($products as $product)
            <div class="lg:w-1/3 pr-4 pl-4 md:w-1/2 pr-4 pl-4 mb-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 h-full">
                    <a href="#">
                        <img class="w-full rounded rounded-t" src="http://placehold.it/700x400" alt="">
                    </a>
                    <div class="flex-auto p-6">
                        <h4 class="mb-3">
                            <a href="#">{{ $product->name }}</a>
                        </h4>
                        <h5>$ {{ number_format($product->price / 100, 2) }}</h5>
                        <p class="mb-0">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>