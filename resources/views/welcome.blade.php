@extends("./layout/layout")

@section("content")
    
    <div class="home">
        <h1>User Registration</h1>
        <h4>
            @if (Session::has("msg"))
                {{session("msg")}}
            @endif
        </h4>

        <form action="{{route("RegisterUser")}}" method="post">
            @csrf
            <label for="">First Name</label>
            <input type="text" placeholder="Enter your first name" name="firstname" value="{{old("firstname")}}">
            <span>
                @error("firstname")
                    This field cannot be empty
                @enderror
            </span>
            
            <label for="">Last Name</label>
            <input type="text" placeholder="Enter your last name" name="lastname" value="{{old("lastname")}}">
            <span>
                @error("lastname")
                    This field cannot be empty
                @enderror
            </span>
            
            <label for="">Email Address</label>
            <input type="email" placeholder="Enter your Email Address" name="email" value="{{old("email")}}">
            <span>
                @error("email")
                    {{$message}}
                @enderror
            </span>

            <label for="">Password</label>
            <input type="password" placeholder="Enter your Password" name="password" value="{{old("password")}}">
            <span>
                @error("password")
                    {{$message}}
                @enderror
            </span>

            <button name="register">Register</button>

             <p>Already a user <a href="{{route("login")}}">Login in.</a></p>
        </form>

    </div>

@endsection

