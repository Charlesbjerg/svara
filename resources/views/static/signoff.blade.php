@extends('layouts.base')

@section('content')
<div class="container">
    <main class="main-panel">
        <div class="logo">
            <img src="/logo-wide.png" srcset="/logo-wide@2x.png 2x" alt="Svara Logo"/>
        </div>
        <header class="header-branded">
            <h1 class="title">Project Requires Sign-off</h1>
            <p>The {{ $phase }} phase for the project {{ $projectName }}, requires signing off before the project can continue.
                Please read the document below, then sign and submit this form. If you have any questions about your
                project, or what happens next, please direct them to your account manager.</p>
            <p></p>
        </header>
        <section class="message-panel">
            <h2 class="subtitle">{{ $signoff->name }}</h2>
           {!! $signoff->message !!}
        </section>
        <form action="{{ $submitUrl }}" method="POST">
            @csrf
            <div class="form-item">
                <label for="signature">Signature</label>
                <canvas class="js-signature sign-pad"></canvas>
                <input type="hidden" name="signature" id="signature"/>
            </div>
            <div class="form-item">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required/>
            </div>
            <button class="btn btn-default">Sign-off Project Phase</button>
        </form>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    (function () {
        // Signature pad setup
        const canvas = document.querySelector(".js-signature");
        const signaturePad = new SignaturePad(canvas);

        // Form submit event
        const form = document.querySelector('form');
        form.addEventListener('submit', (e) => {
            document.getElementById('signature').value = signaturePad.toDataURL();
        });

        // Resize canvas fix
        function resizeCanvas() {
            var ratio =  Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); // otherwise isEmpty() might return incorrect value
        }
        window.addEventListener("resize", resizeCanvas);
        resizeCanvas();
    })();
</script>
@endsection