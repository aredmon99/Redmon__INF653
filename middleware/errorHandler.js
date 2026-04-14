const fs = require("fs");
const path = require("path");

const errorHandler = (err, req, res, next) => {
  const logMessage = `
[${new Date().toISOString()}]
ERROR NAME: ${err.name}
MESSAGE: ${err.message}
----------------------------------------
`;

  const logPath = path.join(__dirname, "..", "logs", "errorLog.txt");

  fs.appendFile(logPath, logMessage, (error) => {
    if (error) {
      console.error("Error writing to log file:", error);
    }
  });

  res.status(500).json({
    error: "Something went wrong on the server."
  });
};

module.exports = errorHandler;