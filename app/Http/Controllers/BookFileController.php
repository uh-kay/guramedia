<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookFileController extends Controller
{
    public function upload(Request $request, Book $book)
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
        $path = file->store('pdfs', 'books');

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
