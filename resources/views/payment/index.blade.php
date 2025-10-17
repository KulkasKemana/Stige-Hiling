<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Payment - Healing Tour and Travel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background: linear-gradient(135deg, #4a5568 0%, #2d3748 100%);
            min-height: 100vh;
            padding-bottom: 0;
        }
        .main-content {
            padding: 120px 20px 40px;
            max-width: 500px;
            margin: 0 auto;
        }
        .page-title {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 40px;
        }
        .payment-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #ecf0f1;
        }
        .payment-row:last-child {
            border-bottom: none;
            padding-top: 15px;
            font-weight: 600;
        }
        .payment-method {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 2px solid #ecf0f1;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 12px;
        }
        .payment-method:hover {
            border-color: #FF914D;
            background-color: #fff5f0;
        }
        .payment-method.selected {
            background-color: #fff3cd;
            border-color: #FF914D;
        }
        .method-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
            margin-right: 15px;
        }
        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            border-color: #FF914D;
            background-color: #fff5f0;
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main class="main-content">
        <h1 class="page-title">Complete Your Payment</h1>
        
        <!-- Summary Payment -->
        <div class="payment-card">
            <div class="card-title">Summary Payment</div>
            <div class="payment-row">
                <span class="text-gray-700 text-sm">Booking Code</span>
                <span class="font-semibold text-gray-900">{{ $checkoutData['booking_code'] }}</span>
            </div>
            <div class="payment-row">
                <span class="text-gray-700 text-sm">Subtotal</span>
                <span class="text-gray-900">Rp {{ number_format($checkoutData['subtotal'], 0, ',', '.') }}</span>
            </div>
            <div class="payment-row">
                <span class="text-gray-700 text-sm">Admin Fee</span>
                <span class="text-gray-900">Rp {{ number_format($checkoutData['admin_fee'], 0, ',', '.') }}</span>
            </div>
            <div class="payment-row">
                <span class="text-gray-900 font-semibold">Total Payment</span>
                <span class="text-orange-500 text-lg font-bold">Rp {{ number_format($checkoutData['total'], 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Payment Form -->
        <form action="{{ route('payment.process') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
            @csrf
            
            <!-- Payment Methods -->
            <div class="payment-card">
                <div class="card-title">Choose Payment Method</div>
                
                <input type="hidden" name="payment_method" id="selectedMethod" required>
                
                <div class="space-y-3">
                    <div class="payment-method" data-method="e-wallet" onclick="selectMethod(this, 'e-wallet')">
                        <div class="method-icon" style="background: #00d4aa;">GP</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">E-wallet</div>
                            <div class="text-xs text-gray-500">GoPay, OVO, DANA</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>

                    <div class="payment-method" data-method="bank-transfer" onclick="selectMethod(this, 'bank-transfer')">
                        <div class="method-icon" style="background: #ff6b35;">VA</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">Virtual Account Transfer</div>
                            <div class="text-xs text-gray-500">Select bank to continue payment</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>

                    <div class="payment-method" data-method="bca-va" onclick="selectMethod(this, 'bca-va')">
                        <div class="method-icon" style="background: #0066cc;">BCA</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">BCA Virtual Account</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>

                    <div class="payment-method" data-method="bni-va" onclick="selectMethod(this, 'bni-va')">
                        <div class="method-icon" style="background: #fd7e00;">BNI</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">BNI Virtual Account</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>

                    <div class="payment-method" data-method="mandiri-va" onclick="selectMethod(this, 'mandiri-va')">
                        <div class="method-icon" style="background: #1f4e79;">MDR</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">Mandiri Virtual Account</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>

                    <div class="payment-method" data-method="cimb-va" onclick="selectMethod(this, 'cimb-va')">
                        <div class="method-icon" style="background: #dc143c;">CNB</div>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900 text-sm">CIMB NIAGA Virtual Account</div>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </div>

                @error('payment_method')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-orange-500 text-white py-4 rounded-lg font-semibold text-lg hover:bg-orange-600 transition duration-200 shadow-lg">
                <i class="fas fa-check-circle mr-2"></i>
                Confirm Payment
            </button>

            <p class="text-center text-white text-sm mt-4">
                <i class="fas fa-shield-alt mr-1"></i>
                Your payment is secured with SSL encryption
            </p>
        </form>
    </main>

        <!-- Footer -->
        <footer class="mt-10 border-t border-[#989898] text-gray-300 py-4">
    <div class="container mx-auto flex items-center justify-between">
        <div class="w-1/3"></div>

        <!-- copyright -->
        <div class="w-1/3 text-center text-sm">
        Copyright © 2025 Healing Tour and Travel
        </div>

        <!-- follow us -->
        <div class="w-1/3 flex justify-end items-center space-x-3 text-sm">
        <span class="font-semibold">Follow Us</span>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="far fa-envelope"></i></a>
        </div>
    </div>
    </footer>

    <script>
        function selectMethod(element, method) {
            document.querySelectorAll('.payment-method').forEach(m => {
                m.classList.remove('selected');
            });
            element.classList.add('selected');
            document.getElementById('selectedMethod').value = method;
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            document.getElementById('paymentProof').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
        }

        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            const method = document.getElementById('selectedMethod').value;
            if (!method) {
                e.preventDefault();
                alert('Please select a payment method');
            }
        });
    </script>
</body>
</html>