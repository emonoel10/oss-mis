<!DOCTYPE html>
<html>
<body>
<center><br><br><br><br><br><br><br><br>
<p style="font-family: latoregular;">REDIRECTING TO DNSC SOCIO-ECONOMIC &amp; GRADUATE TRACER SURVEY, PLEASE WAIT...</p>
<canvas id="my_canvas" width="70" height="70" style="border:1px #CCC;"></canvas>
<script>
var ctx = document.getElementById('my_canvas').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height;
var diff;
function progressSim(){
  diff = ((al / 100) * Math.PI*2*10).toFixed(2);
  ctx.clearRect(0, 0, cw, ch);
  ctx.lineWidth = 10;
  ctx.fillStyle = '#09F';
  ctx.strokeStyle = "#09F";
  ctx.textAlign = 'center';
  ctx.fillText(al+'%', cw*.5, ch*.5+2, cw);
  ctx.beginPath();
  ctx.arc(35, 35, 30, start, diff/10+start, false);
  ctx.stroke();
  if(al >= 100){
    clearTimeout(sim);
      // Add scripting here that will run when progress completes
      window.location.href = "home.php";
  }
  al++;
}

function url_has_vars() {
   return location.search != "";
}

console.log(url_has_vars());

var sim = setInterval(progressSim, 50);
</script>
</center>
</body>
</html>
