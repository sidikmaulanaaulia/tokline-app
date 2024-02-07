<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ubahProfileForm">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $user->nama }}"
                                id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}"
                                id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="nomor_telepon"
                                value="{{ $user->nomor_telepon }}" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin"
                                value="{{ $user->jenis_kelamin }}" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="{{ $user->tanggal_lahir }}" id="exampleInputPassword1">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="ubahProfile()" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>

                </form>
            </div>
        </div>
    </div>
    {{-- end form modal --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ubahPasswordForm">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="email" class="form-control" name="current_password"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            @error('current_password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                            <input type="text" class="form-control" name="new_password"
                                id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Konfirm Password</label>
                            <input type="text" class="form-control" name="confirm_password"
                                id="exampleInputPassword1" required>
                        </div>
                        <button type="button" onclick="ubahPassword()" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- container --}}
    <div class="container mt-5 mb-5">
        <a class="btn btn-primary" href="/dashboard">Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Profil"
                            class="img-fluid rounded-circle mb-3">
                        <h4 class="card-title">{{ $user->nama }}</h4>
                        <a class="btn btn-outline-success w-25 mt-3" href="">Pilih Photo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab"
                            aria-controls="home-tab-pane" aria-selected="true">Biodata Diri</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">Daftar Alamat</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                            aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab"
                            data-bs-target="#disabled-tab-pane" type="button" role="tab"
                            aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Profil Saya</h3>
                            </div>
                            <div class="card-body">
                                <h5>Informasi Kontak</h5>
                                <ul class="list-group">
                                    <li class="list-group-item">Nama :{{ $user->nama }}</li>
                                    <li class="list-group-item">Email :{{ $user->email }}</li>
                                    <li class="list-group-item">No Hp :{{ $user->nomor_telepon }}</li>
                                    <li class="list-group-item">Alamat :{{ $user->alamat }}</li>
                                    <li class="list-group-item">Jenis Kelamin :{{ $user->jenis_kelamin }}</li>
                                    <li class="list-group-item">Tanggal Lahir :{{ $user->tanggal_lahir }}</li>
                                    <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-success w-25 mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal1">
                                        Ubah Password
                                    </button>
                                </ul>
                                <hr>
                            </div>
                            @auth
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn btn-primary ml-3" type="submit" name="submit">Logout</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                                    value="" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" required>
                            </div>

                            <div class="mb-3">
                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">...</div>
                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab"
                    tabindex="0">...</div>
            </div>
        </div>
    </div>
    </div>
    <script>
        //ubah form data user
        function ubahProfile() {
            var formData = $('#ubahProfileForm').serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/profile/ubah-admin',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    // Tambahkan logika atau notifikasi ke pengguna di sini
                },
                error: function(error) {
                    alert(response.message)
                    // Tambahkan logika atau notifikasi ke pengguna di sini
                }
            });
        }

        //ubah password
        function ubahPassword() {
            var formData = $('#ubahPasswordForm').serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/profile/ubah-password-admin',
                data: formData,
                success: function(response) {
                    alert(response.message);
                    // Tambahkan logika atau notifikasi ke pengguna di sini
                },
                error: function(jqXHR, textStatus, errorThrown) {
            // Perbaikan: Gunakan jqXHR.responseText untuk mendapatkan pesan kesalahan dari server
            alert(JSON.parse(jqXHR.responseText).message);
            // Tambahkan logika atau notifikasi ke pengguna di sini
        }
            });
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
