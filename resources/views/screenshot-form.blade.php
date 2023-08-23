<form method="post" action="{{ route('generate-screenshot') }}">
    @csrf

    <label for="browser">Browser:</label>
    <select name="browser" id="browser">
        <option value="chrome">Chrome</option>
        <option value="firefox">Firefox</option>
        <option value="edge">Edge</option>
        <option value="safari">Safari</option>
    </select>

    <label for="browser_version">Browser Version:</label>
    <input type="text" name="browser_version" id="browser_version">

    <label for="resolution">Resolution:</label>
    <select name="resolution" id="resolution">
        <option value="hd">HD</option>
        <option value="fhd">FHD</option>
    </select>

    <label for="url">URL:</label>
    <input type="url" name="url" id="url">

    <button type="submit">Generate Screenshot</button>
</form>
