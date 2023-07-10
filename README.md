# HttPHP
a simple and tiny HTTP framework for php

The framework is consisted of these parts and features:

## Front-end Controller
This simple framework implements <b><i>Front-end Controller</i></b> pattern like most famous frameworks by having single index.php file that all requests can touch nothing but this file.

## HTTP Kernel
Inside the body of index.php, it instantiates 
a kernel in a singleton way to access its <b><i>handle</i></b> method
which in this case accepts a request and delivers a response

## Request
provides an easy-to-follow, object-oriented layer on top of request

## Response
provides an intuitive object-oriented way for interacting with the actual response being delivered and sent to client

## Routing & Controllers
handles routing in a fast manner powered by FastRoute.
It also includes controllers and the actual route is being dispatched to the chosen method of the controller.

... I may continue developing this tiny framework. 

`
This project is made for fun, and It's NOT suitable for production.
`
## Credits
inside this project the HTTP Foundation by Symfony is being used. for developing I used var-dumper by Symfony which is hugely useful in debugging. 
And also for routing, FastRoute by N.Popov is the actual routing engine under the hood.

*&copy; Mohammad Mahdi Taheri - July 2023*


