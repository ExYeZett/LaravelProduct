<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - E-Commerce</title>
    <style>
        :root{--primary:#1e40af;--primary-light:#3b82f6;--accent:#0ea5e9}
        *{box-sizing:border-box}
        body{margin:0;padding:0;font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,Arial;background:linear-gradient(135deg,#0f172a,#1e3a8a);min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;position:relative}
        .bg-particles{position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;opacity:0.06;background-image:radial-gradient(2px 2px at 20px 30px,#3b82f6,rgba(59,130,246,0)),radial-gradient(2px 2px at 60px 70px,#0ea5e9,rgba(14,165,233,0)),radial-gradient(1px 1px at 50px 50px,#60a5fa,rgba(96,165,250,0));background-repeat:repeat;background-size:200px 200px}
        .wrap{position:relative;z-index:2;width:100%;max-width:420px;padding:20px}
        .card{background:rgba(30,41,59,0.95);border-radius:16px;padding:40px;box-shadow:0 25px 50px rgba(0,0,0,0.5),inset 0 1px 0 rgba(255,255,255,0.05);backdrop-filter:blur(10px);border:1px solid rgba(59,130,246,0.2);animation:slideUp 0.6s ease}
        @keyframes slideUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:none}}
        .brand{text-align:center;margin-bottom:24px}
        .brand h2{margin:0 0 8px;color:#fff;font-size:28px;letter-spacing:-0.5px}
        .brand p{margin:0;color:#94a3b8;font-size:13px}
        .form-group{margin-bottom:18px}
        label{display:block;font-weight:600;color:#cbd5e1;margin-bottom:6px;font-size:13px;text-transform:uppercase;letter-spacing:0.5px}
        input[type="email"],input[type="password"]{width:100%;padding:12px 16px;border-radius:10px;border:1px solid rgba(59,130,246,0.3);background:rgba(15,23,42,0.8);color:#e2e8f0;font-size:14px;transition:all 0.2s ease}
        input:focus{outline:none;border-color:var(--accent);background:rgba(15,23,42,0.95);box-shadow:0 0 0 3px rgba(14,165,233,0.15)}
        .btn{width:100%;padding:12px 16px;border-radius:10px;border:none;background:linear-gradient(135deg,var(--primary),var(--primary-light));color:white;font-weight:700;font-size:14px;cursor:pointer;transition:all 0.2s ease;text-transform:uppercase;letter-spacing:0.5px}
        .btn:hover{transform:translateY(-2px);box-shadow:0 10px 25px rgba(59,130,246,0.4)}
        .btn:active{transform:translateY(0)}
        .alerts{margin-bottom:16px}
        .alert{padding:12px 16px;border-radius:10px;font-size:13px;animation:slideDown 0.3s ease}
        @keyframes slideDown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:none}}
        .alert.error{background:rgba(239,68,68,0.1);color:#fca5a5;border:1px solid rgba(239,68,68,0.3)}
        .alert.success{background:rgba(34,197,94,0.1);color:#86efac;border:1px solid rgba(34,197,94,0.3)}
        .register-link{font-size:13px;text-align:center;margin-top:20px;color:#94a3b8}
        .register-link a{color:var(--accent);text-decoration:none;font-weight:600;transition:color 0.2s}
        .register-link a:hover{color:var(--primary-light);text-decoration:underline}
        @media(max-width:480px){.card{padding:28px 24px}.brand h2{font-size:24px}}
    </style>
</head>
<body>
<div class="bg-particles"></div>
<div class="wrap">
    <div class="card">
        <div class="brand">
            <h2>Login</h2>
            <p>Masuk ke akun Anda</p>
        </div>
        <div class="alerts">
            @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
            @endif
            @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
            @endif
        </div>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="nama@email.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>
    </div>
</div>
</body>
</html>
