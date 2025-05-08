<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6c5ce7;
            --secondary: #a29bfe;
            --accent: #fd79a8;
            --success: #00b894;
            --warning: #fdcb6e;
            --danger: #e17055;
            --light: #f8f9fa;
            --dark: #2d3436;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ff 100%);
            font-family: 'Poppins', sans-serif;
            color: #333;
            min-height: 100vh;
            padding: 2rem 0;
        }
        
        .container {
            max-width: 900px;
            padding-top: 1rem;
            padding-bottom: 2rem;
        }
        
        .page-title {
            font-weight: 800;
            color: var(--primary);
            font-size: 2.2rem;
            text-shadow: 1px 1px 0px rgba(108, 92, 231, 0.2);
            display: flex;
            align-items: center;
        }
        
        .page-title i {
            margin-right: 12px;
            font-size: 1.8rem;
        }
        
        .page-subtitle {
            color: #6c7293;
            margin-left: 36px;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            margin-top: 2rem;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
            position: relative;
            font-weight: 600;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            filter: blur(10px);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            border: 2px solid #e2e8f0;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 0.25rem rgba(162, 155, 254, 0.25);
        }
        
        .form-control::placeholder {
            color: #cbd5e0;
        }
        
        .input-group-text {
            border-radius: 10px 0 0 10px;
            background-color: #f8f9fa;
            border: 2px solid #e2e8f0;
            border-right: none;
        }
        
        .btn-group {
            margin-top: 2rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-update {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            color: white;
            box-shadow: 0 10px 20px rgba(108, 92, 231, 0.3);
        }
        
        .btn-update:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(108, 92, 231, 0.4);
        }
        
        .btn-back {
            background: linear-gradient(135deg, #dfe6e9 0%, #b2bec3 100%);
            border: none;
            color: #2d3436;
            box-shadow: 0 10px 20px rgba(178, 190, 195, 0.3);
        }
        
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(178, 190, 195, 0.4);
            color: #2d3436;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #a0aec0;
        }
        
        .input-icon input,
        .input-icon textarea {
            padding-left: 45px;
        }
        
        .edit-form-info {
            background-color: rgba(108, 92, 231, 0.1);
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .supplier-id {
            display: inline-block;
            background-color: rgba(108, 92, 231, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-left: 15px;
        }
        .badge-inactive {
            background-color: rgba(225, 112, 85, 0.1);
            color: var(--danger);
        }
        .input-icon select {
            padding-left: 45px;
        }
        
        .input-icon select option {
            padding: 10px;
        }
        
        #status {
            background-color: transparent;
            border: 2px solid #e2e8f0;
            color: var(--dark);
        }
        
        #status:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 0.25rem rgba(162, 155, 254, 0.25);
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="mb-2">
            <h1 class="page-title"><i class="bi bi-pencil-square"></i> Edit Supplier <span class="supplier-id">ID: {{ $supplier->id }}</span></h1>
            <p class="page-subtitle">Perbarui informasi supplier di sistem</p>
        </div>
        
        <!-- Card Wrapper -->
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <i class="bi bi-building me-2"></i> Form Edit Supplier
            </div>
            <div class="card-body">
                <!-- Info Box -->
                <div class="edit-form-info">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle me-2" style="color: var(--primary); font-size: 1.2rem;"></i>
                        <p class="mb-0">Anda sedang mengedit informasi supplier <strong>{{ $supplier->nama }}</strong></p>
                    </div>
                </div>
                
                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">
                                <i class="bi bi-person-badge me-1"></i> Nama Supplier
                            </label>
                            <div class="input-icon">
                                <i class="bi bi-building"></i>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama supplier" value="{{ $supplier->nama }}" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i> Email
                            </label>
                            <div class="input-icon">
                                <i class="bi bi-envelope"></i>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ $supplier->email }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamat" class="form-label">
                            <i class="bi bi-geo-alt me-1"></i> Alamat
                        </label>
                        <div class="input-icon">
                            <i class="bi bi-geo-alt"></i>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required>{{ $supplier->alamat }}</textarea>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telepon" class="form-label">
                            <i class="bi bi-telephone me-1"></i> Telepon
                        </label>
                        <div class="input-icon">
                            <i class="bi bi-telephone"></i>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" value="{{ $supplier->telepon }}" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="status" class="form-label">
                            <i class="bi bi-toggle-on me-1"></i> Status Supplier
                        </label>
                        <div class="input-icon">
                            <i class="bi bi-circle-fill status-icon" ></i>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active" {{ $supplier->status === 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $supplier->status === 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('suppliers.index') }}" class="btn btn-back">
                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-update">
                                    <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Last updated info -->
        <div class="text-center mt-3 text-muted">
            <small>Terakhir diperbarui: {{ $supplier->updated_at ? $supplier->updated_at->format('d M Y, H:i') : '-' }}</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusSelect = document.getElementById('status');
        const statusIcon = document.querySelector('.bi-circle-fill');
        
        function updateStatusIcon() {
            const isActive = statusSelect.value === 'active';
            statusIcon.style.color = isActive ? 'var(--success)' : 'var(--danger)';
        }
        
        statusSelect.addEventListener('change', updateStatusIcon);
    });
    </script>
</body>
</html>