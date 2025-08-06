<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #0f2027;
            background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .particles {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('https://cdn.pixabay.com/photo/2017/08/30/07/52/background-2698979_1280.png');
            background-size: cover;
            opacity: 0.03;
            z-index: 1;
        }

        .login-box {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
            animation: fadeInUp 1s ease;
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(40px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            font-weight: 500;
            color: #e0e0e0;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 1rem;
            outline: none;
            transition: 0.3s ease;
        }

        .form-input:focus {
            background-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 0 2px #a78bfa;
        }

        .form-group i {
            position: absolute;
            top: 38px;
            left: 12px;
            color: #ccc;
            font-size: 1.1rem;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 38px;
            color: #ccc;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
        }

        .alert {
            background-color: rgba(255, 80, 80, 0.3);
            color: #fff;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
            color: #ddd;
        }

        .register-link a {
            color: #fff;
            text-decoration: underline;
            font-weight: 600;
        }

        .text-danger {
            color: #ffbdbd;
            font-size: 0.9rem;
        }

        ::placeholder {
            color: #eee;
        }
    </style>
</head>

<body>
    <div class="particles"></div>

    <div class="login-box">
        <div class="login-title">Login Admin</div>

        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <i class='bx bx-envelope'></i>
                <input type="email" id="email" name="email" placeholder="Masukkan Email"
                    class="form-input @error('email') is-invalid @enderror" required autofocus>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <i class='bx bx-lock-alt'></i>
                <input type="password" id="password" name="password" placeholder="Masukkan Password"
                    class="form-input @error('password') is-invalid @enderror" required>
                <i class='bx bx-show toggle-password' onclick="togglePassword()"></i>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Login</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            } else {
                input.type = 'password';
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            }
        }
    </script>
</body>

</html>