const express = require('express');
const app = express();
const path = require('path');

// Import middleware
const errorHandler = require('./middleware/errorHandler');

app.get('/', (req, res) => {
    res.send('Home Page');
});

app.get('/error', (req, res) => {
    throw new Error('This is a test error!');
});

app.use(errorHandler);

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});