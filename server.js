var http = require('http');

var express = require('express');

var server = express();
server.use(express.static(__dirname + '/public'));
server.use('/page1', express.static(__dirname + '/public/page1.html'));
server.use('/page2', express.static(__dirname + '/public/page2.html'));
server.use('/page3', express.static(__dirname + '/public/page3.html'));
server.use('/page4', express.static(__dirname + '/public/page4.html'));

var port = 5000;
server.listen(process.env.PORT || port);