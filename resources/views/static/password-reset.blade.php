@extends('layouts.base')

@section('content')
    <div class="container">
        <main class="main-panel">
            <div class="logo">
                <img src="/logo-wide.png" srcset="/logo-wide@2x.png 2x" alt="Svara Logo"/>
            </div>
            <header class="header-branded">
                <h1 class="title">Reset Password</h1>
            </header>
            <form action="/reset-password" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}" />
                <input type="hidden" name="email" value="{{ $request->input('email') }}" />
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required />
                </div>
                <div class="form-item">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmPassword" required />
                </div>
                <button class="btn btn-default">Reset Password</button>
            </form>
        </main>
    </div>
@endsection