<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactFormRequest;
use App\Models\Category;
use App\Notifications\ContactFormNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

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
    public function store(StoreContactFormRequest $request): RedirectResponse
    {
        $newForm = auth()->user()->contactForms()->create($request->validated());

        // Store the current timestamp in the session
        $request->session()->put('last_form_submission', now());

        // Logs a message to the application log
        Log::info('A new contact form has been created.');

        // Send notification of new contact form to admin.
        // ToDo: Test environment is currently not able to trigger this.
        // ToDo: Further check which category to notify different admins.
        //Notification::route('mail', 'system@example.com')
        //    ->notify(new ContactFormNotification($newForm));

        return redirect()->route('dashboard')->with('success', 'Contact form created successfully.');
    }
}
