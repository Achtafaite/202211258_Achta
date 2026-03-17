<?php
// admin/dashboard.php (moved to root)
// This page is the admin dashboard where courses can be viewed and deleted

require_once __DIR__ . '/config/database.php'; 
// Include the database configuration file that contains the Database class (also starts session)


// Check if user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // If the user is NOT logged in OR the role is not "admin"

    header("Location: Login.php");
    // Redirect the user to the login page

    exit();
    // Stop the script from running further
}

$database = new Database(); 
// Create an object of the Database class

$db = $database->getConnection(); 
// Call the method getConnection() to connect to the database

// Handle course deletion
if (isset($_GET['delete'])) { 
    // Check if the URL contains a "delete" parameter (example: dashboard.php?delete=5)

    $id = $_GET['delete']; 
    // Store the course ID to be deleted

    $query = "DELETE FROM courses WHERE id = :id"; 
    // SQL query to delete a course where the course ID matches

    $stmt = $db->prepare($query); 
    // Prepare the SQL statement to prevent SQL injection

    $stmt->bindParam(':id', $id); 
    // Bind the value of $id to the :id parameter in the query
    
    if ($stmt->execute()) { 
        // Execute the DELETE query

        header("Location: dashboard.php?msg=deleted"); 
        // Redirect back to the dashboard with a message indicating the course was deleted

        exit(); 
        // Stop further script execution
    }
}

// Fetch all courses
$query = "SELECT c.*, u.username as creator 
          FROM courses c 
          LEFT JOIN users u ON c.created_by = u.id 
          ORDER BY c.created_at DESC";
// SQL query to retrieve all courses
// c.* → selects all columns from the courses table
// LEFT JOIN users → joins the users table to get the creator’s username
// u.username as creator → rename the username column to "creator"
// ORDER BY created_at DESC → show newest courses first

$stmt = $db->prepare($query); 
// Prepare the SQL query for execution

$stmt->execute(); 
// Execute the query to retrieve the course data

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC); 
// Fetch all results from the query
// PDO::FETCH_ASSOC → returns results as an associative array (column names as keys)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - learnify</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: #f4f4f4;
        }
        
        .navbar {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .nav-links a:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .nav-links a:last-child {
            background: #f97316;
        }
        
        .nav-links a:last-child:hover {
            background: #ea580c;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .add-btn {
            background: #f97316;
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
        }
        
        .add-btn:hover {
            background: #ea580c;
        }
        
        .message {
            background: #4caf50;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }
        
        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .course-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .course-content {
            padding: 1.5rem;
        }
        
        .course-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }
        
        .course-category {
            color: #f97316;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .course-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .course-meta {
            font-size: 0.9rem;
            color: #999;
            margin-bottom: 1rem;
        }
        
        .actions {
            display: flex;
            gap: 1rem;
        }
        
        .edit-btn, .delete-btn {
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s;
        }
        
        .edit-btn {
            background: #2196f3;
            color: white;
        }
        
        .edit-btn:hover {
            background: #1976d2;
        }
        
        .delete-btn {
            background: #f44336;
            color: white;
        }
        
        .delete-btn:hover {
            background: #d32f2f;
        }
        
        .no-courses {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>learnify Admin</h2>
        <div class="nav-links">
            <a href="../index.php">View Site</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="header">
            <h1>Course Management</h1>
            <a href="add_course.php" class="add-btn">+ Add New Course</a>
        </div>
        
        <?php if(isset($_GET['msg'])): ?>
            <div class="message">
                <?php 
                    if($_GET['msg'] == 'added') echo "Course added successfully!";
                    if($_GET['msg'] == 'updated') echo "Course updated successfully!";
                    if($_GET['msg'] == 'deleted') echo "Course deleted successfully!";
                ?>
            </div>
        <?php endif; ?>
        
        <?php if(count($courses) > 0): ?>
            <div class="courses-grid">
                <?php foreach($courses as $course): ?>
                    <div class="course-card">
                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?>" class="course-image">
                        <div class="course-content">
                            <h3 class="course-title"><?php echo htmlspecialchars($course['title']); ?></h3>
                            <div class="course-category"><?php echo htmlspecialchars($course['category']); ?></div>
                            <p class="course-description"><?php echo substr(htmlspecialchars($course['description']), 0, 100) . '...'; ?></p>
                            <div class="course-meta">
                                Added by: <?php echo htmlspecialchars($course['creator'] ?: 'Admin'); ?><br>
                                <?php echo date('M d, Y', strtotime($course['created_at'])); ?>
                            </div>
                            <div class="actions">
                                <a href="edit_course.php?id=<?php echo $course['id']; ?>" class="edit-btn">Edit</a>
                                <a href="?delete=<?php echo $course['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-courses">
                <h2>No courses found</h2>
                <p>Click the "Add New Course" button to create your first course.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>