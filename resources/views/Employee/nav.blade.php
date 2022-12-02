<nav class="navbar">
    <div class="container mt-2">
        <a class="navbar-brand" href="{{ url('/employee/task') }}">
            <h3 class="text-black fw-semibold" style="letter-spacing: 1px;">{{ $loginEmployee->name }}</h3>
        </a>
    </div>
</nav>

<ul id="navbar" class="nav navbar-dark flex-column side-nav nav-style navActive">
    <a class="" href="{{ url('/employee/profile/' . auth()->user()->slug) }}">Profile</a>
    <a class="" href="{{ url('/employee/resign') }}">Resign Form</a>
    <a class="" href="{{ url('/employee/task-list') }}">Task</a>
</ul>

<a href="{{ url('/employee/logout') }}" class="logout d-inline-block mt-auto pt-auto"><i
        class="fa-solid fa-right-from-bracket"></i></a>
