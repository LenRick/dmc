<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ContactForm') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Add Contact Form here -->
                @if(session('last_form_submission') && session('last_form_submission')->gt(now()->subMinutes(5)))
                    <div class="alert alert-info">
                        You have already submitted the form within the last 5 minutes.
                    </div>
                @else
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary p-2 bg-gray-200 rounded">Submit</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

