<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Laravel Dusk Responsive Test</title>
</head>
<body>
    <header dusk="navigation">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h1>Welcome to Laravel Dusk Responsive Test</h1>
        <p>This is a sample page for testing responsiveness.</p>
        <p>Cookie value: Taylor</p>
       
    </div>
    <div id="content" style="display: none;">Delayed content</div>
    <div class="table">
        <table>
            <tr>
                <td>Hello World</td>
                <td><a href="#">Delete</a></td>
            </tr>
            <!-- More rows here -->
        </table>
    </div>


    <form>
        <button dusk="submit-button">Submit</button>
    </form>

    <footer>
        <p>&copy; 2023 Laravel Dusk Responsive Test</p>
    </footer>
</body>
</html>
