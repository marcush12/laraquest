<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Answers</title>
   <!--  Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ask a Question</h1>
        <hr>
        <form action="{{ route('questions.store') }}" method="POST">
            {{ csrf_field() }}
            <label for="title">Question:</label>
            <input type="text" name='title' id='title' class="form-control">

            <label for="description">More information</label>
            <textarea name='description' id='description' class="form-control" rows='4'></textarea>

            <input type="submit" class="btn btn-primary" value='Submit Question'>
        </form>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>
</html>
