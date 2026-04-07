<?php 
session_start();
if($_SESSION['status'] != "login"){
    header("location:login.php?pesan=belum_login");
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        
        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background: linear-gradient(135deg, #06c9fa 0%, #105efb 100%);
            color: white;
            transition: all 0.3s;
        }
        .sidebar-header { padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-link {
            padding: 15px 25px;
            display: block;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar-link:hover { background: rgba(255,255,255,0.1); padding-left: 35px; color: #fff; }
        .sidebar-link i { margin-right: 10px; width: 20px; }

        /* Main Content */
        .main-content { margin-left: 250px; padding: 30px; }
        
        /* Card & Table Styling */
        .card { border: none; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .table thead { background-color: #f8f9fa; }
        .table th { border-top: none; color: #666; font-weight: 600; text-transform: uppercase; font-size: 12px; }
        
        .badge-student { background-color: #e3f2fd; color: #0d6efd; padding: 5px 12px; border-radius: 6px; font-weight: 500; }
        
        .logout-btn { color: #ff4d4d !important; font-weight: 600; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Institut Teknologi Nasional</h4>
        </div>
        <nav class="mt-3">
            <a href="#" class="sidebar-link active"><i class="fas fa-home"></i> Dashboard</a>
            <a href="#" class="sidebar-link"><i class="fas fa-user-graduate"></i> Data Siswa</a>
            <a href="#" class="sidebar-link"><i class="fas fa-book"></i> Mata Pelajaran</a>
            <hr class="mx-3">
            <a href="logout.php" class="sidebar-link logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Halo, <?php echo $_SESSION['username']; ?>! 👋</h2>
                <p class="text-muted">Selamat datang</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold"><i class="fas fa-user-graduate me-2 text-primary"></i> Data Siswa</h5>
                  
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="text-muted">2223001</td>
                                <td class="fw-bold">rasya</td>
                                <td><span class="badge-student">XI-RPL 1</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="text-muted">2223002</td>
                                <td class="fw-bold">sepa</td>
                                <td><span class="badge-student">XI-RPL 1</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="text-muted">2223003</td>
                                <td class="fw-bold">doplan</td>
                                <td><span class="badge-student">XI-RPL 1</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="text-muted">2223004</td>
                                <td class="fw-bold">nazril</td>
                                <td><span class="badge-student">XI-RPL 1</span></td> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold"><i class="fas fa-book me-2 text-primary"></i> Data Mata Pelajaran</h5>
                   
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mapel</th>
                                <th>Guru Pengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">Basis Data</td>
                                <td><i class="fas fa-chalkboard-teacher me-2 text-muted"></i>Pak Yadi</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="fw-bold">Bebas</td>
                                <td><i class="fas fa-chalkboard-teacher me-2 text-muted"></i>Bu Rosida</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>