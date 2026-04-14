// Import modules
const express = require("express");
const app = express();
const path = require("path");
const PORT = 3000;
const cors = require("cors");

const { logger } = require("./middleware/logger.js");
const errorHandler = require("./middleware/errorHandler.js");

app.use(express.urlencoded({ extended: false }));
app.use(express.json());
app.use("/assets", express.static(path.join(__dirname, "assets")));
app.use("/data", express.static(path.join(__dirname, "data")));

app.use(logger);

const whiteList = [
  "http://127.0.0.1:5500",
  "http://localhost:3000",
  "https://www.google.com"
];

const corsOptions = {
  origin: (origin, callback) => {
    if (!origin || whiteList.indexOf(origin) !== -1) {
      callback(null, true);
    } else {
      callback(new Error("Not allowed by CORS"));
    }
  },
  optionsSuccessStatus: 200
};

app.use(cors(corsOptions));

app.get(["/", "/index.html"], (req, res) => {
  res.sendFile(path.join(__dirname, "views", "index.html"));
});

app.get("/about.html", (req, res) => {
  res.sendFile(path.join(__dirname, "views", "about.html"));
});

app.get("/user/:userID/book/:bookID", (req, res) => {
  const { userID, bookID } = req.params;
  res.send(`User ID: ${userID}, Book ID: ${bookID}`);
});

app.get("/user/:id", (req, res) => {
  const userId = req.params.id || "No ID Provided";
  res.send(`User ID: ${userId}`);
});

app.get("/old-page", (req, res) => {
  res.redirect(301, "/new-page");
});

app.get("/new-page", (req, res) => {
  res.sendFile(path.join(__dirname, "views", "new-page.html"));
});

// Multiple middleware example
app.get(
  "/multi",
  (req, res, next) => {
    console.log("First handler executed");
    req.data = "Data from first handler";
    next();
  },
  (req, res, next) => {
    console.log("Second handler executed");
    req.data = "Data from second handler";
    next();
  },
  (req, res) => {
    console.log("Third handler executed");
    res.send(`Final response: ${req.data}`);
  }
);

app.get("/error", (req, res, next) => {
  const err = new Error("Intentional test error!");
  next(err); // Pass to error handler
});

app.get("/*splat", (req, res) => {
  res.sendFile(path.join(__dirname, "views", "404.html"));
});

app.use(errorHandler);

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});