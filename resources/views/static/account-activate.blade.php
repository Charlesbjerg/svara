@extends('layouts.base')

@section('content')
    <div class="container">
        <main class="main-panel">
            <div class="logo">
                <img src="/logo-wide.png" srcset="/logo-wide@2x.png 2x" alt="Svara Logo"/>
            </div>
            <header class="header-branded">
                <h1 class="title">Activate Account</h1>
                <p>Just pop in your password below and your account will be active!</p>
            </header>
            <form action="/activate/{{ $user->key }}" method="POST">
                @csrf
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required />
                </div>
                <div class="form-item">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmPassword" required />
                </div>
                <button class="btn btn-default">Activate Account</button>
            </form>
        </main>
    </div>
@endsection