<html lang="en"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product Management | Log in</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<style>
.modal-body {
    position: relative;
    
    max-height: 1000px;
    padding: 40px;
}
</style>
<link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.min.css?v=3.2.0'); }}">
<script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwTG9nJTIwaW4lMjIlMkMlMjJ4JTIyJTNBMC41MzM2OTk2NzQ4OTQwOTAxJTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MjklMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRmFkbWlubHRlLmlvJTJGdGhlbWVzJTJGdjMlMkZwYWdlcyUyRmV4YW1wbGVzJTJGbG9naW4uaHRtbCUyMiUyQyUyMnIlMjIlM0ElMjJodHRwcyUzQSUyRiUyRnd3dy5nb29nbGUuY29tJTJGJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS00MjAlMkMlMjJxJTIyJTNBJTVCJTVEJTdE"></script><script nonce="0350c81a-ff91-4e1b-bf90-e09a33570378">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="login-page" style="min-height: 496.781px;">

<div class="login-box">
<div class="login-logo">
<b>Register User</b>
</div>

<div class="card">
<div class="card-body login-card-body">
    
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('register.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label>Tempat Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="birthplace" value="{{ old('birthplace') }}" />
            </div>
            <div class="mb-3">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="birthdate" value="{{ old('birthdate') }}" />
            </div>
            <div class="mb-3">
                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                <p><input type="radio" name="gender" id="" value="Laki-Laki"> Laki-Laki</p>
                <p><input type="radio" name="gender" id="" value="Wanita"> Wanita</p>
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <label>Password Confirmation<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password_confirm" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Register</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
        </form>
    </div>
</div>


<script src="{{ URL::asset('plugins/jquery/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
<script src="{{ URL::asset('dist/js/adminlte.min.js?v=3.2.0'); }}"></script>


</body></html>