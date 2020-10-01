# 🧽 Laravel Clean Architecture

### ✨ What is this repository ?

This repository contains a boilerplate laravel application with fully working authentication that follows the clean architecture model.

------

### 📖 What is Clean Architecture ?

<img src="https://blog.cleancoder.com/uncle-bob/images/2012-08-13-the-clean-architecture/CleanArchitecture.jpg" alt="img" style="zoom: 50%;" />

Each of these architectures produce systems that are:

1. Independent of Frameworks. The architecture does not depend on the existence of some library of feature laden software. This allows you to use such frameworks as tools, rather than having to cram your system into their limited constraints.
2. Testable. The business rules can be tested without the UI, Database, Web Server, or any other external element.
3. Independent of UI. The UI can change easily, without changing the rest of the system. A Web UI could be replaced with a console UI, for example, without changing the business rules.
4. Independent of Database. You can swap out Oracle or SQL Server, for Mongo, BigTable, CouchDB, or something else. Your business rules are not bound to the database.
5. Independent of any external agency. In fact your business rules simply don’t know anything at all about the outside world.

<a href="https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html">Source</a>

-----

### 🤔 Why ?

When someone type the `laravel new MyAmazingApp` command a bunch of folders and files appear in text editor or IDE files browser and without question we start to create new models in models folder, new controllers in controllers folder and so on. Following this approach applications do not scale very well and we end up losing tons of time just search the right file for the right feature we want to work on. If we decide to start using clean architecture model we are going to save a lot of time refactoring our code and others will understand better our intents. 
