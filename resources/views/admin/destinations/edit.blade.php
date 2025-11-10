@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Destination</h1>
        <a href="{{ route('admin.destinations.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>Back
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Current Image Preview -->
                <div class="md:col-span-2">
                    <div class="w-40 h-40 rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $destination->image) }}" 
                             alt="{{ $destination->name }}"
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" value="{{ $destination->name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                        <option value="Religious" {{ $destination->category == 'Religious' ? 'selected' : '' }}>Religious</option>
                        <option value="Cultural" {{ $destination->category == 'Cultural' ? 'selected' : '' }}>Cultural</option>
                        <option value="Beach" {{ $destination->category == 'Beach' ? 'selected' : '' }}>Beach</option>
                        <option value="Adventure" {{ $destination->category == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                        <option value="City Tour" {{ $destination->category == 'City Tour' ? 'selected' : '' }}>City Tour</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price (IDR)</label>
                    <input type="number" name="price" value="{{ $destination->price }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <input type="text" name="duration" value="{{ $destination->duration }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" value="{{ $destination->location }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <input type="number" name="rating" value="{{ $destination->rating }}" min="0" max="5" step="0.1" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500" required>{{ $destination->description }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Image (optional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-orange-500 focus:ring-orange-500">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Update Destination
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
