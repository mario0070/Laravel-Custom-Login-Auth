@extends("./layout/layout")

@section("content")
    
    <div class="dashboard">
        <h1>Dashboard</h1>
        <h5 id="msg">
            @if (Session::has("LoginMsg"))
                {{session("LoginMsg")}}
            @endif
        </h5>
        @foreach ($user as $users)
            <p>welcome to your dashboard <strong>{{$users->firstname}}</strong> </p>
        @endforeach
        
        <a href="{{route("logout")}}">LogOut</a>
    </div>

@endsection

