var http = require('http');

var express = require('express');
var compression = require('compression');

var server = express();
server.use(compression());
server.use(express.static(__dirname + '/'));
server.use('/page1', express.static(__dirname + '/page1.html'));
server.use('/page2', express.static(__dirname + '/page2.html'));
server.use('/page3', express.static(__dirname + '/page3.html'));
server.use('/page4', express.static(__dirname + '/page4.html'));

var port = 5000;
server.listen(process.env.PORT || port);