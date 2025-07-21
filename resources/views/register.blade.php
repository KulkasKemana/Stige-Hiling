<div class="signup-container" style="display: flex; align-items: center; justify-content: center; margin-top: 50px;">
    <div class="signup-image" style="flex: 1;">
        <!-- Gambar ini bisa digunakan dengan tag <img> jika ada URL -->
        <img src="{{ asset('path_to_image.jpg') }}" alt="Healing Tour Image" style="width: 100%; border-radius: 10px;">
    </div>
    <div class="signup-form" style="flex: 1; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <h2>Sign Up Now</h2>
        <p>Please fill the details and create account</p>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required minlength="8">
                <small>Password must be 8 characters</small>
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <p>or continue</p>
            <button type="button" class="btn btn-google">Log in with Google</button>
            <p>Already have an account? <a href="{{ route('login') }}">Sign Up</a></p>
        </form>
    </div>
</div>