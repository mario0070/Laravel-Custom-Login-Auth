@extends("./layout/layout")

@section("content")

    <div class="home">
        <h1>User Login</h1>
        <h4 id="msg">
            @if (Session::has("msg"))
                {{session("msg")}}
            @endif
        </h4>
        <div class="msg">
            <h5>
                @if (Session::has("RegisterMsg"))
                    {{session("RegisterMsg")}}
                @endif
            </h5>
        </div>
        <form action="{{route("LoginUser")}}" method="post">
            @csrf

            <label for="">Email Address</label>
            <input type="email" placeholder="Enter your Email Address" name="email" value="{{old("email")}}">
            <span>
                @error("email")
                    {{$message}}
                @enderror
            </span>

            <label for="">Password</label>
            <input type="password" placeholder="Enter your Password" name="password">
            <span>
                @error("password")
                    {{$message}}
                @enderror
            </span>

            <button name="login">Login</button>

            <p>Don't have an Account <a href="{{route("register")}}">Register.</a></p>
        </form>

    </div>

@endsection

