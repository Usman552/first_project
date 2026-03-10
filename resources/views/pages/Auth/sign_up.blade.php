<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laravel Auth</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #f6f9fc 0%, #e6f0f5 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .registration-wrapper {
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left Side - Branding */
        .brand-side {
            background: linear-gradient(135deg, #0B2A4A 0%, #1B3B5C 100%);
            padding: 48px 32px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .brand-side::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .brand-content {
            position: relative;
            z-index: 1;
            color: white;
        }

        .brand-icon {
            width: 72px;
            height: 72px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .brand-icon i {
            font-size: 36px;
            color: white;
        }

        .brand-content h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .brand-content p {
            font-size: 16px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 40px;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .feature-list li i {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #A7D0F0;
        }

        /* Right Side - Form */
        .form-side {
            background: white;
            padding: 48px;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1a1f36;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #64748b;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #334155;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            color: #94a3b8;
            font-size: 18px;
            transition: color 0.2s ease;
        }

        .form-control {
            width: 100%;
            height: 48px;
            padding: 0 16px 0 48px;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-size: 15px;
            color: #1e293b;
            transition: all 0.2s ease;
            background: white;
        }

        textarea.form-control {
            height: 90px;
            padding: 14px 16px 14px 48px;
            resize: none;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .form-control:focus+i {
            color: #2563eb;
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-size: 14px;
        }

        /* Password Strength */
        .password-strength {
            margin-top: 8px;
        }

        .strength-bars {
            display: flex;
            gap: 4px;
            margin-bottom: 4px;
        }

        .strength-bar {
            height: 4px;
            flex: 1;
            background: #e2e8f0;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .strength-bar.active:nth-child(1) {
            background: #ef4444;
        }

        .strength-bar.active:nth-child(2) {
            background: #f59e0b;
        }

        .strength-bar.active:nth-child(3) {
            background: #10b981;
        }

        .strength-bar.active:nth-child(4) {
            background: #059669;
        }

        .strength-text {
            font-size: 12px;
            color: #64748b;
        }

        /* Password Match */
        .match-status {
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .match-status i {
            position: static;
            font-size: 14px;
        }

        .text-success {
            color: #10b981;
        }

        .text-danger {
            color: #ef4444;
        }

        .text-muted {
            color: #94a3b8;
        }

        /* Terms Checkbox */
        .terms-checkbox {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border: 2px solid #cbd5e1;
            border-radius: 5px;
            cursor: pointer;
            accent-color: #2563eb;
        }

        .terms-checkbox label {
            font-size: 14px;
            color: #475569;
            cursor: pointer;
        }

        .terms-checkbox a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-register {
            width: 100%;
            height: 52px;
            background: linear-gradient(145deg, #2563eb, #1d4ed8);
            border: none;
            border-radius: 14px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
            background: linear-gradient(145deg, #1d4ed8, #1e40af);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* Login Link */
        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 15px;
            color: #64748b;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Error Messages */
        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .brand-side {
                padding: 32px 24px;
            }

            .form-side {
                padding: 32px 24px;
            }

            .brand-content h1 {
                font-size: 28px;
            }
        }

        /* Row Gap */
        .row {
            margin: 0 -8px;
        }

        .col-md-6 {
            padding: 0 8px;
        }
    </style>
</head>

<body>
    <div class="registration-wrapper">
        <div class="row g-0">
            <!-- Right Side - Registration Form -->
            <div class="col-lg-12">
                <div class="form-side">
                    <div class="form-header">
                        <h2>Create an account</h2>
                        <p>Get started with your free account today</p>
                    </div>

                    <form action="{{route ('auth.registerUser') }}" method="POST">
                        @csrf

                        <!-- Name & Email Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-wrapper">
                                        <i class="far fa-user"></i>
                                        <input type="text" class="form-control" name="name" placeholder="John Doe"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-wrapper">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="john@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Password & Confirm Password Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="••••••••" required>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <div class="strength-bars">
                                            <div class="strength-bar"></div>
                                            <div class="strength-bar"></div>
                                            <div class="strength-bar"></div>
                                            <div class="strength-bar"></div>
                                        </div>
                                        <span class="strength-text">Enter a strong password</span>
                                    </div>
                                    @error('password')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="••••••••" required>
                                    </div>
                                    <div class="match-status" id="passwordMatchStatus">
                                        <i class="fas fa-info-circle text-muted"></i>
                                        <span class="text-muted">Re-enter your password</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phone & Address Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-phone-alt"></i>
                                        <input type="tel" class="form-control" name="phone" id="phone"
                                            placeholder="+1 (555) 000-0000" value="{{ old('phone') }}" required>
                                    </div>
                                    @error('phone')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <textarea class="form-control" name="address" placeholder="123 Main St, City, Country" required>{{ old('address') }}</textarea>
                                    </div>
                                    @error('address')
                                        <small class="error-message">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="terms-checkbox">
                            <input type="checkbox" name="terms" id="terms" required>
                            <label for="terms">
                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                    Policy</a>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-register">
                            <i class="fas fa-user-plus"></i>
                            Create Account
                        </button>

                        <!-- Login Link -->
                        <div class="login-link">
                            Already have an account? <a href="{{ route('auth.login') }}">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Password Strength Checker
        const password = document.getElementById('password');
        const strengthBars = document.querySelectorAll('.strength-bar');
        const strengthText = document.querySelector('.strength-text');

        password.addEventListener('input', function() {
            const value = this.value;
            let strength = 0;

            if (value.length >= 8) strength++;
            if (value.match(/[a-z]/) && value.match(/[A-Z]/)) strength++;
            if (value.match(/[0-9]/)) strength++;
            if (value.match(/[^a-zA-Z0-9]/)) strength++;

            // Update bars
            strengthBars.forEach((bar, index) => {
                if (index < strength) {
                    bar.classList.add('active');
                } else {
                    bar.classList.remove('active');
                }
            });

            // Update text
            const messages = [
                'Enter a strong password',
                'Weak password',
                'Fair password',
                'Good password',
                'Strong password!'
            ];

            strengthText.textContent = messages[strength];
            strengthText.style.color = strength === 4 ? '#10b981' : '#64748b';
        });

        // Password Match Checker
        const confirmPassword = document.getElementById('password_confirmation');
        const matchStatus = document.getElementById('passwordMatchStatus');

        function checkPasswordMatch() {
            if (confirmPassword.value.length > 0) {
                if (password.value === confirmPassword.value) {
                    matchStatus.innerHTML = `
                        <i class="fas fa-check-circle text-success"></i>
                        <span class="text-success">Passwords match</span>
                    `;
                } else {
                    matchStatus.innerHTML = `
                        <i class="fas fa-times-circle text-danger"></i>
                        <span class="text-danger">Passwords do not match</span>
                    `;
                }
            } else {
                matchStatus.innerHTML = `
                    <i class="fas fa-info-circle text-muted"></i>
                    <span class="text-muted">Re-enter your password</span>
                `;
            }
        }

        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);

        // Phone Number Formatting
        const phone = document.getElementById('phone');
        phone.addEventListener('input', function(e) {
            let x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });

        // Floating Labels Effect (Optional)
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('i').style.color = '#2563eb';
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.querySelector('i').style.color = '#94a3b8';
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
