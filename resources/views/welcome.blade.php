<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Sharing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 250px auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .buttons {
            margin-top: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .upload-button {
            background-color: #2ecc71;
        }

        .upload-button:hover {
            background-color: #28b463;
        }

        .download-button {
            background-color: #e74c3c;
        }

        .download-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="buttons">
            <a href="upload" class="upload-button">Upload File</a>
            <a href="#" class="download-button">Download File</a>
        </div>
    </div>
</body>

</html>
