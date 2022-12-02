<nav class="navbar bg-primary">
    <div class="container mt-2">
        <a class="navbar-brand bg-primary" href="#">
            <h3 class="text-white fw-semibold" style="letter-spacing: 1px;">Company Admin</h3>
        </a>
    </div>
</nav>

<ul id="navbar" class="nav navbar-dark flex-column side-nav nav-style navActive">
    <a id="" aria-current="page" href="{{ route('company.index') }}" class="text-dark"><i
            class="fa-solid fa-building"></i>
        Company</a>
    <a class="text-dark" href="{{ route('employee.index') }}"><i class="fa-solid fa-users"></i> Employees</a>
    <a class="text-dark" href="{{ route('hiring.index') }}"><i class="fa-solid fa-address-card"></i> Hiring
        Job
        Posters</a>
    <a class="text-dark" href="{{ url('/admin/interview') }}"><i class="fa-solid fa-message"></i>
        Interview</a>
    <a class="text-dark" href="{{ url('/admin/resign') }}"><i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i>
        Resign
        Employees</a>
    <a class="text-dark" href="{{ url('/admin/task') }}"><i class="fa-solid fa-list-check"></i> Tasks</a>
</ul>

<a href="{{ url('/admin/logout') }}" class="logout d-inline-block mt-auto pt-auto"><i
        class="fa-solid fa-right-from-bracket"></i></a>
