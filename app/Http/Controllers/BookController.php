<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\BookFile;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Book::query()->with('category');

        // Apply category filter if provided
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Apply search filter if provided
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                // Use parameter binding for better security
                $term = '%' . $searchTerm . '%';
                $q->where('title', 'LIKE', $term)
                ->orWhere('author', 'LIKE', $term);
            });
        }

        $books = $query->latest()->paginate(5);
        
        // Maintain filters across pagination
        $books->appends($request->only(['search', 'category_id']));
        
        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a book.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('uploads', 'public');
            $data['cover'] = $path;
        }
        
        $book = Book::create($data);

        if ($request->hasFile('pdf_file')) {
            $this->upload_file($request, $book);
        }
        
        return redirect()->route('books.index')
            ->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('cover')) {
            // Delete the old image
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            
            $path = $request->file('cover')->store('uploads', 'public');
            $data['cover'] = $path;
        } else {
            // Keep the existing cover
            unset($data['cover']);
        }
        
        $book->update($data);

        if ($request->hasFile('pdf_file')) {
            $this->upload_file($request, $book);
        }
        
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Delete the book cover
        if ($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }
        
        $book->delete();
        
        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function upload_file(Request $request, Book $book)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf,epub|max:10240',
        ]);

        if ($book->file) {
            Storage::disks('books')->delete($book->file->path);
            $book->file->delete();
        }

        $file = $request->file('pdf_file');
        $filename = $file->getClientOriginalName();
        $path = $file->store('pdfs', 'books');

        BookFile::create([
            'book_id' => $book->id,
            'filename' => $filename,
            'path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ]);

        return redirect()->route('books.show', $book)
            ->with('success', 'File uploaded successfully.');
    }

    public function download(Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($book->file) {
            return Storage::disk('books')->download($book->file->path, $book->file->filename);
        }

        return redirect()->route('books.show', $book)
            ->with('error', 'No file found for this book.');
    }
}
