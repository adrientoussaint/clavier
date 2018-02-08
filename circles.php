<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Circles</title>
  <link rel="stylesheet" href="circles.css">
  <script src="paper-full.js"></script>
  <script type="text/paperscript" canvas="myCanvas">
	// Create a Paper.js Path to draw a line into it:

  //Circles
  var x = 30;
  var y = 30;

for(var j = 0; j <=40; j++) {
  for(var i = 0; i <= 40; i++) {
    new Path.Circle(new Point(x, y), 10).fillColor = 'purple';
    x += 40;
  };
  x = 30;
  y += 40;
};

var circle = new Path.Circle(new Point(30, 30), 10).fillColor = 'purple';
</script>
</head>
<body>
<canvas id="myCanvas" resize></canvas>
</body>
</html>
