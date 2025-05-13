<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Modern Online Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#111111',
                        secondary: '#f8f8f8',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .size-tag {
            transition: all 0.2s ease;
        }
        
        .size-tag:hover {
            background-color: #f44336;
            color: white;
            border-color: #f44336;
        }
        
        .size-tag:hover::after {
            content: " ×";
        }
        
        .product-image-container:hover .remove-image {
            display: flex;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-primary text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold">STORE Admin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-6 py-3 bg-gray-800">
                    <a href="#" class="flex items-center">
                        <i class="fas fa-box-open mr-3"></i>
                        <span>Products</span>
                    </a>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button class="md:hidden text-gray-600 mr-4" id="sidebar-toggle">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-bold">Shop</h2>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Admin" class="w-8 h-8 rounded-full">
                                <span class="ml-2 hidden sm:inline-block">Admin User</span>
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            @yield('content')
        </div>
    </div>
    
    <!-- Mobile Sidebar (Hidden by default) -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 hidden" id="mobile-sidebar-backdrop"></div>
    <div class="fixed inset-y-0 left-0 w-64 bg-primary text-white z-30 transform -translate-x-full transition-transform duration-300 ease-in-out" id="mobile-sidebar">
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold">STORE Admin</h1>
                <button class="text-white" id="close-sidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <nav class="mt-6">
            <div class="px-6 py-3 bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-box-open mr-3"></i>
                    <span>Products</span>
                </a>
            </div>
            <div class="px-6 py-3 hover:bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-shopping-cart mr-3"></i>
                    <span>Orders</span>
                </a>
            </div>
            <div class="px-6 py-3 hover:bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-users mr-3"></i>
                    <span>Customers</span>
                </a>
            </div>
            <div class="px-6 py-3 hover:bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-tag mr-3"></i>
                    <span>Discounts</span>
                </a>
            </div>
            <div class="px-6 py-3 hover:bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-chart-bar mr-3"></i>
                    <span>Analytics</span>
                </a>
            </div>
            <div class="px-6 py-3 hover:bg-gray-800">
                <a href="#" class="flex items-center">
                    <i class="fas fa-cog mr-3"></i>
                    <span>Settings</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Add Size Modal (Hidden by default) -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 hidden" id="add-size-backdrop"></div>
    <div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="add-size-modal">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="flex justify-between items-center p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold">Add Size</h3>
                <button class="text-gray-400 hover:text-gray-500" id="close-size-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <label for="size-value" class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                    <input type="text" id="size-value" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter size (e.g. S, M, L, XL, 32, 34)">
                </div>
                <div class="flex justify-end space-x-3">
                    <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50" id="cancel-add-size">
                        Cancel
                    </button>
                    <button class="px-4 py-2 bg-primary text-white rounded-md hover:bg-gray-800" id="confirm-add-size">
                        Add Size
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Image Modal (Hidden by default) -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 hidden" id="add-image-backdrop"></div>
    <div class="fixed inset-0 z-50 flex items-center justify-center hidden" id="add-image-modal">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="flex justify-between items-center p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold">Add Image</h3>
                <button class="text-gray-400 hover:text-gray-500" id="close-image-modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="mb-6">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                        <input type="file" id="image-upload" accept="image/*" class="hidden">
                        <div class="space-y-2">
                            <div class="mx-auto flex justify-center">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                            </div>
                            <div class="text-gray-700">
                                <label for="image-upload" class="cursor-pointer text-primary hover:underline">Click to upload</label>
                                <span> or drag and drop</span>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end space-x-3">
                    <button class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50" id="cancel-add-image">
                        Cancel
                    </button>
                    <button class="px-4 py-2 bg-primary text-white rounded-md hover:bg-gray-800" id="confirm-add-image">
                        Add Image
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Mobile Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const mobileSidebarBackdrop = document.getElementById('mobile-sidebar-backdrop');
        const closeSidebar = document.getElementById('close-sidebar');
        
        sidebarToggle.addEventListener('click', () => {
            mobileSidebar.classList.remove('-translate-x-full');
            mobileSidebarBackdrop.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        });
        
        function closeMobileSidebar() {
            mobileSidebar.classList.add('-translate-x-full');
            mobileSidebarBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        
        closeSidebar.addEventListener('click', closeMobileSidebar);
        mobileSidebarBackdrop.addEventListener('click', closeMobileSidebar);
        
        // Table Checkboxes
        const mainCheckbox = document.querySelector('thead input[type="checkbox"]');
        const rowCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');
        
        mainCheckbox.addEventListener('change', () => {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = mainCheckbox.checked;
            });
        });
        
        // Size Tag Removal
        document.querySelectorAll('.size-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove this size?')) {
                    this.remove();
                }
            });
        });
        
        // Add Size Modal
        const addSizeButtons = document.querySelectorAll('.add-size');
        const addSizeModal = document.getElementById('add-size-modal');
        const addSizeBackdrop = document.getElementById('add-size-backdrop');
        const closeSizeModal = document.getElementById('close-size-modal');
        const cancelAddSize = document.getElementById('cancel-add-size');
        const confirmAddSize = document.getElementById('confirm-add-size');
        const sizeValueInput = document.getElementById('size-value');
        
        let currentSizesContainer;
        
        addSizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                currentSizesContainer = this.parentElement;
                addSizeModal.classList.remove('hidden');
                addSizeBackdrop.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                sizeValueInput.focus();
            });
        });
        
        function closeAddSizeModal() {
            addSizeModal.classList.add('hidden');
            addSizeBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            sizeValueInput.value = '';
        }
        
        closeSizeModal.addEventListener('click', closeAddSizeModal);
        cancelAddSize.addEventListener('click', closeAddSizeModal);
        addSizeBackdrop.addEventListener('click', closeAddSizeModal);
        
        confirmAddSize.addEventListener('click', function() {
            const sizeValue = sizeValueInput.value.trim();
            
            if (sizeValue === '') {
                alert('Please enter a size value');
                return;
            }
            
            // Create new size tag
            const newSizeTag = document.createElement('span');
            newSizeTag.className = 'size-tag inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-300 cursor-pointer';
            newSizeTag.textContent = sizeValue;
            
            // Add click event to remove
            newSizeTag.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove this size?')) {
                    this.remove();
                }
            });
            
            // Insert before the add button
            currentSizesContainer.insertBefore(newSizeTag, currentSizesContainer.lastElementChild);
            
            closeAddSizeModal();
        });
        
        // Image Removal
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to remove this image?')) {
                    this.parentElement.remove();
                }
            });
        });
        
        // Add Image Modal
        const addImageButtons = document.querySelectorAll('.add-image');
        const addImageModal = document.getElementById('add-image-modal');
        const addImageBackdrop = document.getElementById('add-image-backdrop');
        const closeImageModal = document.getElementById('close-image-modal');
        const cancelAddImage = document.getElementById('cancel-add-image');
        const confirmAddImage = document.getElementById('confirm-add-image');
        const imageUpload = document.getElementById('image-upload');
        
        let currentImagesContainer;
        let selectedFile = null;
        
        addImageButtons.forEach(button => {
            button.addEventListener('click', function() {
                currentImagesContainer = this.parentElement;
                addImageModal.classList.remove('hidden');
                addImageBackdrop.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                selectedFile = null;
            });
        });
        
        function closeAddImageModal() {
            addImageModal.classList.add('hidden');
            addImageBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            imageUpload.value = '';
        }
        
        closeImageModal.addEventListener('click', closeAddImageModal);
        cancelAddImage.addEventListener('click', closeAddImageModal);
        addImageBackdrop.addEventListener('click', closeAddImageModal);
        
        // Handle file selection
        imageUpload.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                selectedFile = this.files[0];
            }
        });
        
        // Drag and drop functionality
        const dropArea = document.querySelector('.border-dashed');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            dropArea.classList.add('border-primary', 'bg-gray-50');
        }
        
        function unhighlight() {
            dropArea.classList.remove('border-primary', 'bg-gray-50');
        }
        
        dropArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files && files[0]) {
                selectedFile = files[0];
            }
        }
        
        confirmAddImage.addEventListener('click', function() {
            if (!selectedFile) {
                alert('Please select an image file');
                return;
            }
            
            // Check file type
            if (!selectedFile.type.match('image.*')) {
                alert('Please select an image file');
                return;
            }
            
            // Create a new image container
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const imageContainer = document.createElement('div');
                imageContainer.className = 'product-image-container relative';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Product image';
                img.className = 'h-12 w-12 object-cover rounded';
                
                const removeButton = document.createElement('button');
                removeButton.className = 'remove-image absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center hidden hover:bg-red-600';
                removeButton.innerHTML = '<i class="fas fa-times text-xs"></i>';
                
                removeButton.addEventListener('click', function() {
                    if (confirm('Are you sure you want to remove this image?')) {
                        imageContainer.remove();
                    }
                });
                
                imageContainer.appendChild(img);
                imageContainer.appendChild(removeButton);
                
                // Insert before the add button
                currentImagesContainer.insertBefore(imageContainer, currentImagesContainer.lastElementChild);
            };
            
            reader.readAsDataURL(selectedFile);
            
            closeAddImageModal();
        });
        
        // Delete Product
        document.querySelectorAll('.text-red-600').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
                    this.closest('tr').remove();
                }
            });
        });
    </script>
</body>
</html>