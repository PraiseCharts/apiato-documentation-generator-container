<?php

use Apiato\Containers\Documentation\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get(config('vendor-documentation.types.public.url'), [Controller::class, 'showPublicDocs'])
	->name('public_docs');
