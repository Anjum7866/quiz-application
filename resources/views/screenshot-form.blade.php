<!DOCTYPE html>
<html>
<head>
    <title>Laravel Dusk Screenshot App</title>
</head>
<body>
    <form action="{{ route('generate-screenshot') }}" method="post">
        @csrf
        <label for="browser">Browser:</label>
        <select name="browser" id="browser">
            <option value="chrome">Chrome</option>
            <option value="firefox">Firefox</option>
            <option value="edge">Edge</option>
            <option value="safari">Safari</option>
        </select>
        <br>
        <label for="browser_version">Browser Version:</label>
        <input type="text" name="browser_version" id="browser_version">
        <br>
        <label for="resolution">Resolution:</label>
        <select name="resolution" id="resolution">
            <option value="HD">HD</option>
            <option value="FHD">FHD</option>
            <!-- Add more options as needed -->
        </select>
        <br>
        <label for="url">URL:</label>
        <input type="text" name="url" id="url">
        <br>
        <button type="submit">Generate Screenshot</button>
    </form>
</body>
</html>
