var http = require('http');

var express = require('express');
var h5bp = require('h5bp');

var server = express();
server.use(h5bp({ root: __dirname + '/public' }));
server.use(express.static(__dirname + '/'));
server.use('/page1', express.static(__dirname + '/page1.html'));
server.use('/page2', express.static(__dirname + '/page2.html'));
server.use('/page3', express.static(__dirname + '/page3.html'));
server.use('/page4', express.static(__dirname + '/page4.html'));

var port = 5000;
server.listen(process.env.PORT || port);