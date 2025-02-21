<?php

namespace App\Http\Controllers;

use App\Actions\ContactRequestActions;
use App\Actions\CategoryActions;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    public function getContactsPage() {
        return view('contact',
        ['categories_info' => CategoryActions::getAllCategories()],
    );
    }

    public function sendContacts(Request $request, ContactRequestActions $actions)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'string|max:20',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $actions->safeInfoFromContacts($validatedData);

        return redirect()
            ->route('home')
            ->with('success', 'Message sent successfully!');
    }

}
