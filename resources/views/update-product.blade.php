@extends('layouts.app')
@section('content')
    <div class="w-full h-[90vh] flex items-start justify-start flex-col p-2 overflow-auto no-scrollbar">
        <div class="w-full h-fit py-4 flex items-center justify-center">
            <div class="w-[50%] flex flex-col gap-2">

                <form action="{{ route('product.update', $product->product_id) }}" method="POST"
                    class="w-full flex flex-col gap-2 p-2 rounded-lg border-[1px] border-gray-200 shadow-sm"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="w-full flex items-center justify-center py-2">
                        <h3 class="uppercase font-semibold text-[1rem]">Update Product</h3>
                    </div>
                    <div>
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" id="product_name" class="form-control"
                            value="{{ old('product_name', $product->product_name) }}" required>
                    </div>

                    <div>
                        <label for="product_price">Product Price:</label>
                        <input type="number" name="product_price" id="product_price" class="form-control"
                            value="{{ old('product_price', $product->product_price) }}" required>
                    </div>

                    <div>
                        <label for="product_instock">Product In Stock:</label>
                        <input type="number" name="product_instock" id="product_instock" class="form-control"
                            value="{{ old('product_instock', $product->product_instock) }}" required>
                    </div>

                    <div>
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div>
                        <label for="tag">Tag:</label>
                        <input type="text" name="tag" id="tag" value="{{ old('tag', $product->tag) }}"
                            class="form-control">
                    </div>

                    <div
                        class="flex  flex-wrap gap-2 w-full items-center justify-center mt-3 py-3 border-[1px] border-gray-200 shadow-sm p-2 rounded-lg ">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="w-[130px] h-[130px] flex shadow-sm overflow-hidden rounded-full">
                                <label for="product_images_{{ $i }}"
                                    class="cursor-pointer w-full h-full relative bg-gray-300">
                                    <input type="file" name="product_images[]" id="product_images_{{ $i }}"
                                        class="hidden" multiple accept="image/*">

                                    @php
                                        // Retrieve existing images from the array if it exists
                                        $existingImages = $product->product_images
                                            ? json_decode($product->product_images, true)
                                            : [];
                                        $imageUrl = isset($existingImages[$i - 1])
                                            ? asset('storage/product_images/' . $existingImages[$i - 1])
                                            : null;
                                    @endphp


                                    @if ($imageUrl)
                                        <img src="{{ $imageUrl }}" alt="Product Image {{ $i }}"
                                            class="w-full h-full object-cover rounded-full">
                                    @else
                                        <div class="flex flex-col w-full h-full justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                                width="40px" class="svg-icon" fill="#9E9E9E">
                                                <path
                                                    d="M366.15-412.31h347.7L603.54-558.46l-98.16 123.08-63.53-75.39-75.7 98.46ZM324.62-280q-27.62 0-46.12-18.5Q260-317 260-344.62v-430.76q0-27.62 18.5-46.12Q297-840 324.62-840h430.76q27.62 0 46.12 18.5Q820-803 820-775.38v430.76q0 27.62-18.5 46.12Q783-280 755.38-280H324.62Zm0-40h430.76q9.24 0 16.93-7.69 7.69-7.69 7.69-16.93v-430.76q0-9.24-7.69-16.93-7.69-7.69-16.93-7.69H324.62q-9.24 0-16.93 7.69-7.69 7.69-7.69 16.93v430.76q0 9.24 7.69 16.93 7.69 7.69 16.93 7.69Zm-120 160q-27.62 0-46.12-18.5Q140-197 140-224.61v-470.77h40v470.77q0 9.23 7.69 16.92 7.69 7.69 16.93 7.69h470.76v40H204.62ZM300-800v480-480Z" />
                                            </svg>
                                            <span class="text-[.7rem] text-[#9E9E9E] span-text">4 x 4</span>
                                        </div>
                                    @endif
                                    <div id="preview-container_{{ $i }}"
                                        class="absolute top-0 left-0 z-3 w-full h-full flex items-center justify-center">
                                        <!-- Preview container -->
                                    </div>
                                </label>
                            </div>
                        @endfor

                    </div>

                    <div class="w-full flex justify-end items-center">
                        <button type="submit"
                            class="w-[50%] bg-gradient-to-r from-blue-500 to-sky-400 py-2 rounded-lg text-white mt-2">Add
                            Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('input[type="file"]').forEach((input) => {
            input.addEventListener('change', function(event) {
                const label = event.target.closest('label');
                const svgIcon = label.querySelector('.svg-icon');
                const spanText = label.querySelector('.span-text');

                // Check if files are selected
                if (event.target.files.length > 0) {
                    // Hide the SVG and span elements
                    svgIcon.style.display = 'none';
                    spanText.style.display = 'none';
                } else {
                    // Show the SVG and span elements if no files are selected
                    svgIcon.style.display = 'block';
                    spanText.style.display = 'block';
                }



                const previewContainer = document.getElementById('preview-container_' + event.target.id
                    .split('_').pop());
                previewContainer.innerHTML = ''; // Clear previous previews

                const files = event.target.files;
                for (const file of files) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        previewContainer.appendChild(img);
                        img.classList.add('w-full', 'object-fit');
                    };

                    reader.readAsDataURL(file);
                }
            });

        });
    </script>
@endsection
