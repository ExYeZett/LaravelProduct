<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Produk</title>
    <style>
        :root{--primary:#1e40af;--primary-light:#3b82f6;--accent:#0ea5e9}
        *{box-sizing:border-box}
        body{margin:0;padding:0;font-family:'Inter',system-ui,-apple-system,'Segoe UI',Roboto,Arial;background:linear-gradient(135deg,#0f172a,#1e3a8a);min-height:100vh;color:#e2e8f0;position:relative}
        .bg-particles{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;opacity:0.03;background-image:radial-gradient(1px 1px at 10px 20px,#3b82f6,rgba(59,130,246,0));background-repeat:repeat;background-size:200px 200px}
        .navbar{position:relative;z-index:3;display:flex;align-items:center;justify-content:space-between;padding:18px 32px;background:rgba(15,23,42,0.7);backdrop-filter:blur(8px);border-bottom:1px solid rgba(59,130,246,0.1);box-shadow:0 4px 20px rgba(0,0,0,0.3)}
        .navbar h2{margin:0;font-size:18px;color:#fff;font-weight:700}
        .nav-links{display:flex;gap:18px}
        .nav-links a{color:#cbd5e1;text-decoration:none;font-weight:600;transition:color 0.2s;font-size:13px}
        .nav-links a:hover{color:var(--accent)}
        .container{position:relative;z-index:2;width:90%;max-width:600px;margin:50px auto;background:rgba(30,41,59,0.6);border-radius:16px;padding:32px;box-shadow:0 20px 50px rgba(0,0,0,0.5);backdrop-filter:blur(10px);border:1px solid rgba(59,130,246,0.1)}
        h2{text-align:center;margin:0 0 24px;font-size:24px;color:#fff}
        .form-group{margin-bottom:18px}
        label{display:block;font-weight:600;color:#cbd5e1;margin-bottom:6px;font-size:13px;text-transform:uppercase;letter-spacing:0.5px}
        input,textarea{width:100%;padding:12px 16px;border:1px solid rgba(59,130,246,0.3);border-radius:10px;background:rgba(15,23,42,0.8);color:#e2e8f0;font-size:14px;font-family:inherit;transition:all 0.2s ease}
        input:focus,textarea:focus{outline:none;border-color:var(--accent);background:rgba(15,23,42,0.95);box-shadow:0 0 0 3px rgba(14,165,233,0.15)}
        .btn{width:100%;padding:12px 16px;background:linear-gradient(135deg,var(--primary),var(--primary-light));border:none;color:white;font-size:14px;border-radius:10px;cursor:pointer;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;transition:all 0.2s ease;margin-top:12px}
        .btn:hover{transform:translateY(-2px);box-shadow:0 10px 25px rgba(59,130,246,0.4)}
        .back-btn{display:block;margin-top:15px;text-align:center;text-decoration:none;color:var(--accent);font-weight:600;font-size:13px;transition:color 0.2s}
        .back-btn:hover{color:var(--primary-light);text-decoration:underline}
        @media(max-width:600px){.container{padding:20px}}
    </style>
</head>
<body>
<div class="bg-particles"></div>
<div class="navbar">
    <div><h2>Edit Produk</h2></div>
    <div class="nav-links">
        <a href="/products">Kembali</a>
        <a href="/logout">Logout</a>
    </div>
</div>
<div class="container">
    <h2>✏️ Edit Produk</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input id="name" type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Harga Produk</label>
            <input id="price" type="number" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="store">Store (pisahkan dengan koma)</label>
            <input id="store" type="text" name="store" value="{{ $product->store ?? '' }}" placeholder="Toko Pusat, Toko Cabang Bandung" >
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input id="stock" type="number" name="stock" value="{{ $product->stock ?? 0 }}" min="0" placeholder="Jumlah stok" >
        </div>
        <button type="submit" class="btn">Update Produk</button>
    </form>
    <a href="{{ route('products.index') }}" class="back-btn">← Kembali ke Daftar Produk</a>
</div>
</body>
</html>