import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, HashRouter, Route, Router, Routes } from 'react-router-dom';
import Nav from './Components/Nav';
import Task from './Employee/Components/Task';
import Home from './Employee/Home';

const MainRouter = () => {
     return (
          <HashRouter>
               <Nav/>
               <Routes>
                    <Route path="/" element={<Home />}/>
                    <Route path="/task" element={<Task />}/>
               </Routes>
          </HashRouter>
     )
}

createRoot(document.getElementById('root')).render(<MainRouter/>);