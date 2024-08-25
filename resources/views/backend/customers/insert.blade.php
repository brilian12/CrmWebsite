<x-component.backend.layouts>
    <div class="container-fluid">
        <h3 class="text-dark mb-1"></h3>
        <div class="row register-form">
            <div class="col-md-8 offset-md-2">
                <form action="/backend/addcust" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <a class="text-decoration-none" href="{{ url('/backend/dashboard') }}">
                        <i class="fas fa-arrow-left fs-4 d-lg-flex justify-content-lg-start"></i>
                    </a>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Handphone</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Nomor Handphone" name="no_hp">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="togglePassword()">
                                <i class="fas fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </div>
    {{-- @endsection --}}
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('exampleInputPassword1');
        const toggleIcon = document.getElementById('togglePasswordIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>
</x-component.backend.layouts>
