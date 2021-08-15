<?php require 'validations.php';?>
<html>
	<head>
		<script>
			var hasError=false;
			function get(id){
				return document.getElementById(id);
			}
			function validateGen(){
				var gn = document.getElementsByName("gender"); //array of radio button
				var checked = false;
				for(var i=0;i<gn.length;i++){
					if(gn[i].checked){
						checked= true;
						break;
					}
				}
				return checked;
			}
			function validateHobb(){
				var hb = document.getElementsByName("hobbies[]"); //array of radio button
				var checked = false;
				for(var i=0;i<hb.length;i++){
					if(hb[i].checked){
						checked= true;
						break;
					}
				}
				
				return checked;
			}
			function validateGender(){
				var gn = document.querySelector('input[name="gender"]:checked');
				if(gn == null){
					return false;
				}
				return true;
			}
			function validateHobbies(){
				var hb = document.querySelector('input[name="hobbies[]"]:checked');
				if(hb == null){
					return false;
				}
				return true;
			}
			function validate(){
				
				refresh();
				if(get("name").value == ""){
					hasError = true;
					get("err_name").innerHTML = "*Name Req";
				}
				else if(get("name").value.length <= 2){
					hasError = true;
					get("err_name").innerHTML = "*Name must be > 2 characters";
				}
				if(get("username").value == ""){
					hasError = true;
					get("err_uname").innerHTML = "*Uname Req";
				}
				if(get("bio").value == ""){
					hasError = true;
					get("err_bio").innerHTML = "*Bio Req";
				}
				if(get("profession").selectedIndex==0){
					hasError = true;
					get("err_prof").innerHTML = "*Prof Req";
				}
				if(!validateGen()){
					hasError = true;
					get("err_gender").innerHTML = "*Gender Req";
				}
				if(!validateHobb()){
					hasError = true;
					get("err_hobbies").innerHTML = "*Hobbies Req";
				}
				/*if(!get("male").checked && !get("female").checked){
					hasError = true;
					get("err_gender").innerHTML = "*Gender Req";
					
				}
				if(!get("movies").checked && !get("music").checked && !get("sports").checked && !get("games").checked){
					hasError = true;
					get("err_hobbies").innerHTML = "*Hobbies Req";
					
				}*/
				
			return !hasError;
			}
			function refresh(){
				hasError=false;
				get("err_name").innerHTML="";
				get("err_uname").innerHTML = "";
				get("err_bio").innerHTML = "";
				get("err_prof").innerHTML = "";
				get("err_gender").innerHTML = "";
				get("err_hobbies").innerHTML ="";
				
				
			}
		</script>
	</head>
	<body>
		<fieldset>
			<form action="" onsubmit="return validate()" method="post">
				<table >
					<tr>
						<td>Name: </td>
						<td><input type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="Name"></td>
						<td><span id="err_name"><?php echo $err_name;?></span></td>
						
					</tr>
					<tr>
						<td>Username: </td>
						<td><input type="text" id="username" name="username" value="<?php echo $uname;?>" placeholder="Username"></td>
						<td><span id="err_uname"><?php echo $err_uname;?></span></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" id="password" name="password" placeholder="Password"></td>
					</tr>

					<tr>
						<td>Gender: </td>
						<td><input type="radio" id="male" value="Male" <?php if($gender == "Male") echo "checked";?> name="gender"> Male <input id="female" <?php if($gender == "Female") echo "checked";?> name="gender"  value="Female" type="radio"> Female</td>
						<td><span id="err_gender"><?php echo $err_gender;?></span></td>
					</tr>
					<tr>
						<td>Profession:  </td>
						<td>
							<select id="profession" name="profession">
								<option selected disabled>--Select--</option>
								<?php
									foreach($professions as $pf){
										if($prof == $pf)
											echo "<option selected>$pf</option>";
										else
											echo "<option>$pf</option>";
									}
								?>
							</select> 
						</td>
						<td><span id="err_prof"><?php echo $err_prof;?></span></td>
					</tr>
					<tr>
						<td>Hobbies:  </td>
						<td>
							<input type="checkbox" id="movies" value="Movies" <?php if(hobbyExist("Movies")) echo "checked";?>  name="hobbies[]"> Movies
							<input type="checkbox" id="music" value="Music" <?php if(hobbyExist("Music")) echo "checked";?> name="hobbies[]"> Music<br>
							<input type="checkbox" id="sports" value="Sports" <?php if(hobbyExist("Sports")) echo "checked";?> name="hobbies[]"> Sports
							<input type="checkbox" id="games" value="Games" <?php if(hobbyExist("Games")) echo "checked";?> name="hobbies[]"> Games
						</td>
						<td><span id="err_hobbies"><?php echo $err_hobbies;?></span></td>
					</tr>
					<tr>
						<td>Bio:  </td>
						<td>
							<textarea id="bio" name="bio"><?php echo $bio;?></textarea>
						</td>
						<td><span id="err_bio"><?php echo $err_bio;?></span></td>
					</tr>
					<tr>
						<td align="right" colspan="2"><input type="submit" value="Register"></td>
					</tr>
					
				</table>
			</form>
		</fieldset>
	</body>
</html>