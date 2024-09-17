@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] flex items-start justify-start ">
        <div class="w-[50%]">

            <div id="carouselExampleIndicators" class="carousel slide  w-[400px] h-[400px]">
                @php

                    $images = json_decode($product->product_images, true);
                @endphp
                <div class="carousel-inner">
                    @foreach ($images as $imageIndex => $image)
                        <div class="carousel-item {{ $imageIndex === 0 ? 'active' : '' }}">
                            <a href="/products/{{ $product->product_id }}">
                                <img src="{{ asset('storage/product_images/' . $image) }}" class="d-block w-100"
                                    alt="Product Image">
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                            fill="#5f6368">
                            <path d="M400-107.69L27.69-480 400-852.31l42.54 42.54L112.77-480l329.77 329.77L400-107.69Z" />
                        </svg>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                            fill="#5f6368">
                            <path
                                d="m320.23-107.69-42.54-42.54L607.46-480 277.69-809.77l42.54-42.54L692.54-480 320.23-107.69Z" />
                        </svg>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
        <div class="">
            <a id="navbarDropdown" class="p-2 flex items-center justify-center rounded-full bg-gray-100" href="#"
                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                    fill="#5f6368">
                    <path
                        d="M480-189.23q-24.75 0-42.37-17.63Q420-224.48 420-249.23q0-24.75 17.63-42.38 17.62-17.62 42.37-17.62 24.75 0 42.37 17.62Q540-273.98 540-249.23q0 24.75-17.63 42.37-17.62 17.63-42.37 17.63ZM480-420q-24.75 0-42.37-17.63Q420-455.25 420-480q0-24.75 17.63-42.37Q455.25-540 480-540q24.75 0 42.37 17.63Q540-504.75 540-480q0 24.75-17.63 42.37Q504.75-420 480-420Zm0-230.77q-24.75 0-42.37-17.62Q420-686.02 420-710.77q0-24.75 17.63-42.37 17.62-17.63 42.37-17.63 24.75 0 42.37 17.63Q540-735.52 540-710.77q0 24.75-17.63 42.38-17.62 17.62-42.37 17.62Z" />
                </svg>
            </a>

            <div class="dropdown-menu dropdown-menu-end w-full " aria-labelledby="navbarDropdown">
                <div class="hover:bg-gray-200 bg-gray-100 p-2">
                    <form action="{{ route('product.delete', $product->product_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-[.8rem] text-red-500">Delete account</button>
                    </form>
                </div>
                <a href="{{ route('product.edit', $product->product_id) }}">update</a>
            </div>
        </div>
    </div>
@endsection
