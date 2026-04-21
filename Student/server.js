const express = require('express');
const connectDB = require('./dbConfig');
require('dotenv').config();

const app = express();


app.use(express.json());

connectDB();
app.use('/students', require('./routes/studentRoutes'));

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`Server running on port ${PORT}`));