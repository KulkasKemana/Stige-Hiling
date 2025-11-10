@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Tambah Destinasi Baru</h1>
        <a href="{{ route('admin.destinations.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Destinasi</label>
                    <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Religious">Religious</option>
                        <option value="Cultural">Cultural</option>
                        <option value="Beach">Beach</option>
                        <option value="Adventure">Adventure</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga (IDR)</label>
                    <input type="number" name="price" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Durasi</label>
                    <input type="text" name="duration" placeholder="e.g. 3 Days 2 Nights" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="location" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <input type="number" name="rating" min="0" max="5" step="0.1" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm" required></textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-plus mr-2"></i>Tambah Destinasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
