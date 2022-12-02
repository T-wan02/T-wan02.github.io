import axios from "axios";
import React, { useEffect } from "react";
import { HashRouter, Route, Routes } from "react-router-dom";
import Nav from "../Components/Nav";

const Home = () => {
    function fetchData() {
        // axios.get('/')
    }

    useEffect(() => {
        fetchData();
    }, []);

    return <Nav />;
};

export default Home;
