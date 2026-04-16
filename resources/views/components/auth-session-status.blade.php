@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'alert mb-3']) }}
        style="
            background:#f0fdf4;
            border:1px solid #bbf7d0;
            border-radius:9px;
            color:#15803d;
            font-size:13px;
            font-family:'Poppins',sans-serif;
            padding:10px 14px;
        "
        role="alert"
    >
        {{ $status }}
    </div>
@endif