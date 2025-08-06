<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #2c5364, #203a43, #0f2027);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
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

        .register-box {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 460px;
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

        .register-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #e0e0e0;
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
            background: rgba(255, 255, 255, 0.3);
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
            top: 38px;
            right: 15px;
            color: #ccc;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
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

        .alert-success {
            background-color: rgba(80, 255, 80, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
            color: #ddd;
        }

        .login-link a {
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

    <div class="register-box">
        <div class="register-title">Register</div>

        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama</label>
                <i class='bx bx-user'></i>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama"
                    class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <i class='bx bx-envelope'></i>
                <input type="email" id="email" name="email" placeholder="Masukkan Email"
                    class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <i class='bx bx-lock-alt'></i>
                <input type="password" id="password" name="password" placeholder="Masukkan Password"
                    class="form-input @error('password') is-invalid @enderror" required>
                <i class='bx bx-show toggle-password' onclick="togglePassword('password', this)"></i>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <i class='bx bx-lock'></i>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Ulangi Password" class="form-input" required>
                <i class='bx bx-show toggle-password' onclick="togglePassword('password_confirmation', this)"></i>
            </div>

            <button type="submit" class="btn-primary">Register</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.classList.remove("bx-show");
                el.classList.add("bx-hide");
            } else {
                input.type = "password";
                el.classList.remove("bx-hide");
                el.classList.add("bx-show");
            }
        }
    </script>
</body>

</html>