<?php
class TodoManager {
    private string $file;
    private array $todos = [];

    public function __construct(string $file) {
        $this->file = $file;
        if (file_exists($file)) {
            $json = file_get_contents($file);
            $this->todos = json_decode($json, true) ?? [];
        }
    }

    public function getTodos(): array {
        return $this->todos;
    }

    public function add(string $task): void {
        $this->todos[] = [
            'id' => uniqid(),
            'task' => $task,
            'done' => false
        ];
        $this->save();
    }

    public function toggle(string $id): void {
        foreach ($this->todos as &$todo) {
            if ($todo['id'] === $id) {
                $todo['done'] = !$todo['done'];
                break;
            }
        }
        $this->save();
    }

    public function delete(string $id): void {
        $this->todos = array_filter($this->todos, fn($t) => $t['id'] !== $id);
        $this->save();
    }

    private function save(): void {
        file_put_contents($this->file, json_encode($this->todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}
