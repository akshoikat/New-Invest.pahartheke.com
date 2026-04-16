<x-guest-layout>
    {{-- Session Status --}}
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email Address --}}
        <div class="mb-3">
            <label for="email" class="form-label fw-medium" style="font-size:12px;color:#475569;font-family:'Poppins',sans-serif;">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="you@example.com"
                class="form-control form-control-sm @error('email') is-invalid @enderror"
                style="font-family:'Poppins',sans-serif;font-size:13px;padding:10px 13px;border-radius:9px;border:1.5px solid #e2e8f0;background:#f8fafc;"
                onfocus="this.style.borderColor='#1B5115';this.style.boxShadow='0 0 0 3px rgba(27,81,21,0.10)';this.style.background='#fff';"
                onblur="this.style.borderColor='#e2e8f0';this.style.boxShadow='none';this.style.background='#f8fafc';"
            />
            @error('email')
                <div class="invalid-feedback" style="font-size:11px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label for="password" class="form-label fw-medium" style="font-size:12px;color:#475569;font-family:'Poppins',sans-serif;">
                {{ __('Password') }}
            </label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="form-control form-control-sm @error('password') is-invalid @enderror"
                style="font-family:'Poppins',sans-serif;font-size:13px;padding:10px 13px;border-radius:9px;border:1.5px solid #e2e8f0;background:#f8fafc;"
                onfocus="this.style.borderColor='#1B5115';this.style.boxShadow='0 0 0 3px rgba(27,81,21,0.10)';this.style.background='#fff';"
                onblur="this.style.borderColor='#e2e8f0';this.style.boxShadow='none';this.style.background='#f8fafc';"
            />
            @error('password')
                <div class="invalid-feedback" style="font-size:11px;">{{ $message }}</div>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="mb-4">
            <div class="form-check">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="form-check-input"
                    style="accent-color:#1B5115;width:15px;height:15px;cursor:pointer;border-radius:4px;"
                >
                <label for="remember_me" class="form-check-label" style="font-size:12px;color:#64748b;font-family:'Poppins',sans-serif;cursor:pointer;">
                    {{ __('Remember me') }}
                </label>
            </div>
        </div>

        {{-- Actions --}}
        <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap">
            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}"
                    class="text-decoration-underline"
                    style="font-size:12px;color:#1B5115;font-family:'Poppins',sans-serif;transition:color 0.2s;"
                    onmouseover="this.style.color='#475569'"
                    onmouseout="this.style.color='#1B5115'"
                >
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button
                type="submit"
                class="btn fw-semibold"
                style="
                    background-color:#1B5115;
                    color:#fff;
                    font-family:'Poppins',sans-serif;
                    font-size:13px;
                    padding:10px 28px;
                    border-radius:9px;
                    border:none;
                    letter-spacing:0.3px;
                    transition:background-color 0.22s, color 0.22s, transform 0.12s;
                "
                onmouseover="this.style.backgroundColor='#FACC15';this.style.color='#1B5115';"
                onmouseout="this.style.backgroundColor='#1B5115';this.style.color='#fff';"
                onmousedown="this.style.transform='scale(0.97)'"
                onmouseup="this.style.transform='scale(1)'"
            >
                {{ __('Log in') }} &rarr;
            </button>
        </div>

    </form>
</x-guest-layout>