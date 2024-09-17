@extends('layouts.app')

@section('content')
    <div class="w-full h-[90vh] overflow-y-auto no-scrollbar flex items-start justify-center pb-4">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="flex gap-2 w-[50%] flex-col h-fit  p-4 border-[1px] bordeer-gray-200 shadow-sm rounded-lg mt-4">
            @csrf
            <div class="flex flex-col gap-2">
                <div class="w-full flex items-center justify-center">
                    <h3 class=" text-[1rem] font-semibold uppercase ">Add new product</h3>

                </div>
                <!-- Product Name -->
                <div>
                    <label for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" required class="form-control">
                </div>

                <!-- Product Price -->
                <div>
                    <label for="product_price">Product Price</label>
                    <input type="text" id="product_price" name="product_price" required class="form-control">
                </div>

                <!-- Product In Stock -->
                <div>
                    <label for="product_instock">Product In Stock</label>
                    <input type="text" id="product_instock" name="product_instock" required class="form-control">
                </div>

                <!-- Tag -->
                <div>
                    <label for="tag">Tag</label>
                    <input type="text" id="tag" name="tag" class="form-control">
                </div>

                <!-- Description -->
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>


            </div>

            <label class="capitalize  ">Add product image</label>
            <div class="w-full py-3 border-[1px] border-gray-200 shadow-sm p-2 rounded-lg ">

                <div class="flex  flex-wrap gap-2 w-full items-center justify-center">
                    @for ($i = 1; $i <= 4; $i++)
                        <div
                            class="  w-[130px] h-[130px] flex items-center overflow-hidden shadow-sm justify-center rounded-full">

                            <label for="product_images_{{ $i }}"
                                class="cursor-pointer w-full h-full z-2  z-10 flex flex-col items-center justify-center">
                                <input type="file" name="product_images[]" id="product_images_{{ $i }}"
                                    class="hidden" multiple accept="image/*">
                                <svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960"
                                    width="60px" class="svg-icon" fill="#9E9E9E">
                                    <path
                                        d="M366.15-412.31h347.7L603.54-558.46l-98.16 123.08-63.53-75.39-75.7 98.46ZM324.62-280q-27.62 0-46.12-18.5Q260-317 260-344.62v-430.76q0-27.62 18.5-46.12Q297-840 324.62-840h430.76q27.62 0 46.12 18.5Q820-803 820-775.38v430.76q0 27.62-18.5 46.12Q783-280 755.38-280H324.62Zm0-40h430.76q9.24 0 16.93-7.69 7.69-7.69 7.69-16.93v-430.76q0-9.24-7.69-16.93-7.69-7.69-16.93-7.69H324.62q-9.24 0-16.93 7.69-7.69 7.69-7.69 16.93v430.76q0 9.24 7.69 16.93 7.69 7.69 16.93 7.69Zm-120 160q-27.62 0-46.12-18.5Q140-197 140-224.61v-470.77h40v470.77q0 9.23 7.69 16.92 7.69 7.69 16.93 7.69h470.76v40H204.62ZM300-800v480-480Z" />
                                </svg>
                                <span class="text-[.7rem] text-[#9E9E9E] span-text">4 x 4</span>
                                <div id="preview-container_{{ $i }}" class="relative z-3"
                                    class=" w-full h-full flex items-center justify-center ">
                                </div>
                            </label>

                        </div>
                    @endfor
                </div>
            </div>
            <div class="w-full flex justify-end items-center">
                <button type="submit"
                    class="w-[50%] bg-gradient-to-r from-blue-500 to-sky-400 py-2 rounded-lg text-white mt-2">Add
                    Product</button>
            </div>
        </form>
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
