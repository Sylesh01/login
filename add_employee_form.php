<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/employeeform.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mb-5">Add Employee</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3" name="submit">Add Employee</button>
            </div>
        </form>
    </div>
</body>
</html>
