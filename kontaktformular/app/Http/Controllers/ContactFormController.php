<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{

    /**
     * Opens view for creating a new contact form.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('contactForms.create', compact('categories'));
    }

    /**
     * Stores a new contact form in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'subject' => 'required',
            'message' => ['required', 'string', 'min:100'],
            'category_id' => 'required',
        ]);

        $contactForm = auth()->user()->contactForms()->create($request->all());

        return redirect()->route('dashboard')->with('success', 'Contact form created successfully.');
    }
}
