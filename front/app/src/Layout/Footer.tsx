import React from 'react';
import { Typography, Container } from '@mui/material';

const Footer = () => {
  return (
    <footer style={{ padding: '20px 0', textAlign: 'center' }}>
      <Container>
        <Typography variant="body2" color="textSecondary">
          © 2024 Movies. All rights reserved.
        </Typography>
      </Container>
    </footer>
  );
};

export default Footer;
