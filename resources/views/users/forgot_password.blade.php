<html lang="en"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Forgot Password</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('dist/css/adminlte.min.css?v=3.2.0'); }}">

<script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwRm9yZ290JTIwUGFzc3dvcmQlMjIlMkMlMjJ4JTIyJTNBMC42MDM1MzUwODgzNzUzNjQxJTJDJTIydyUyMiUzQTE5MjAlMkMlMjJoJTIyJTNBMTA4MCUyQyUyMmolMjIlM0E5MjklMkMlMjJlJTIyJTNBMTkyMCUyQyUyMmwlMjIlM0ElMjJodHRwcyUzQSUyRiUyRmFkbWlubHRlLmlvJTJGdGhlbWVzJTJGdjMlMkZwYWdlcyUyRmV4YW1wbGVzJTJGZm9yZ290LXBhc3N3b3JkLmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZhZG1pbmx0ZS5pbyUyRnRoZW1lcyUyRnYzJTJGcGFnZXMlMkZleGFtcGxlcyUyRmxvZ2luLmh0bWwlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTQyMCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q="></script><script nonce="3429f9e0-c8ad-4020-900d-f38e71f09e9e">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="login-page" style="min-height: 332.781px;">
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html"><b>Admin</b>LTE</a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
<form action="recover-password.html" method="post">
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary btn-block">Request new password</button>
</div>

</div>
</form>
<p class="mt-3 mb-1">
<a href="{{route ('users.index')}}">Login</a>
</p>
</div>

</div>
</div>

<script src="{{ URL::asset('plugins/jquery/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
<script src="{{ URL::asset('dist/js/adminlte.min.js?v=3.2.0'); }}"></script>


</body></html>