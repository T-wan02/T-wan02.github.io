import React from "react";
import { BrowserRouter, HashRouter } from "react-router-dom";

const Nav = () => {
    return (
        <div>
            <nav className="navbar">
                <div className="container mt-2">
                    <a className="navbar-brand" href="#">
                        <h3
                            className="text-black fw-semibold"
                            style={{ letterSpacing: "1px" }}
                        >
                            Company Admin
                        </h3>
                    </a>
                </div>
            </nav>
            <ul
                id="navbar"
                className="nav navbar-dark flex-column side-nav nav-style"
            >
                <a id="navbar" aria-current="page" href="/employee/task">
                    Tasks
                </a>
                <a className="active" href="{{ route('employee.index') }}">
                    Employees
                </a>
                <a className href="{{ route('hiring.index') }}">
                    Hiring Job Posters
                </a>
                <a className href="{{ url('/admin/interview') }}">
                    Interview
                </a>
                <a className href="{{ url('/admin/resign') }}">
                    Resign Employees
                </a>
                <a className href="#">
                    Tasks
                </a>
            </ul>
        </div>
    );
};

export default Nav;
