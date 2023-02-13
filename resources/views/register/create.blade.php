<x-layout>

<div class="container">
    <div class="row">
    <div class="col-md-5 mx-auto">
    <h3 class="text-primary my-3 text-center">Register Form</h3>
            <div class="card p-4 my-3 shadow-sm">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('name')
                    <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" value="{{old('username')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('username')
                        <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                        
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                       <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')
                        <p class="text-danger my-2">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
    </div>
    </div>
    </div>
</div>
</x-layout>