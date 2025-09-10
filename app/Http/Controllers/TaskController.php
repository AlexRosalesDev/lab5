<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->all();
        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = $this->taskRepository->find($id);
        
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        
        return response()->json($task);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'completed' => 'boolean'
        ]);
        
        $task = $this->taskRepository->create($validated);
        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'completed' => 'sometimes|boolean'
        ]);
        
        $task = $this->taskRepository->update($id, $validated);
        
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        
        return response()->json($task);
    }

    public function destroy($id)
    {
        $deleted = $this->taskRepository->delete($id);
        
        if (!$deleted) {
            return response()->json(['error' => 'Task not found'], 404);
        }
        
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
