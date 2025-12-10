<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar Produk</title>
    <style>
        :root{--primary:#1e40af;--primary-light:#3b82f6;--accent:#0ea5e9;--danger:#dc2626;--warning:#f59e0b}
        *{box-sizing:border-box}
        body{margin:0;padding:0;font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,Arial;background:linear-gradient(135deg,#0f172a,#1e3a8a);min-height:100vh;color:#e2e8f0;position:relative}
        .bg-particles{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;opacity:0.03;background-image:radial-gradient(1px 1px at 10px 20px,#3b82f6,rgba(59,130,246,0)),radial-gradient(1px 1px at 40px 60px,#0ea5e9,rgba(14,165,233,0));background-repeat:repeat;background-size:200px 200px}
        .navbar{position:relative;z-index:3;display:flex;align-items:center;justify-content:space-between;padding:18px 32px;background:rgba(15,23,42,0.7);backdrop-filter:blur(8px);border-bottom:1px solid rgba(59,130,246,0.1);box-shadow:0 4px 20px rgba(0,0,0,0.3)}
        .navbar h2{margin:0;font-size:18px;color:#fff;font-weight:700}
        .nav-links{display:flex;gap:18px;align-items:center}
        .nav-links a{color:#cbd5e1;text-decoration:none;font-weight:600;transition:color 0.2s;font-size:13px}
        .nav-links a:hover{color:var(--accent)}
        .container{position:relative;z-index:2;width:90%;max-width:1200px;margin:40px auto;background:rgba(30,41,59,0.6);border-radius:16px;padding:32px;box-shadow:0 20px 50px rgba(0,0,0,0.5);backdrop-filter:blur(10px);border:1px solid rgba(59,130,246,0.1)}
        h2{text-align:center;margin:0 0 24px;font-size:24px;color:#fff}
        .controls{display:flex;gap:12px;margin-bottom:24px;align-items:center;justify-content:space-between}
        .btn-add{background:linear-gradient(135deg,var(--primary),var(--primary-light));color:white;padding:10px 18px;text-decoration:none;border-radius:10px;font-weight:600;transition:all 0.2s;font-size:13px;text-transform:uppercase}
        .btn-add:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(59,130,246,0.3)}
        table{width:100%;border-collapse:collapse;margin-top:15px}
        table th{background:rgba(59,130,246,0.1);color:#cbd5e1;text-align:center;padding:12px;font-weight:600;border-bottom:1px solid rgba(59,130,246,0.2);font-size:13px;text-transform:uppercase}
        table td{padding:12px;border-bottom:1px solid rgba(59,130,246,0.1);text-align:center;font-size:13px}
        table tr:hover{background:rgba(59,130,246,0.05)}
        .btn-edit{background:var(--warning);padding:6px 12px;text-decoration:none;color:#000;border-radius:6px;font-weight:600;font-size:12px;transition:all 0.2s;display:inline-block}
        .btn-edit:hover{background:#fbbf24}
        .btn-delete{background:var(--danger);padding:6px 12px;border:none;color:white;border-radius:6px;cursor:pointer;font-weight:600;font-size:12px;transition:all 0.2s}
        .btn-delete:hover{background:#b91c1c}
        .btn-delete:active{transform:scale(0.95)}
        .text-right{text-align:right}
        @media(max-width:900px){
            .controls{flex-direction:column;align-items:flex-start}
            table{font-size:12px}
            .container{padding:20px}
        }
    </style>
</head>
<body>
<div class="bg-particles"></div>
<div class="navbar">
    <div><h2>📦 Dashboard Produk</h2></div>
    <div class="nav-links">
        <a href="/dashboard">Home</a>
        <a href="/logout">Logout</a>
    </div>
</div>
<div class="container">
    <h2>Daftar Produk</h2>
    <div class="controls">
        <a href="{{ route('products.create') }}" class="btn-add">+ Tambah Produk</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Store</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td style="text-align:left">{{ $p->name }}</td>
                <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td style="text-align:left">{{ substr($p->description, 0, 60) }}{{ strlen($p->description) > 60 ? '...' : '' }}</td>
                <td style="text-align:left">{{ $p->store ?? '-' }}</td>
                <td>{{ $p->stock ?? 0 }}</td>
                <td>
                    <a href="{{ route('products.edit', $p->id) }}" class="btn-edit">Edit</a>
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>