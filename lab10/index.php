<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIC 21203 - Lab Activity 10: Graphic Usage using PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fa;
        }
        header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        h1, h2, h3 {
            color:rgb(173, 156, 156);
        }
        h1 {
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .card h3 {
            margin-top: 0;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        img {
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 10px;
        }
        .instructions {
            background: #e8f4fd;
            padding: 15px;
            border-left: 4px solid #3498db;
            margin: 20px 0;
        }
        .code-block {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
        }
        footer {
            background: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Faculty of Computer Science and Information Technology</h1>
        <h2>BIC 21203 Web Development - Lab Activity 10</h2>
        <h3>Graphic Usage using PHP</h3>
    </header>

    <div class="instructions">
        <h3>Lab Instructions</h3>
        <p>This lab demonstrates the use of PHP's GD library to dynamically generate images. 
        Ensure you have the GD library enabled on your server to see the outputs below.</p>
    </div>

    <h2>Part A: Provided Exercises</h2>
    <div class="container">
        <!-- Exercise A1 -->
        <div class="card">
            <h3>A1: Welcome Banner</h3>
            <p>Blue background with white text</p>
            <img src="parta1.php" alt="Welcome Banner">
            <div class="code-block">
                header("Content-Type: image/png");<br>
                $image = imagecreate(400, 100);<br>
                $blue = imagecolorallocate($image, 0, 0, 255);<br>
                $white = imagecolorallocate($image, 255, 255, 255);<br>
                imagestring($image, 5, 50, 40, "Welcome to Our Shop!", $white);
            </div>
        </div>

        <!-- Exercise A2 -->
        <div class="card">
            <h3>A2: Sale Rectangle</h3>
            <p>Red rectangle with "Sale!" text</p>
            <img src="parta2.php" alt="Sale Rectangle">
            <div class="code-block">
                header("Content-Type: image/png");<br>
                $image = imagecreate(300, 150);<br>
                $white = imagecolorallocate($image, 255, 255, 255);<br>
                $red = imagecolorallocate($image, 255, 0, 0);<br>
                $black = imagecolorallocate($image, 0, 0, 0);<br>
                imagefilledrectangle($image, 50, 50, 250, 100, $red);<br>
                imagestring($image, 5, 120, 70, "Sale!", $black);
            </div>
        </div>
    </div>

    <h2>Part B: Custom Image Generation</h2>
    <div class="container">
        <!-- Exercise B1 -->
        <div class="card">
            <h3>B1: Products Sold Counter</h3>
            <p>Yellow background with black text</p>
            <img src="partb1.php" alt="Products Sold">
            <div class="code-block">
                $sold = rand(50, 200); // Random count<br>
                $image = imagecreate(300, 150);<br>
                $yellow = imagecolorallocate($image, 255, 255, 0);<br>
                $black = imagecolorallocate($image, 0, 0, 0);<br>
                imagestring($image, 5, 80, 60, "$sold Items Sold", $black);
            </div>
        </div>

        <!-- Exercise B2 -->
        <div class="card">
            <h3>B2: Circle and Line</h3>
            <p>Green circle and purple line</p>
            <img src="partb2.php" alt="Circle and Line">
            <div class="code-block">
                $image = imagecreate(300, 300);<br>
                $white = imagecolorallocate($image, 255, 255, 255);<br>
                $green = imagecolorallocate($image, 0, 128, 0);<br>
                $purple = imagecolorallocate($image, 128, 0, 128);<br>
                imagefilledellipse($image, 150, 150, 200, 200, $green);<br>
                imageline($image, 50, 50, 250, 250, $purple);
            </div>
        </div>

        <!-- Exercise B3 -->
        <div class="card">
            <h3>B3: Personalized Greeting</h3>
            <p>Custom TrueType font on light gray background</p>
            <img src="partb3.php?name=Student" alt="Personalized Greeting">
            <div class="code-block">
                $name = $_GET['name'] ?? 'User';<br>
                $image = imagecreate(500, 150);<br>
                $light_gray = imagecolorallocate($image, 230, 230, 230);<br>
                $black = imagecolorallocate($image, 0, 0, 0);<br>
                $font = 'fonts/Roboto-Regular.ttf';<br>
                imagettftext($image, 24, 0, 50, 80, $black, $font, "Hello, $name!");
            </div>
        </div>
    </div>

    <footer>
        <p>Faculty of Computer Science and Information Technology &copy; 2024/2025</p>
        <p>BIC 21203 Web Development - Lab Activity 10 Completed</p>
    </footer>
</body>
</html>