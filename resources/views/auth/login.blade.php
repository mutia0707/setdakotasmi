<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - SETDA Kota Sukabumi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { 
            background-color: #f0f2f5; 
            font-family: 'Segoe UI', sans-serif; 
            height: 100vh; 
            display: flex; 
            align-items: center; 
        }
        .login-card {
            border: none;
            border-radius: 0;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            margin: auto;
            background: #fff;
        }
        .login-header {
            background: #0056b3;
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .login-header img { width: 60px; margin-bottom: 15px; }
        .login-header h4 { 
            font-weight: 800; 
            text-transform: uppercase; 
            margin: 0; 
            letter-spacing: 1px;
        }
        .form-control {
            border-radius: 0;
            padding: 12px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0056b3;
        }
        .btn-login {
            background: #212529;
            color: white;
            border: none;
            border-radius: 0;
            padding: 12px;
            font-weight: 700;
            text-transform: uppercase;
            transition: 0.3s;
        }
        .btn-login:hover { background: #000; color: #fff; }
        .error-text { color: #dc3545; font-size: 0.85rem; margin-top: 5px; }
    </style>
</head>
<body>

<div class="container">
    <div class="login-card">
        <div class="login-header">
            <img src="{{ asset('img/logosetda.png') }}" alt="Logo Sukabumi">
            <h4>Login Sistem</h4>
            <small class="opacity-75">Sekretariat Daerah Kota Sukabumi</small>
        </div>
        <div class="card-body p-4">
            
            @if($errors->any())
                <div class="alert alert-danger py-2 small">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-bold text-muted">EMAIL ADDRESS</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@sukabumikota.go.id" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted">PASSWORD</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-login w-100">
                    Masuk Ke Sistem <i class="bi bi-box-arrow-in-right ms-2"></i>
                </button>
            </form>
        </div>
        <div class="card-footer bg-white border-0 text-center pb-4">
            <a href="{{ url('/') }}" class="text-muted text-decoration-none small">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

</body>
</html>