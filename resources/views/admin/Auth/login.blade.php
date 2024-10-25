
@extends('web.layouts.main')
@section('content')

    <main class="main">
     <section class="login common_gap">
        <div class="container">
            <form class="common_form" action="{{URL::To('admin-login-action')}}" method="POST">
                @csrf
                <div class="text-center mb-4">
                <img src="{{URL::TO('public/assets/images/logo.png')}}" alt="">
                </div>
                <ul>
                    <li>
                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                    </li>
                    <li>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </li>
                    <li>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </li>
                </ul>
            </form>
        </div>
     </section>
    </main>
    @endsection
   