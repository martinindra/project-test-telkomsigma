@include('template.header')

<div class="container">
    <div class="text-center mt-5">
        <h1>Registrasi Akun Anda</h1>
        <p>Silahkan isi formulir untuk registrasi akun anda</p>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-start p-3">
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <label for="namaLengkap">Nama Anda :</label>
                            <input type="text" name="namaLengkap" id="namaLengkap" class="form-control mb-2" />
                            <label for="email">Email Anda :</label>
                            <input type="email" name="email" id="email" class="form-control mb-2" />
                            <label for="password">Password Anda :</label>
                            <input type="password" name="password" id="password" class="form-control mb-2" />
                            <button class="btn btn-primary">Register</button>
                        </form>

                        <p class="my-4">Sudah Memilik Akun?
                            <span>
                                <a style="text-decoration: none" href="{{ route('login') }}">
                                    Login Disini!
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
