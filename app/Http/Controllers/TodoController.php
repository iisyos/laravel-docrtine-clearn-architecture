<?php

namespace App\Http\Controllers;

use App\Doctrine\ORM\Entity\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function index()
    {
        $todos = $this->em->getRepository(Todo::class)->findAll();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // $todo = new Todo($request->input('title'));
        // $this->em->persist($todo);
        // $this->em->flush();
        $todo = new Todo($request->input('title'));
        $this->em->persist($todo);
        $this->em->flush();

        return redirect()->route('todos.index');
    }

    public function destroy(int $id)
    {
        $todo = $this->em->find(Todo::class, $id);

        if ($todo) {
            $this->em->remove($todo);
            $this->em->flush();
        }

        return redirect()->route('todos.index');
    }
}
