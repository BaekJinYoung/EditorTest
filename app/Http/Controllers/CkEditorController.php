<?php

namespace App\Http\Controllers;

use App\Models\CkEditor;
use Illuminate\Http\Request;

class CkEditorController extends Controller
{
    public function __construct(CkEditor $ckEditor)
    {
        parent::__construct($ckEditor);
    }
}
