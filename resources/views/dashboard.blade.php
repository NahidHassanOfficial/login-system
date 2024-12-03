<x-master>
    <div class="card shadow-sm w-25 ">
        <div class="card-body w-full p-4">
            <div class="mb-5 d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-secondary">Create User</h4>
                <div class="d-flex gap-2">

                </div>
            </div>
            <form id="userCreateForm" method="post" action="{{ route('user.create.post') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success w-100 mb-3">Create User</button>
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
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

</x-master>
