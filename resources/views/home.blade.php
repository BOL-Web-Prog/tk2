@extends('app')
@section('content')
@auth
<!-- <p>Welcome <b>{{ Auth::user()->name }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a> -->
<div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>{{$data['registered_user']}}</h3>
<p>Registered Users</p>
</div>
<div class="icon">
<i class="fas fa-user"></i>
</div>
<a href="{{route('userList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
<h3>{{$data['registered_product']}}<sup style="font-size: 20px"></sup></h3>
<p>Registered Product</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="{{route('productList')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
@endauth
@endsection


@guest
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
<b>Team #4</b>
<p>Product Management</p>
</div>
@if(session('success'))
    <h1>{{session('success')}}</h1>
@endif
<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Sign in to start your session</p>
@if ($errors->has('salah'))
<span class="text-danger">{{ $errors->first('salah') }}</span>
@endif
@if(session('success'))
<span class="text-danger">{{ session('success') }}</span>
@endif
<form action="{{route('login.action')}}" method="post">
@csrf <!-- {{ csrf_field() }} -->
<div class="input-group mb-3">
<input type="email" class="form-control" placeholder="Email" name="email">
@if ($errors->has('email'))
<span class="text-danger">{{ $errors->first('email') }}</span>
@endif
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" placeholder="Password" name="password">
@if ($errors->has('password'))
<span class="text-danger">{{ $errors->first('password') }}</span>
@endif
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">

</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Sign In</button>
</div>

</div>
</form>
<p class="mb-1">
<a href="{{ route('register') }}">Register Account</a>
</p>
<p class="mb-1">
<a href="#" data-toggle="modal" data-target="#modal-team">Lihat Anggota Team</a>
</p>
</div>
</div>


<div class="modal fade" id="modal-team" style="display: none;" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Anggota Team 4</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<img src="{{ URL::asset('Team4ProgrammingWeb.jpg')}}" alt="Italian Trulli">
</div>
<div class="modal-footer justify-content-between">
</div>
</div>
</div>
</div>
<script src="{{ URL::asset('plugins/jquery/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
<script src="{{ URL::asset('dist/js/adminlte.min.js?v=3.2.0'); }}"></script>


</body></html>
@endguest
