<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Sharing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .button-container button {
            display: inline-block;
            margin: 10px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s ease;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }

        .button-container a {
            display: inline-block;
            margin: 10px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s ease;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to File Management</h1>
        <div class="button-container">
            <form action="{{ route('show.file') }}" method="get">
                <button type="submit">Show All Files to Import</button>
            </form>
            <a href="{{ route('upload.file') }}">Upload</a>
            <a href="{{ route('import.file') }}">Import</a>
        </div>
    </div>
</body>

</html>
