<!-- AddTimetableEntryForm.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> RSINFO| Create New TimeTable</title>
</head>
<body>
    <h2>Add Timetable For Computer Science</h2>
    <form action="../includes/processTimetablecomputer.inc.php" method="post">
        <label for="course">Course Name:</label>
        <input type="text" name="course_name" required>

        <label for="course">Course Code:</label>
        <input type="text" name="course_code" required>

        <label for="dept_name">Department Name:</label>
        <select name="dept_name" required>
            <option name="General">General</option>
                <option value="Computer Science">Computer Science</option>
        </select>
        <label>Level</label>
        <select name="level_r" required>
            <option value="ND1">ND1</option>
               <option value="ND2">ND2</option>
               <option value="HND1">HND1</option>
               <option value="HND2">HND2</option>
        </select>
        <label for="teacher">Teacher:</label>
        <input type="text" name="teacher_name" required>

        <label for="day">Day of Week:</label>
        <input type="text" name="day_of_week" required>

        <label for="time_start">Start Time:</label>
        <input type="time" name="time_start" required>

        <label for="time_end">End Time:</label>
        <input type="time" name="time_end" required>

        <input type="submit" value="Add Timetable Entry">
    </form>
</body>
</html>
