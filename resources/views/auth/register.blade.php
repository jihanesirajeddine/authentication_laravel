<x-layout>
    
<div class="d-flex justify-content-center">
    <form class="row g-3" style="max-width: 600px;" action="{{ route('store.register') }}" method="post">
        @csrf
        <h1>Register</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" minlength="8" required>
        </div>
        <div class="col-12">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="8" required>
        </div>
        <div class="col-12">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="conditions" required>
            <label class="form-check-label" for="conditions">
                Agree to terms and conditions
            </label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-dark" type="submit">Register</button>
            <a class="btn btn-outline-dark" type="submit" href="{{ route('show.login') }}">Login</a>
        </div>
    </form>
</div>

</x-layout>