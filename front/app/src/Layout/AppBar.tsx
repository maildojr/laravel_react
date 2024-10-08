import React from 'react';
import { AppBar, Toolbar, Typography, Button, Switch } from '@mui/material';
import { Link } from 'react-router-dom';
import ThemeToggle from './ThemeToggle';

const AppAppBar = () => {
  return (
    <AppBar position="static">
      <Toolbar sx={{ padding: 0 }}>
        <Typography variant="h6" sx={{ flexGrow: 1 }}>
          Movies & TV Shows 
        </Typography>
        <Button color="inherit" component={Link} to="/movies">Movies</Button>
        <Button color="inherit" component={Link} to="/tvshows">TV Shows</Button>
        <ThemeToggle />
      </Toolbar>
    </AppBar>
  );
};

export default AppAppBar;
