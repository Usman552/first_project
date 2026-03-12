<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
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
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrapper {
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            padding: 40px 32px;
            border: 1px solid #f1f5f9;
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h2 {
            font-size: 24px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }

        .login-header p {
            color: #64748b;
            font-size: 14px;
            font-weight: 400;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
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
            left: 14px;
            color: #94a3b8;
            font-size: 16px;
            transition: color 0.2s;
        }

        .form-control {
            width: 100%;
            height: 46px;
            padding: 0 14px 0 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            color: #0f172a;
            background: #ffffff;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.05);
        }

        .form-control:focus + i {
            color: #3b82f6;
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-size: 14px;
        }

        /* Options */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 16px 0 24px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border: 1.5px solid #cbd5e1;
            border-radius: 4px;
            cursor: pointer;
            accent-color: #3b82f6;
        }

        .remember label {
            font-size: 13px;
            color: #475569;
            cursor: pointer;
            font-weight: 500;
        }

        .forgot-link {
            font-size: 13px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Button */
        .btn-login {
            width: 100%;
            height: 46px;
            background: #3b82f6;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover {
            background: #2563eb;
        }

        /* Signup Link */
        .signup-section {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }

        .signup-section p {
            color: #64748b;
            font-size: 14px;
        }

        .signup-section a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
        }

        .signup-section a:hover {
            text-decoration: underline;
        }

        /* Error messages */
        .error-text {
            color: #ef4444;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        /* Alert */
        .alert {
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #991b1b;
        }

        .alert i {
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-wrapper {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Header -->
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please enter your details to sign in</p>
        </div>

        <!-- Error Alert (if any from Laravel) -->
        @if(session('error'))
        <div class="alert">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
        <div class="alert" style="background: #f0fdf4; border-color: #dcfce7; color: #166534;">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif

        <!-- Login Form -->
        <form action="{{route('auth.loginUser')}}" method="POST">
            @csrf

            <!-- Email Field -->
            <div class="form-group">
                <label class="form-label">Email</label>
                <div class="input-wrapper">
                    <i class="far fa-envelope"></i>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" placeholder="mike@example.com" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" placeholder="••••••••" required>
                </div>
                @error('password')
                    <small class="error-text">{{ $message }}</small>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="form-options">
                <div class="remember">
                    <input type="checkbox" name="remember" id="remember" >
                    <label for="remember">Remember for 30 days</label>
                </div>
                <a href="#" class="forgot-link">
                    Forgot password?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i>
                Sign in
            </button>
        </form>

        <!-- Sign Up Link -->
        <div class="signup-section">
            <p>
                Don't have an account?
                <a href="{{route('auth.signup')}}">Create account</a>
            </p>
        </div>

        <!-- Optional: Simple Social Icons -->
        <div style="text-align: center; margin-top: 20px;">
            <p style="color: #94a3b8; font-size: 12px; margin-bottom: 12px;">or continue with</p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <a href="#" style="width: 38px; height: 38px; border: 1px solid #e2e8f0; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #475569; transition: all 0.2s;">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" style="width: 38px; height: 38px; border: 1px solid #e2e8f0; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #475569; transition: all 0.2s;">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Simple JavaScript for password visibility toggle (optional) -->
    <script>
        // Password show/hide functionality
        const passwordField = document.querySelector('input[name="password"]');
        if (passwordField) {
            const wrapper = passwordField.closest('.input-wrapper');
            const toggleBtn = document.createElement('button');
            toggleBtn.type = 'button';
            toggleBtn.innerHTML = '<i class="far fa-eye"></i>';
            toggleBtn.style.position = 'absolute';
            toggleBtn.style.right = '12px';
            toggleBtn.style.background = 'none';
            toggleBtn.style.border = 'none';
            toggleBtn.style.cursor = 'pointer';
            toggleBtn.style.color = '#94a3b8';
            toggleBtn.style.padding = '4px';
            toggleBtn.style.zIndex = '2';
            
            toggleBtn.addEventListener('click', function() {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    this.innerHTML = '<i class="far fa-eye-slash"></i>';
                } else {
                    passwordField.type = 'password';
                    this.innerHTML = '<i class="far fa-eye"></i>';
                }
            });
            
            wrapper.appendChild(toggleBtn);
        }

        // Simple form validation
        document.querySelector('form')?.addEventListener('submit', function(e) {
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            
            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });
    </script>

    <!-- Bootstrap JS (optional, only if you need Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>