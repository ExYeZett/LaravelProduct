<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
    <style>
        :root{--primary:#1e40af;--primary-light:#3b82f6;--accent:#0ea5e9;--success:#10b981;--warning:#f59e0b}
        *{box-sizing:border-box}
        body{margin:0;padding:0;font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,Arial;background:linear-gradient(135deg,#0f172a,#1e3a8a);min-height:100vh;color:#e2e8f0;position:relative}
        .bg-particles{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;opacity:0.03;background-image:radial-gradient(1px 1px at 10px 20px,#3b82f6,rgba(59,130,246,0)),radial-gradient(1px 1px at 40px 60px,#0ea5e9,rgba(14,165,233,0));background-repeat:repeat;background-size:200px 200px}
        .navbar{position:relative;z-index:3;display:flex;align-items:center;justify-content:space-between;padding:18px 32px;background:rgba(15,23,42,0.7);backdrop-filter:blur(8px);border-bottom:1px solid rgba(59,130,246,0.1);box-shadow:0 4px 20px rgba(0,0,0,0.3)}
        .navbar h2{margin:0;font-size:18px;color:#fff;font-weight:700}
        .nav-links{display:flex;gap:18px;align-items:center}
        .nav-links a{color:#cbd5e1;text-decoration:none;font-weight:600;transition:color 0.2s;font-size:13px}
        .nav-links a:hover{color:var(--accent)}
        .container{position:relative;z-index:2;width:90%;max-width:1200px;margin:40px auto;background:rgba(30,41,59,0.6);border-radius:16px;padding:32px;box-shadow:0 20px 50px rgba(0,0,0,0.5);backdrop-filter:blur(10px);border:1px solid rgba(59,130,246,0.1)}
        .header{text-align:center;margin-bottom:36px}
        h1{margin:0 0 12px;font-size:28px;color:#fff;font-weight:700}
        .subtitle{color:#cbd5e1;font-size:14px;margin:0 0 24px}
        .content{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:32px}
        .card{background:rgba(59,130,246,0.08);border:1px solid rgba(59,130,246,0.2);border-radius:12px;padding:24px;transition:all 0.2s}
        .card:hover{background:rgba(59,130,246,0.12);border-color:rgba(59,130,246,0.4)}
        .card h3{margin:0 0 12px;font-size:18px;color:#fff;font-weight:600}
        .card p{margin:0 0 16px;color:#cbd5e1;font-size:13px;line-height:1.6}
        .card-stats{display:flex;gap:16px;margin-top:18px}
        .stat{flex:1;background:rgba(14,165,233,0.1);border-radius:8px;padding:12px;text-align:center}
        .stat-value{font-size:20px;font-weight:700;color:var(--accent)}
        .stat-label{font-size:11px;color:#cbd5e1;text-transform:uppercase;margin-top:4px}
        .actions{display:flex;gap:12px;flex-wrap:wrap}
        .btn{padding:10px 16px;border-radius:10px;text-decoration:none;font-weight:600;display:inline-block;transition:all 0.2s;font-size:13px;text-transform:uppercase;border:none;cursor:pointer}
        .btn-primary{background:linear-gradient(135deg,var(--primary),var(--primary-light));color:white}
        .btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(59,130,246,0.3)}
        .btn-secondary{background:rgba(59,130,246,0.2);color:var(--accent);border:1px solid rgba(59,130,246,0.4)}
        .btn-secondary:hover{background:rgba(59,130,246,0.3);border-color:rgba(59,130,246,0.6)}
        .quick-links{margin-top:32px;padding-top:32px;border-top:1px solid rgba(59,130,246,0.1)}
        .quick-links h3{margin:0 0 16px;font-size:16px;color:#fff;font-weight:600}
        .links-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px}
        .link-item{background:rgba(59,130,246,0.08);border:1px solid rgba(59,130,246,0.2);border-radius:8px;padding:16px;text-align:center;transition:all 0.2s}
        .link-item:hover{background:rgba(59,130,246,0.15);border-color:var(--accent)}
        .link-item a{text-decoration:none;color:var(--accent);font-weight:600;display:block}
        @media(max-width:900px){
            .content{grid-template-columns:1fr}
            .navbar{flex-direction:column;gap:12px}
            .nav-links{justify-content:center}
        }
    </style>
</head>
<body>
<div class="bg-particles"></div>
<div class="navbar">
    <div><h2>🏠 Dashboard</h2></div>
    <div class="nav-links">
        <a href="/dashboard">Home</a>
        <a href="/products">Produk</a>
        <a href="/logout">Logout</a>
    </div>
</div>
<div class="container">
    <div class="header">
        <h1>Selamat Datang 🎉</h1>
        <p class="subtitle">Halo, <strong>{{ session('user')->name ?? 'User' }}</strong>! Kelola toko Anda dengan mudah</p>
    </div>

    <div class="content">
        <div class="card">
            <h3>📊 Ringkasan</h3>
            <p>Lihat semua aktivitas dan statistik toko Anda dalam satu tempat yang mudah diakses.</p>
            <div class="card-stats">
                <div class="stat">
                    <div class="stat-value">{{ $totalProducts }}</div>
                    <div class="stat-label">Produk</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ $totalStock }}</div>
                    <div class="stat-label">Stok</div>
                </div>
            </div>
        </div>

        <div class="card">
            <h3>⚡ Quick Actions</h3>
            <p>Akses fitur utama dengan cepat langsung dari dashboard ini.</p>
            <div class="actions" style="margin-top:18px">
                <a href="/products/create" class="btn btn-primary">Tambah Produk</a>
                <a href="/products" class="btn btn-secondary">Lihat Produk</a>
            </div>
        </div>
    </div>

    <div class="quick-links">
        <h3>🔗 Menu Utama</h3>
        <div class="links-grid">
            <div class="link-item">
                <a href="/products">📦 Kelola Produk</a>
            </div>
            <div class="link-item">
                <a href="/products/create">➕ Tambah Produk</a>
            </div>
            <div class="link-item">
                <a href="/logout">🚪 Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>