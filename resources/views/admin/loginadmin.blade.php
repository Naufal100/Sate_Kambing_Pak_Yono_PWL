<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Warung Sate</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #66ea6d 0%, #4ba255 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .login-container {
            background: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header i {
            font-size: 48px;
            color: #66ea89;
            margin-bottom: 15px;
        }

        .login-header h2 {
            font-size: 28px;
            color: #1e3b21;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #648b66;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1e293b;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: #66ea94;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group input::placeholder {
            color: #cbd5e1;
        }

        .error-message {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #dc2626;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #66ea7a 0%, #4ba261 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 35px 25px;
                margin: 20px;
            }

            .login-header h2 {
                font-size: 24px;
            }

            .login-header i {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <i class="fas fa-lock"></i>
        <h2>Login Admin</h2>
        <p>Selamat datang di halaman admin Warung Sate kambing Pak Yono</p>
    </div>

    @if(session('error'))
        <div class="error-message">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
            <label for="username">
                <i class="fas fa-user"></i> Username
            </label>
            <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
        </div>

        <div class="form-group">
            <label for="password">
                <i class="fas fa-key"></i> Password
            </label>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
        </div>

        <button type="submit" class="login-btn">
            <i class="fas fa-sign-in-alt"></i> Login
        </button>
    </form>

    <div class="login-footer">
        <p>&copy; 2026 Warung Sate. Semua hak dilindungi.</p>
    </div>
</div>

</body>
</html>
