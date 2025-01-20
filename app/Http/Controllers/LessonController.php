<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
{
    /**
     * Menampilkan daftar pelajaran.
     */
    public function index()
    {
        $lessons = Lesson::all(); // Mengambil semua pelajaran dari database
        return view('lessons.index', compact('lessons')); // Mengembalikan view dengan data pelajaran
    }

    /**
     * Menampilkan form untuk membuat pelajaran baru.
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Menyimpan pelajaran baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'youtube_link' => 'required|url',
            'description' => 'nullable',
        ]);

        // Membuat pelajaran baru
        Lesson::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('lessons.index')
                         ->with('success', 'Pelajaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pelajaran.
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    /**
     * Menampilkan form untuk mengedit pelajaran.
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Memperbarui pelajaran di database.
     */
    public function update(Request $request, Lesson $lesson)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'youtube_link' => 'required|url',
            'description' => 'nullable',
        ]);

        // Memperbarui pelajaran
        $lesson->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('lessons.index')
                         ->with('success', 'Pelajaran berhasil diperbarui.');
    }

    /**
     * Menghapus pelajaran dari database.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('lessons.index')
                         ->with('success', 'Pelajaran berhasil dihapus.');
    }
}
