<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>My Profile - Healing Tour & Travel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
  <style>
    body { font-family: "Inter", sans-serif; }
  </style>
</head>
<body class="bg-white">
  
  @include('partials.navbar')

  <div class="bg-white p-6 sm:p-10 min-h-[calc(100vh-80px)] flex items-center justify-center pt-24">
    <main class="max-w-4xl w-full mx-auto">
      
      <h1 class="text-black text-lg font-semibold mb-4">My Profile</h1>

      <!-- Success Message -->
      @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
          {{ session('success') }}
        </div>
      @endif

      <!-- Profile Header -->
      <section class="flex items-center justify-between border border-gray-300 rounded-lg p-5 mb-8">
        <div class="flex items-center space-x-4">
          <div class="relative">
            @if($user->profile_image)
              <img class="w-16 h-16 rounded-full border-2 border-orange-400 object-cover" 
                   src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile" />
            @else
              <img class="w-16 h-16 rounded-full border-2 border-orange-400 object-cover" 
                   src="{{ asset('assets/Profile-Icon.png') }}" alt="Profile" />
            @endif
            <label for="profile_image_upload" class="absolute bottom-0 right-0 bg-white rounded-full border border-gray-300 cursor-pointer w-6 h-6 flex items-center justify-center hover:bg-gray-100">
              <i class="fas fa-camera text-xs text-gray-600"></i>
            </label>
            <input type="file" id="profile_image_upload" class="hidden" accept="image/*" onchange="document.getElementById('profileForm').submit()">
          </div>
          <div>
            <p class="text-black font-semibold text-base">{{ $user->name }}</p>
            <p class="text-gray-400 text-xs">User</p>
            <p class="text-gray-400 text-xs">{{ $user->location ?? 'Location not set' }}</p>
          </div>
        </div>
        <button type="button" onclick="toggleEditMode()" class="flex items-center space-x-1 border border-gray-300 rounded-full px-4 py-1 text-xs text-black font-semibold hover:bg-gray-100">
          <span id="editButtonText">Edit</span>
          <i class="fas fa-pencil-alt text-xs"></i>
        </button>
      </section>

      <!-- Profile Form -->
      <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_image" class="hidden">
        
        <section class="border border-gray-300 rounded-lg p-6 grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8">
          
          <div class="sm:col-span-2 flex justify-between items-center mb-4">
            <p class="text-black font-semibold text-sm">Personal Information</p>
          </div>

          <!-- Name -->
          <div>
            <p class="text-gray-400 text-xs mb-1">Full Name</p>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="text-black text-sm font-semibold w-full border-0 p-0 focus:outline-none disabled:bg-white" 
                   disabled id="name_input">
            @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Email -->
          <div>
            <p class="text-gray-400 text-xs mb-1">Email Address</p>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="text-black text-sm font-semibold w-full border-0 p-0 focus:outline-none disabled:bg-white" 
                   disabled id="email_input">
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Phone -->
          <div>
            <p class="text-gray-400 text-xs mb-1">Phone Number</p>
            <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '+62 xxx-xxx-xx') }}" 
                   class="text-black text-sm font-semibold w-full border-0 p-0 focus:outline-none disabled:bg-white" 
                   disabled id="phone_input">
            @error('phone')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Location -->
          <div class="sm:col-span-2">
            <p class="text-gray-400 text-xs mb-1">Location</p>
            <input type="text" name="location" value="{{ old('location', $user->location ?? 'Garut, Indonesia') }}" 
                   class="text-black text-sm font-semibold w-full border-0 p-0 focus:outline-none disabled:bg-white" 
                   disabled id="location_input">
            @error('location')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Save Button (Hidden by default) -->
          <div class="sm:col-span-2 hidden" id="saveButtonContainer">
            <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-lg font-semibold hover:bg-orange-600 transition">
              Save Changes
            </button>
          </div>

        </section>
      </form>

    </main>
  </div>

  @include('partials.footer')

  <script>
    function toggleEditMode() {
      const inputs = document.querySelectorAll('#name_input, #email_input, #phone_input, #location_input');
      const saveBtn = document.getElementById('saveButtonContainer');
      const editBtn = document.getElementById('editButtonText');
      
      inputs.forEach(input => {
        if (input.disabled) {
          input.disabled = false;
          input.classList.add('border', 'border-gray-300', 'p-2', 'rounded');
          saveBtn.classList.remove('hidden');
          editBtn.textContent = 'Cancel';
        } else {
          input.disabled = true;
          input.classList.remove('border', 'border-gray-300', 'p-2', 'rounded');
          saveBtn.classList.add('hidden');
          editBtn.textContent = 'Edit';
        }
      });
    }

    // Submit form when profile image is selected
    document.getElementById('profile_image_upload').addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        // Copy to hidden input in form
        const formInput = document.querySelector('input[name="profile_image"]');
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        formInput.files = dataTransfer.files;
        
        // Submit form
        document.getElementById('profileForm').submit();
      }
    });
  </script>

</body>
</html>