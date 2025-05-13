@extends('layouts.admin')

@section('content')
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">All Products</h3>
            <a href="product-form.html"
                class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition duration-300">
                <i class="fas fa-plus mr-2"></i> Add New Product
            </a>
        </div>

        <!-- Filters -->
        <div class="bg-white p-4 rounded-lg shadow-sm mb-6">
            <div class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                    <select id="sort"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="price-asc">Price: Low to High</option>
                        <option value="price-desc">Price: High to Low</option>
                        <option value="name-asc">Name: A-Z</option>
                        <option value="name-desc">Name: Z-A</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition duration-300">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- Products List -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                
                                Product
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sizes
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Images
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Product 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 object-cover"
                                            src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Basic Planet Tee Black</div>
                                        <div class="text-sm text-gray-500">SKU: TS-001</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                $39.00
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 truncate-2 max-w-xs">
                                    The Basic Planet Tee is our signature everyday essential. Crafted from premium 100%
                                    organic cotton for exceptional comfort and durability.
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    <span
                                        class="size-tag inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-300 cursor-pointer">S</span>
                                    <span
                                        class="size-tag inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-300 cursor-pointer">M</span>
                                    <span
                                        class="size-tag inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-300 cursor-pointer">L</span>
                                    <span
                                        class="size-tag inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-300 cursor-pointer">XL</span>
                                    <button
                                        class="add-size inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-primary text-white hover:bg-gray-800 transition-colors">
                                        <i class="fas fa-plus mr-1"></i> Add
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <div class="product-image-container relative">
                                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1064&q=80"
                                            alt="Product image" class="h-12 w-12 object-cover rounded">
                                        <button
                                            class="remove-image absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hidden hover:bg-red-600">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                    <div class="product-image-container relative">
                                        <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1015&q=80"
                                            alt="Product image" class="h-12 w-12 object-cover rounded">
                                        <button
                                            class="remove-image absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hidden hover:bg-red-600">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                    <div class="product-image-container relative">
                                        <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80"
                                            alt="Product image" class="h-12 w-12 object-cover rounded">
                                        <button
                                            class="remove-image absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hidden hover:bg-red-600">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                    <button
                                        class="add-image h-12 w-12 flex items-center justify-center border-2 border-dashed border-gray-300 rounded hover:border-primary transition-colors">
                                        <i class="fas fa-plus text-gray-400 hover:text-primary"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="product-form.html" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <button class="text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        {{-- <div class="flex items-center justify-between mt-6">
            <div class="text-sm text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                    class="font-medium">24</span> results
            </div>
            <div class="flex space-x-2">
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Previous
                </button>
                <button class="px-3 py-1 border border-gray-300 bg-primary text-white rounded-md text-sm font-medium">
                    1
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    2
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    3
                </button>
                <button
                    class="px-3 py-1 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div> --}}
    </main>
@endsection