<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'permission:permission-list|permission-create|permission-edit|permission-delete',
            ['only'=>['index', 'store']]
        );
        $this->middleware('permission:permission-create',['only'=>['create','store']]);

        $this->middleware('permission:permission-edit',['only'=>['edit','update']]);

        $this->middleware('permission:permission-delete',['only'=>['delete','destroy']]);
    }
}
