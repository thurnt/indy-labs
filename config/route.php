<?php

use App\Controllers\CalendarController;
use App\Controllers\CommonController;
use App\Controllers\DashboardController;
use App\Controllers\DatabaseController;
use App\Controllers\JobSkillsController;
use App\Controllers\NoteController;
use App\Controllers\ProjectController;
use App\Controllers\TargetController;
use App\Controllers\TodoController;
use App\Core\Router;

// Instantiate the Router
$router = new Router();

// Define routes
$router->get('/', [DashboardController::class, 'index']);
$router->get('/error', [CommonController::class, 'error']);
$router->get('/not-found', [CommonController::class, 'notFound']);

$router->get('/project', [ProjectController::class, 'index']);
$router->get('/project/new', [ProjectController::class, 'addNew']);
$router->post('/project/new', [ProjectController::class, 'create']);
$router->get('/project/edit/:id', [ProjectController::class, 'edit']);
$router->post('/project/edit/:id', [ProjectController::class, 'update']);
$router->get('/project/view/:id', [ProjectController::class, 'view']);
$router->post('/project/delete/:id', [ProjectController::class, 'delete']);

$router->get('/task', [TaskController::class, 'index']);
$router->get('/task/new', [TaskController::class, 'addNew']);
$router->post('/task/new', [TaskController::class, 'create']);
$router->get('/task/edit/:id', [TaskController::class, 'edit']);
$router->post('/task/edit/:id', [TaskController::class, 'update']);
$router->get('/task/view/:id', [TaskController::class, 'view']);
$router->post('/task/delete/:id', [TaskController::class, 'delete']);

$router->get('/calendar', [CalendarController::class, 'index']);
$router->get('/calendar/new', [CalendarController::class, 'addNew']);
$router->get('/todo', [TodoController::class, 'index']);
$router->get('/todo/new', [TodoController::class, 'addNew']);
$router->get('/note', [NoteController::class, 'index']);
$router->get('/note/new', [NoteController::class, 'addNew']);
$router->get('/target', [TargetController::class, 'index']);
$router->get('/target/new', [TargetController::class, 'addNew']);
$router->get('/job-skills', [JobSkillsController::class, 'index']);
$router->get('/job-skills/new', [JobSkillsController::class, 'addNew']);
// $router->get('/about', [AboutController::class, 'index']);
// $router->post('/contact', [ContactController::class, 'store']);
// $router->put('/user/{id}', [UserController::class, 'update']);
// $router->patch('/user/{id}', [UserController::class, 'partialUpdate']);
// $router->delete('/user/{id}', [UserController::class, 'destroy']);


$router->get('/database', [DatabaseController::class, 'index']);
$router->post('/database/refresh', [DatabaseController::class, 'refresh']);

// Dispatch the request
$router->dispatch();
