<?php
// Professional PHP REST API with full CRUD for users
// Supports GET, POST, PUT, PATCH, DELETE
// Data persisted in users.json
// Usage: http://localhost:8000/API.php [?id=N] 
// Run: cd 'c:/Users/pc/Desktop/API' && php -S localhost:8000

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$users_file = 'users.json';
$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Load users from JSON file
function loadUsers($file) {
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    return json_decode($json, true) ?: [];
}

// Save users to JSON file
function saveUsers($users, $file) {
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
}

// Error response
function error($message, $code = 400) {
    http_response_code($code);
    echo json_encode(['error' => $message]);
    exit();
}

$users = loadUsers($users_file);

switch ($method) {
    case 'GET':
        if ($id) {
            $user = null;
            foreach ($users as $u) {
                if ($u['id'] === $id) {
                    $user = $u;
                    break;
                }
            }
            if (!$user) error('User not found', 404);
            echo json_encode(['user' => $user, 'total' => count($users)]);
        } else {
            echo json_encode([
                'users' => $users,
                'total' => count($users),
                'message' => 'Users retrieved successfully'
            ]);
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input || !isset($input['name']) || trim($input['name']) === '') {
            error('Invalid input: name is required');
        }
        $name = trim($input['name']);
        $max_id = $users ? max(array_column($users, 'id')) : 0;
        $new_id = $max_id + 1;
        $new_user = ['id' => $new_id, 'name' => $name];
        $users[] = $new_user;
        saveUsers($users, $users_file);
        http_response_code(201);
        echo json_encode([
            'message' => 'User created successfully',
            'user' => $new_user
        ]);
        break;

    case 'PUT':
        if (!$id) error('ID required for PUT');
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input || !isset($input['name']) || trim($input['name']) === '') {
            error('Invalid input: name is required');
        }
        $name = trim($input['name']);
        $user_idx = -1;
        foreach ($users as $idx => $u) {
            if ($u['id'] === $id) {
                $user_idx = $idx;
                break;
            }
        }
        if ($user_idx === -1) error('User not found', 404);
        $users[$user_idx] = ['id' => $id, 'name' => $name];
        saveUsers($users, $users_file);
        echo json_encode([
            'message' => 'User updated successfully',
            'user' => $users[$user_idx]
        ]);
        break;

    case 'PATCH':
        if (!$id) error('ID required for PATCH');
        $input = json_decode(file_get_contents('php://input'), true);
        if (!$input) error('Invalid JSON input');
        $user_idx = -1;
        foreach ($users as $idx => $u) {
            if ($u['id'] === $id) {
                $user_idx = $idx;
                break;
            }
        }
        if ($user_idx === -1) error('User not found', 404);
        if (isset($input['name'])) {
            $users[$user_idx]['name'] = trim($input['name']);
        }
        // Add more fields if needed
        saveUsers($users, $users_file);
        echo json_encode([
            'message' => 'User partially updated successfully',
            'user' => $users[$user_idx]
        ]);
        break;

    case 'DELETE':
        if (!$id) error('ID required for DELETE');
        $users = array_filter($users, function($u) use ($id) {
            return $u['id'] !== $id;
        });
        $users = array_values($users); // Reindex
        saveUsers($users, $users_file);
        echo json_encode(['message' => 'User deleted successfully']);
        break;

    default:
        error('Method not allowed', 405);
}
?>

