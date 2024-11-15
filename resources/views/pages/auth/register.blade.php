<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - Absensi Siswa</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="">
                </a>
                <p class="text-center">Create a new account</p>
                <form action="/storeRegister" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                    @error('nama')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" id="nis">
                    @error('nis')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" id="gender" required>
                        <option value="pria">Laki-laki</option>
                        <option value="wanita">Perempuan</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="alamat" name="alamat" class="form-control" id="alamat">
                    @error('alamat')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label><strong>Role</strong></label>
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an account?</p>
                    <a class="text-primary fw-bold ms-2" href="/login">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
