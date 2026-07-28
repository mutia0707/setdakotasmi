<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - Sekretariat Daerah Kota Sukabumi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk Ikon Mata -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f7f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            background: #ffffff;
        }
        .login-header {
            background: linear-gradient(135deg, #004a99 0%, #0066cc 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .login-header img {
            width: 55px;
            height: 55px;
            object-fit: contain;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="card login-card">
        <div class="login-header">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo">
            <h4 class="fw-bold m-0">LOGIN SISTEM</h4>
            <small class="text-white-50">Sekretariat Daerah Kota Sukabumi</small>
        </div>
        <div class="card-body p-4">
            
            @if($errors->any())
                <div class="alert alert-danger py-2">
                    <small>{{ $errors->first() }}</small>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold text-secondary">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@gmail.com" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-secondary">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" id="iconEye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3" style="background-color: #0056b3;">MASUK</button>
                
                <div class="text-center">
                    <a href="{{ url('/') }}" class="text-decoration-none text-muted small"><i class="fas fa-arrow-left me-1"></i> Kembali ke Beranda</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script untuk Toggle Lihat Password -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const iconEye = document.querySelector('#iconEye');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            iconEye.classList.toggle('fa-eye');
            iconEye.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>