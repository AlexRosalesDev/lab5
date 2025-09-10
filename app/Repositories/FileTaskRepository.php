<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;

class FileTaskRepository implements TaskRepositoryInterface
{
    private $filePath = 'private/tasks.json';

    public function __construct()
    {
        if (!Storage::exists($this->filePath)) {
            Storage::put($this->filePath, json_encode([]));
        }
    }

    public function all(): array
    {
        $tasks = json_decode(Storage::get($this->filePath), true) ?? [];
        return $tasks;
    }

    public function find(int $id): ?array
    {
        $tasks = $this->all();
        
        foreach ($tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        
        return null;
    }

    public function create(array $data): array
    {
        $tasks = $this->all();
        
        $newId = count($tasks) > 0 ? max(array_column($tasks, 'id')) + 1 : 1;
        
        $newTask = [
            'id' => $newId,
            'title' => $data['title'],
            'completed' => $data['completed'] ?? false
        ];
        
        $tasks[] = $newTask;
        Storage::put($this->filePath, json_encode($tasks));
        
        return $newTask;
    }

    public function update(int $id, array $data): ?array
    {
        $tasks = $this->all();
        $taskIndex = null;
        
        foreach ($tasks as $index => $task) {
            if ($task['id'] == $id) {
                $taskIndex = $index;
                break;
            }
        }
        
        if ($taskIndex === null) {
            return null;
        }
        
        if (isset($data['title'])) {
            $tasks[$taskIndex]['title'] = $data['title'];
        }
        
        if (isset($data['completed'])) {
            $tasks[$taskIndex]['completed'] = $data['completed'];
        }
        
        Storage::put($this->filePath, json_encode($tasks));
        
        return $tasks[$taskIndex];
    }

    public function delete(int $id): bool
    {
        $tasks = $this->all();
        $newTasks = [];
        $deleted = false;
        
        foreach ($tasks as $task) {
            if ($task['id'] != $id) {
                $newTasks[] = $task;
            } else {
                $deleted = true;
            }
        }
        
        if ($deleted) {
            Storage::put($this->filePath, json_encode($newTasks));
        }
        
        return $deleted;
    }
}
