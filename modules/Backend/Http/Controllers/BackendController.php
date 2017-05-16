<?php namespace Modules\Backend\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class BackendController extends Controller {
	
	public function index()
	{
        return backendView('index');
	}
	
}