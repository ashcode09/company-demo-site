var http = require('http');

var express = require('express');
var h5bp = require('h5bp');

var server = express();
var compression = require('compression');

server.use(h5bp({ root: __dirname + '/public' }));
server.use('/page1', express.static(__dirname + '/page1.html'));
server.use('/page2', express.static(__dirname + '/page2.html'));
server.use('/page3', express.static(__dirname + '/page3.html'));
server.use('/page4', express.static(__dirname + '/page4.html'));

// server.listen(3000);

var port = 5000;
server.listen(process.env.PORT || port);