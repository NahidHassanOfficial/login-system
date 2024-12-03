<x-master>
    <div class="card shadow-sm w-25 ">
        <img src="{{ asset('ocean.webp') }}" class="card-img-top">
        <div class="card-body w-full p-4">
            <div class="mb-5 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-secondary">Sign In</h4>
                <div class="d-flex gap-2">
                    {{-- style="height: 25px; width:25px; display: flex; align-items: center; justify-content: center;" --}}
                    <i class="fa-brands fa-facebook-f text-secondary p-2 border rounded-circle border-secondary"></i>
                    <i class="fa-brands fa-twitter text-secondary p-2 border rounded-circle border-secondary">
                    </i>

                </div>
            </div>
            <form id="loginForm" method="post" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success w-100 mb-3">Sign In</button>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input bg-success" id="remember">
                        <label class="form-check-label text-success" for="remember">Remember Me</label>
                    </div>
                    <a href="#" class="text-muted text-decoration-none">Forgot Password</a>
                </div>
                <div class="text-center text-muted">
                    Not a member? <a href="#" class="text-success text-decoration-none">Sign Up</a>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</x-master>
