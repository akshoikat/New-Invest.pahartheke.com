<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Diphylleia&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --brand-green:      #1B5115;
            --brand-green-dark: #0f2d0c;
            --brand-green-mid:  #256b1a;
            --brand-yellow:     #FACC15;
            --font-display:     'Diphylleia', serif;
            --font-body:        'Poppins', sans-serif;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: var(--font-body);
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #1B5115 0%, #256b1a 30%, #4a9416 62%, #FACC15 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            position: relative;
            overflow-x: hidden;
        }

        /* Decorative bg orbs */
        body::before {
            content: '';
            position: fixed;
            top: -130px; left: -130px;
            width: 420px; height: 420px;
            border-radius: 50%;
            background: rgba(250,204,21,0.10);
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -110px; right: -110px;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: rgba(0,0,0,0.12);
            pointer-events: none;
            z-index: 0;
        }

        /* Outer glass wrapper */
        .outer-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 920px;
            background: rgba(255,255,255,0.13);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.26);
            border-radius: 28px;
            padding: 14px;
            display: flex;
            gap: 14px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.32), inset 0 0 0 1px rgba(255,255,255,0.08);
        }

        /* LEFT INNER PANEL */
        .left-panel {
            flex: 1.05;
            min-width: 0;
            border-radius: 18px;
            background: linear-gradient(155deg, var(--brand-green-dark) 0%, var(--brand-green) 50%, var(--brand-green-mid) 100%);
            border: 1px solid rgba(255,255,255,0.12);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 50px 28px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: -70px; left: -70px;
            width: 250px; height: 250px;
            border-radius: 50%;
            background: rgba(250,204,21,0.07);
        }
        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -90px; right: -90px;
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .left-inner { position: relative; z-index: 2; width: 100%; }

        .illus-ring {
            width: 150px; height: 150px;
            margin: 0 auto 24px;
            border-radius: 50%;
            border: 2px solid rgba(250,204,21,0.40);
            background: rgba(255,255,255,0.06);
            display: flex; align-items: center; justify-content: center;
            padding: 12px;
        }

        .brand-title {
            font-family: var(--font-display);
            font-size: 2.1rem;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 6px;
        }
        .brand-tagline {
            font-size: 12.5px;
            color: rgba(255,255,255,0.60);
            letter-spacing: 0.4px;
            margin-bottom: 30px;
        }

        .feat-pill {
            background: rgba(255,255,255,0.09);
            border: 1px solid rgba(255,255,255,0.16);
            border-radius: 30px;
            padding: 8px 16px;
            display: flex; align-items: center; gap: 10px;
            font-size: 12px;
            color: rgba(255,255,255,0.83);
            margin-bottom: 10px;
        }
        .feat-dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--brand-yellow);
            flex-shrink: 0;
        }

        /* RIGHT INNER PANEL */
        .right-panel {
            flex: 1;
            min-width: 0;
            border-radius: 18px;
            background: #ffffff;
            border: 1px solid rgba(255,255,255,0.65);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(27,81,21,0.10);
        }

        .form-section { padding: 38px 32px 24px; flex: 1; }

        .login-heading {
            font-family: var(--font-display);
            color: var(--brand-green);
            font-size: 1.85rem;
            margin-bottom: 4px;
            line-height: 1.2;
        }
        .login-sub {
            font-size: 12px;
            color: #94a3b8;
            margin-bottom: 26px;
        }

        /* Watermark bar */
        .watermark-bar {
            background: linear-gradient(90deg, var(--brand-green) 0%, var(--brand-green-mid) 55%, var(--brand-yellow) 100%);
            padding: 10px 20px;
            text-align: center;
        }
        .watermark-bar p {
            font-size: 11px;
            color: rgba(255,255,255,0.88);
            margin: 0;
            letter-spacing: 0.3px;
        }
        .watermark-bar strong {
            font-family: var(--font-display);
            color: var(--brand-yellow);
            font-size: 12.5px;
        }

        /* ----------- RESPONSIVE ----------- */
        @media (max-width: 767px) {
            .outer-card {
                flex-direction: column;
                padding: 10px;
                gap: 10px;
                border-radius: 22px;
                max-width: 460px;
            }
            .left-panel { padding: 32px 18px; border-radius: 14px; }
            .illus-ring { width: 110px; height: 110px; margin-bottom: 16px; }
            .brand-title { font-size: 1.7rem; }
            .right-panel { border-radius: 14px; }
            .form-section { padding: 26px 22px 18px; }
        }
        @media (max-width: 420px) {
            body { padding: 16px 10px; }
            .form-section { padding: 20px 16px 14px; }
            body::before, body::after { display: none; }
        }
    </style>
</head>

<body>
    <div class="outer-card">

        {{-- ===== LEFT PANEL ===== --}}
        <div class="left-panel">
            <div class="left-inner">

                <div class="illus-ring">
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">
                        <circle cx="60" cy="60" r="52" fill="rgba(255,255,255,0.06)"/>
                        <circle cx="60" cy="60" r="38" fill="rgba(255,255,255,0.09)"/>
                        <path d="M60 20C60 20 34 40 34 63C34 78 45.5 90 60 90C74.5 90 86 78 86 63C86 40 60 20 60 20Z" fill="rgba(255,255,255,0.18)"/>
                        <path d="M60 34C60 34 44 51 44 65C44 75 51 82 60 82C69 82 76 75 76 65C76 51 60 34 60 34Z" fill="rgba(255,255,255,0.45)"/>
                        <circle cx="60" cy="65" r="11" fill="#ffffff"/>
                        <circle cx="60" cy="65" r="5" fill="#FACC15"/>
                        <path d="M60 76 Q57 90 50 98" stroke="rgba(255,255,255,0.42)" stroke-width="2" stroke-linecap="round" fill="none"/>
                        <path d="M42 54 Q60 16 78 54" stroke="rgba(250,204,21,0.32)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        <path d="M34 65 Q60 10 86 65" stroke="rgba(255,255,255,0.12)" stroke-width="1" fill="none" stroke-linecap="round"/>
                    </svg>
                </div>

                <div class="brand-title">{{ config('app.name', 'GreenLeaf') }}</div>
                <div class="brand-tagline">Grow smarter. Manage better.</div>

                <div style="max-width:210px;margin:0 auto;">
                    <div class="feat-pill"><span class="feat-dot"></span> Secure &amp; Fast Access</div>
                    <div class="feat-pill"><span class="feat-dot"></span> Real-time Dashboard</div>
                    <div class="feat-pill"><span class="feat-dot"></span> Smart Management</div>
                </div>

            </div>
        </div>
        {{-- END LEFT PANEL --}}

        {{-- ===== RIGHT PANEL ===== --}}
        <div class="right-panel">
            <div class="form-section">
                <div class="login-heading">Welcome Back</div>
                <p class="login-sub">Sign in to your account to continue</p>

                {{-- SLOT: form content goes here --}}
                {{ $slot }}
            </div>

            <div class="watermark-bar">
                <p>Powered by <strong>{{ config('app.name', 'GreenLeaf') }}</strong> &bull; &copy; {{ date('Y') }} All rights reserved</p>
            </div>
        </div>
        {{-- END RIGHT PANEL --}}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>