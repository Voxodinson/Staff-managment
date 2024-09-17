@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] flex flex-col items-start justify-start p-2">
        <div class="w-full py-2 px-3 flex items-center justify-between bg-none  rounded-lg shadow-sm">
            <h3 class="font-semibold capitalize">products</h3>
            <div class="w-full flex justify-end gap-2">
                <a href="/add-product"
                    class="py-2 px-4 bg-blue-400 hover:bg-blue-200 text-gray-50 hover:text-gray-950 capitalize rounded-lg border-[1px] border-gray-200">add
                    product</a>
                <div class="w-[30%] relative">
                    <input type="text" placeholder="Search employees..."
                        class="p-2 rounded-lg outline-none w-full border-[1px] border-gray-200">
                    <span class="absolute top-0 right-0"> <svg xmlns="http://www.w3.org/2000/svg" height="40"
                            viewBox="0 -960 960 960" width="40">
                            <path
                                d="M787.641-137.335 530.872-394.104q-29.899 25.866-69.407 40.061-39.508 14.196-81.773 14.196-102.098 0-172.817-70.681-70.72-70.681-70.72-171.845 0-101.165 70.681-171.908 70.68-70.744 171.992-70.744 101.311 0 172.036 70.699t70.725 171.897q0 42.301-14.385 81.839-14.385 39.539-40.538 70.692l257.179 256.103-36.204 36.46ZM379.282-390.102q80.406 0 136.229-55.962 55.823-55.961 55.823-136.372 0-80.41-55.823-136.372-55.823-55.962-136.229-55.962-80.748 0-136.81 55.962T186.41-582.436q0 80.411 56.062 136.372 56.062 55.962 136.81 55.962Z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full h-full overflow-auto no-scrollbar pb-4 mt-2">
            <div class="w-full h-fit grid grid-cols-4 gap-2 mt-2">
                @foreach ($products as $index => $product)
                    <!-- Unique ID for each carousel -->
                    @php
                        $carouselId = 'carouselExampleCaptions' . $index;
                        $images = json_decode($product->product_images, true);
                    @endphp
                    <div class="flex flex-col w-full h-fit border-[1px] border-gray-200 p-2 rounded-lg shadow-sm">
                        <div id="{{ $carouselId }}"
                            class="carousel slide w-full h-full rounded-lg overflow-hidden border-[1px] border-gray-200">
                            <div class="carousel-indicators">
                                @if (is_array($images))
                                    @foreach ($images as $imageIndex => $image)
                                        <button type="button" data-bs-target="#{{ $carouselId }}"
                                            data-bs-slide-to="{{ $imageIndex }}"
                                            class="{{ $imageIndex === 0 ? 'active' : '' }}"
                                            aria-current="{{ $imageIndex === 0 ? 'true' : 'false' }}"
                                            aria-label="Slide {{ $imageIndex + 1 }}"></button>
                                    @endforeach
                                @endif
                            </div>

                            <div class="carousel-inner flex w-full items-center justify-start ">
                                @if (is_array($images))
                                    @foreach ($images as $imageIndex => $image)
                                        <div class="carousel-item {{ $imageIndex === 0 ? 'active' : '' }}">
                                            <a href="/products/{{ $product->product_id }}">
                                                <img src="{{ asset('storage/product_images/' . $image) }}"
                                                    alt="Product Image"
                                                    class="block w-72 h-72 hover:scale-110 transition-all ease-in-out duration-150 object-cover mx-auto rounded-lg">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                        width="30px" fill="#5f6368">
                                        <path
                                            d="M400-107.69L27.69-480 400-852.31l42.54 42.54L112.77-480l329.77 329.77L400-107.69Z" />
                                    </svg>
                                </span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960"
                                        width="30px" fill="#5f6368">
                                        <path
                                            d="m320.23-107.69-42.54-42.54L607.46-480 277.69-809.77l42.54-42.54L692.54-480 320.23-107.69Z" />
                                    </svg>
                                </span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="py-2 flex flex-col gap-1">
                            <h3 class="font-semibold capitalize text-[1rem]">{{ $product->product_name }}</h3>
                            <span>Price : <span class="text-red-400">{{ $product->product_price }}</span>$</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
@endsection
