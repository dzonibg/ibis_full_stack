@include('components.cdn')
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="/dashboard">Report</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link">{{auth()->user()->username}}</a>
        </li>
    </ul>
    <form action="/logout" method="GET">
        <button type="submit" class="form-control-sm btn-secondary">Logout</button>
    </form>
</nav>
