import React from 'react';
import { Switch } from '@mui/material';
import { useTheme } from '@mui/material/styles';

const ThemeToggle = () => {
  const theme = useTheme();
  const [isDarkMode, setIsDarkMode] = React.useState(false);

  const toggleTheme = () => {
    setIsDarkMode(prev => !prev);
    // Optionally handle theme switching logic here
  };

  return (
    <Switch
      checked={isDarkMode}
      onChange={toggleTheme}
      color="default"
      inputProps={{ 'aria-label': 'toggle theme' }}
    />
  );
};

export default ThemeToggle;
