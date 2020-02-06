 <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <div class="container">
 <form action="{{url('post-registration')}}" method="POST">
     {{ csrf_field() }}
     <div class="form-label-group">
         <input type="text" id="inputName" name="username" class="form-control" placeholder="Full name" autofocus>
         <label for="inputName">Name</label>
     </div>

     <div class="form-label-group">
         <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
         <label for="inputPassword">Password</label>
     </div>
    <div>
     <button class="btn btn-secondary" type="submit">Register</button>
     <a class="small" href="{{url('login')}}">Sign In</a>
     </div>
 </form>
 </div>

