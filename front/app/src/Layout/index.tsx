import React from 'react';
import AppBar from './AppBar';
import Footer from './Footer';
import { Outlet } from 'react-router-dom';

const MainLayout = () => {
  return (
    <div>
      <AppBar />
      <main style={{ padding: '20px' }}>
        <Outlet />
      </main>
      <Footer />
    </div>
  );
};

export default MainLayout;
