@include('components.cdn')
<style>
    .row {
        justify-content: center;
        padding: 200px;
    }
</style>
<body>
<div class="container">
<div class="row">
<div class="col-sm-3 text-center">
    <form method="POST" action="post-login">
        <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-secondary" value="Login">
            @csrf
        </div>
    </form>

</div>
</div>
</div>
</body>

</html>
