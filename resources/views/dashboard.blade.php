@include('components.cdn')
<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" href="dashboard">Report</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link">{{auth()->user()->username}}</a>
        </li>
    </ul>
    <form action="logout" method="GET">
        <button type="submit" class="form-control-sm btn-secondary">Logout</button>
    </form>
</nav>

<!-- CONTENT -->



<p></p>
<div class="container-box">
    <form class="form-inline" method="POST" action="/mac/show">
        <div class="form-group">
            <input type="text" name="contract_id" id="contract_id" autocomplete="off" class="form-control form-control-sm" data-toggle="dropdown" placeholder="Contract ID" />
            <div id="contractList" class="dropdown-menu">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="mac" id="mac" autocomplete="off" class="form-control form-control-sm" data-toggle="dropdown" placeholder="Mac address" />
            <div id="macList" class="dropdown-menu">
            </div>
        </div>
        @csrf
        <input type="submit" class="form-control btn-secondary form-control-sm" type="submit" value="Apply filters">
    </form>
</div>

@include('components.autocomplete')
