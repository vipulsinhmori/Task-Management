<?php
namespace App\Http\Controllers;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function index()
    {
        return view('admin.auth.meta');
    }
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'meta_title' => 'required',
            'discription' => 'required'
        ]);
        $meta = new Meta();
        $meta->page_name = $request->input('page_name');
        $meta->meta_title = $request->input('meta_title');
        $meta->discription = strip_tags($request->input('discription')); 
        $meta->save();
        return redirect()->back()->with('success', 'Meta data stored successfully.');
    }
}
