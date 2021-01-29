<div class="lg:w-1/4 pr-4 pl-4 mb-4">
    <h1 class="mt-4">Filters</h1>

    <h3 class="mt-2">Price</h3>
    @foreach($prices as $index => $price)
        <div class="relative block mb-2">
            <input class="absolute mt-1 -ml-6" type="checkbox" id="price{{ $index }}" value="{{ $index }}" wire:model="selected.prices">
            <label class="text-gray-700 pl-6 mb-0" for="price{{ $index }}">
                {{ $price['name'] }} ({{ $price['products_count'] }})
            </label>
        </div>
    @endforeach

    <h3 class="mt-2">Categories</h3>
    @foreach($categories as $index => $category)
        <div class="relative block mb-2">
            <input class="absolute mt-1 -ml-6" type="checkbox" id="category{{ $index }}" value="{{ $category->id }}" wire:model="selected.categories">
            <label class="text-gray-700 pl-6 mb-0" for="category{{ $index }}">
                {{ $category['name'] }} ({{ $category['products_count'] }})
            </label>
        </div>
    @endforeach

</div>