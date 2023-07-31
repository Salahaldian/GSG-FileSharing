<!DOCTYPE html>
<html>

<head>
    <title>All Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        form {
            display: inline;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button.generate-url-btn {
            background-color: #28a745;
        }

        #success-message {
            display: none;
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            position: fixed;
            top: 10px;
            right: 10px;
        }

        #import-url a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>All Files</h1>
    <div id="success-message" class="success-message">
        <p>{{ session('success') }}</p>
    </div>
    <ul>
        @foreach ($files as $file)
            <li>
                {{ $file->filename }}
                <form action="{{ route('import.file') }}" method="post">
                    @csrf
                    <input type="hidden" name="filename" value="{{ $file->filename }}">
                    <button type="submit">Import</button>
                </form>

                <!-- New button to generate the URL -->
                <form action="{{ route('generateImportUrl') }}" method="get">
                    @csrf
                    <input type="hidden" name="file_name" value="{{ $file->filename }}">
                    <button type="submit" class="generate-url-btn">Generate Import URL</button>
                </form>
                <div class="generated-url-container">
                    @if (isset($generatedUrl))
                        <p>Download URL: <a href="{{ $generatedUrl }}" target="_blank">{{ $generatedUrl }}</a></p>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    </div>
</body>

</html>
