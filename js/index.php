<html>
	<head></head>
	<body>
		
			<h1>This is from server
				<span></span></h1>
				<button onclick="viewJs()">Click me to run JS!</button>
				<button onclick="turnOn()">Turn On</button>
				<img id="bulb" src="pic_bulboff.gif">
				<button onclick="turnOff()">Turn Off</button>
			<p id="p1"></p>
			<script>
				//alert("Hello from JS");
				function get(id){
					return document.getElementById(id);
				}
				function turnOn(){
					var bulb = get("bulb");
					bulb.src = "pic_bulbon.gif";
				}
				function turnOff(){
					var bulb = get("bulb");
					bulb.src = "pic_bulboff.gif";
				}
				function viewJs()
				{
					var p = document.getElementById("p1");
					p.innerHTML = "Hello from JS";
					p.style.color="red";
					p.style.margin="50px";
					p.style.backgroundColor="black";
					p.style.borderRadius="5px";
				}
				
			</script>
	</body>
	
</html>