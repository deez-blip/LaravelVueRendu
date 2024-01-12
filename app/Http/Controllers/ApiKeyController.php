<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = ApiKey::where('user_id', auth()->id())->get();
        return Inertia::render('ApiKey/Index', [
            'apikeys' => $apiKeys,
        ]);
    }

    public function create()
    {
        return Inertia::render('ApiKey/Create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => ['required', 'string','max:255'],
        ]);

        $uuid = Str::uuid();
        ApiKey::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'key' => $uuid,
            'uuid' => $uuid,
        ]);

        return redirect()->route('apikeys.index');
    }

    public function destroy(ApiKey $apikey)
    {
        $apikey->delete();

        return redirect()->route('apikeys.index');
    }
}
