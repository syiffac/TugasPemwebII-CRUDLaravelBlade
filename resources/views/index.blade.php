<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Supplier</title>
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
        }
        
        .container {
            max-width: 1140px;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .page-title {
            font-weight: 800;
            color: var(--primary);
            font-size: 2.2rem;
            text-shadow: 1px 1px 0px rgba(108, 92, 231, 0.2);
        }
        
        .page-subtitle {
            color: #6c7293;
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
            position: relative;
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
        
        .supplier-count {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .search-box {
            max-width: 300px;
            border-radius: 50px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.3);
        }
        
        .search-box .input-group-text,
        .search-box .form-control {
            background: transparent;
            border: none;
            color: white;
        }
        
        .search-box .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .table {
            margin-bottom: 0;
        }
        
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-top: none;
            background-color: #f8f9fa;
            color: #6c757d;
            padding: 1rem 1.5rem;
        }
        
        .table td {
            padding: 1.2rem 1.5rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .table tr:nth-child(odd) {
            background-color: rgba(236, 240, 255, 0.5);
        }
        
        .table tr:hover {
            background-color: rgba(108, 92, 231, 0.05);
        }
        
        .btn-add {
            background: linear-gradient(135deg, var(--accent) 0%, #e84393 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 600;
            color: white;
            box-shadow: 0 10px 20px rgba(253, 121, 168, 0.3);
            transition: all 0.3s;
        }
        
        .btn-add:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(253, 121, 168, 0.4);
        }
        
        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            margin: 0 5px;
            padding: 0;
        }
        
        .btn-edit {
            background-color: var(--warning);
            border: none;
            color: #333;
            box-shadow: 0 4px 10px rgba(253, 203, 110, 0.3);
        }
        
        .btn-edit:hover {
            background-color: #f9b84d;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(253, 203, 110, 0.4);
        }
        
        .btn-delete {
            background-color: var(--danger);
            border: none;
            color: white;
            box-shadow: 0 4px 10px rgba(225, 112, 85, 0.3);
        }
        
        .btn-delete:hover {
            background-color: #d06651;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(225, 112, 85, 0.4);
        }
        
        .alert {
            border-radius: 15px;
            padding: 1rem 1.5rem;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 184, 148, 0.2);
        }
        
        .alert-success {
            background: linear-gradient(135deg, var(--success) 0%, #55efc4 100%);
            color: white;
        }
        
        .supplier-name {
            font-weight: 600;
            color: var(--primary);
        }
        
        .supplier-email {
            color: #636e72;
        }
        
        .timestamp {
            font-size: 0.85rem;
            color: #636e72;
        }
        
        .timestamp-title {
            color: var(--secondary);
            font-weight: 500;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }
        
        .badge-status {
            font-size: 0.85rem;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        
        .badge-active {
            background-color: rgba(0, 184, 148, 0.1); /* Latar belakang hijau */
            color: var(--success); /* Teks hijau */
        }
        
        .badge-inactive {
            background-color: rgba(225, 112, 85, 0.1); /* Latar belakang merah */
            color: var(--danger); /* Teks merah */
        }
        
        .badge-active::before, .badge-inactive::before {
            content: '';
            position: relative;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .badge-active::before {
            background-color: var(--success); /* Lingkaran hijau */
            box-shadow: 0 0 10px var(--success); /* Efek bayangan */
        }
        
        .badge-inactive::before {
            background-color: var(--danger); /* Lingkaran merah */
            box-shadow: 0 0 10px var(--danger); /* Efek bayangan */
        }
        
        .empty-state {
            padding: 3rem 0;
            text-align: center;
        }
        
        .empty-icon {
            font-size: 4rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            /* -webkit-background-clip: text; */
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        
        .empty-text {
            color: #6c7293;
            font-size: 1.1rem;
            font-weight: 500;
        }
    
    .badge-status {
        transition: all 0.3s ease;
    }
    
    .badge-active, .badge-inactive {
        position: relative;
        padding-left: 25px;
    }
    
    .badge-active::before, .badge-inactive::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }
    
    .badge-active::before {
        background-color: var(--success);
        box-shadow: 0 0 10px var(--success);
    }
    
    .badge-inactive::before {
        background-color: var(--danger);
        box-shadow: 0 0 10px var(--danger);
    }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="page-title mb-1">Daftar Supplier</h1>
                <p class="page-subtitle mb-0">Kelola data supplier dengan mudah</p>
            </div>
            <a href="{{ route('suppliers.create') }}" class="btn btn-add d-flex align-items-center">
                <i class="bi bi-plus-circle me-2"></i> Tambah Supplier
            </a>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <span><strong>Berhasil!</strong> {{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card Wrapper -->
        <div class="card mb-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 me-3 fw-bold">Data Supplier</h5>
                    <span class="supplier-count">
                        {{ count($suppliers) }} 
                        @if(isset($search) && $search)
                            hasil pencarian "{{ $search }}"
                        @else
                            Supplier
                        @endif
                    </span>
                </div>
                <div class="search-box input-group">
                    <form action="{{ route('suppliers.index') }}" method="GET" class="d-flex w-100">
                        <span class="input-group-text border-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" 
                               name="search" 
                               class="form-control border-0" 
                               placeholder="Cari supplier..." 
                               value="{{ $search ?? '' }}"
                               autocomplete="off">
                        @if(isset($search) && $search)
                            <span class="input-group-text border-0 p-0">
                                <a href="{{ route('suppliers.index') }}" 
                                   class="btn btn-link text-decoration-none text-muted px-2"
                                   title="Clear search">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </span>
                        @endif
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Timestamp</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="supplier-name">{{ $supplier->nama }}</div>
                                    <div class="supplier-email">{{ $supplier->email }}</div>
                                </td>
                                <td>{{ $supplier->alamat }}</td>
                                <td>
                                    <div><i class="bi bi-telephone me-1"></i> {{ $supplier->telepon }}</div>
                                </td>
                                <td>
                                    <div class="timestamp-title">Dibuat</div>
                                    <div class="timestamp">{{ $supplier->created_at ? $supplier->created_at->format('d M Y, H:i') : '-' }}</div>
                                    <div class="timestamp-title mt-2">Diperbarui</div>
                                    <div class="timestamp">{{ $supplier->updated_at ? $supplier->updated_at->format('d M Y, H:i') : '-' }}</div>
                                </td>
                                <td>
                                    <span class="badge-status {{ $supplier->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $supplier->status === 'active' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-edit action-btn" title="Edit">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete action-btn" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            <!-- If no suppliers exist -->
                            @if(count($suppliers) == 0)
                            <tr>
                                <td colspan="7">
                                    <div class="empty-state">
                                        <i class="bi bi-box empty-icon"></i>
                                        <p class="empty-text mb-1">Belum ada data supplier</p>
                                        <p class="text-muted">Silahkan tambahkan supplier baru untuk mulai</p>
                                        <a href="{{ route('suppliers.create') }}" class="btn btn-add mt-3">
                                            <i class="bi bi-plus-circle me-2"></i> Tambah Supplier Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>