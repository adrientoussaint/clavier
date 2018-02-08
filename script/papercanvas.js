var base = true;
		var persKey = null;
		var keyData = null;
		var keyDefault = 
		{
				q: {
					sound: new Howl({
					src: ['sounds/default/bubbles.mp3']
					}),
					color: '#1abc9c'
				},
				w: {
					sound: new Howl({
					src: ['sounds/default/clay.mp3']
					}),
					color: '#2ecc71'
				},
				e: {
					sound: new Howl({
					src: ['sounds/default/confetti.mp3']
					}),
					color: '#3498db'
				},
				r: {
					sound: new Howl({
					src: ['sounds/default/corona.mp3']
					}),
					color: '#9b59b6'
				},
					t: {
					sound: new Howl({
					src: ['sounds/default/dotted-spiral.mp3']
					}),
					color: '#34495e'
				},
				y: {
					sound: new Howl({
					src: ['sounds/default/flash-1.mp3']
					}),
					color: '#16a085'
				},
				u: {
					sound: new Howl({
					src: ['sounds/default/flash-2.mp3']
					}),
					color: '#27ae60'
				},
				i: {
					sound: new Howl({
					src: ['sounds/default/flash-3.mp3']
					}),
					color: '#2980b9'
				},
				o: {
					sound: new Howl({
						src: ['sounds/default/glimmer.mp3']
					}),
					color: '#8e44ad'
				},
				p: {
					sound: new Howl({
					src: ['sounds/default/moon.mp3']
					}),
					color: '#2c3e50'
				},
				a: {
					sound: new Howl({
					src: ['sounds/default/pinwheel.mp3']
					}),
					color: '#f1c40f'
				},
				s: {
					sound: new Howl({
					src: ['sounds/default/piston-1.mp3']
					}),
					color: '#e67e22'
				},
					d: {
					sound: new Howl({
					src: ['sounds/default/piston-2.mp3']
					}),
					color: '#e74c3c'
				},
				f: {
					sound: new Howl({
					src: ['sounds/default/prism-1.mp3']
					}),
					color: '#95a5a6'
				},
				g: {
					sound: new Howl({
					src: ['sounds/default/prism-2.mp3']
					}),
					color: '#f39c12'
				},
				h: {
					sound: new Howl({
					src: ['sounds/default/prism-3.mp3']
					}),
					color: '#d35400'
				},
				j: {
					sound: new Howl({
					src: ['sounds/default/splits.mp3']
					}),
					color: '#1abc9c'
				},
				k: {
					sound: new Howl({
					src: ['sounds/default/squiggle.mp3']
					}),
					color: '#2ecc71'
				},
				l: {
					sound: new Howl({
					src: ['sounds/default/strike.mp3']
					}),
					color: '#3498db'
				},
				z: {
					sound: new Howl({
					src: ['sounds/default/suspension.mp3']
					}),
					color: '#9b59b6'
				},
				x: {
					sound: new Howl({
					src: ['sounds/default/timer.mp3']
					}),
					color: '#34495e'
				},
				c: {
					sound: new Howl({
					src: ['sounds/default/ufo.mp3']
					}),
					color: '#16a085'
				},
				v: {
					sound: new Howl({
					src: ['sounds/default/veil.mp3']
					}),
					color: '#27ae60'
				},
				b: {
					sound: new Howl({
					src: ['sounds/default/wipe.mp3']
					}),
					color: '#2980b9'
				},
				n: {
					sound: new Howl({
						src: ['sounds/default/zig-zag.mp3']
					}),
					color: '#8e44ad'
				},
				m: {
					sound: new Howl({
					src: ['sounds/default/moon.mp3']
					}),
					color: '#2c3e50'
				}
			}
		$('#getMyPref').on('click', function(){
			var usid = $('#getMyPref').data("id");
			$.ajax({
					url :'script/script.php',
					type : 'POST',
					data : {user_id : usid},
					success : function(res){
						persKey = keyDefault;
						$.each( JSON.parse(res), function( key, value ) {
							persKey[key].sound = new Howl({src:['sounds/'+value]});
							$('#'+key+'>option#'+value).attr('selected','selected');
						});
						base = false;
					}
					
				});
		});
			
		function load(){
			if(base != true){
				keyData = persKey;
			}else{
				keyData = keyDefault;
			}
		}

		$('#backToBase').on('click', function(){
			base = true;
			load();
		})
		
		
		load();

		var circles = [];

		function onKeyDown(event) {
			if(keyData[event.key]){
				if($('input').is(':focus')){

				}else{
					var maxPoint = new Point(view.size.width, view.size.height);
					var randomPoint = Point.random();
					var point = maxPoint * randomPoint;
					var rand = Math.round(Math.random()*3);
					if(rand==1){
						var newCircle = new Path.Circle(point, 500)
					}else if(rand==2){
						var newCircle = new Path.Rectangle(point, 500);					
					}else{
						var newCircle = new Path.RegularPolygon(point, 3, 500);
					}
					newCircle.fillColor = keyData[event.key].color;
					keyData[event.key].sound.play();
					circles.push(newCircle);
					console.log(rand);
				}
			}
		}

		// function onKeyUp(event) {
		// 	if(keyData[event.key]){
		// 		if($('input').is(':focus')){

		// 		}else{
		// 			keyData[event.key].sound.stop();
		// 		}
		// 	}
		// }

		function onFrame(event){
			for(var i = 0; i < circles.length; i++){
				circles[i].scale(0.9);
				circles[i].rotate(8);
				circles[i].fillColor.hue += 1;
				if(circles[i].area < 1){
					circles[i].remove();
				circles.splice(i, 1);
				//   console.log(circles);
        	}
      }
	}