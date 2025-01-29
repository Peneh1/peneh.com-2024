      <link href="style.css" rel="stylesheet">



<form action="add_d.php" method="post">
    <p>You are helping the world, Finding best Doctors, and save lifes!</p>
    <hr>
        <h4>Doctor's Info</h4>
<hr>
  <div class="form-group">
    <label for="title">Title</label><br>
    <select name="title" required><option></option><option>Mr.</option><option>Mrs.</option></select> 
    
  </div>
  <div class="form-group">
    <label for="Doctors_FName">Doctors First Name</label>
    <input type="text" class="form-control" name="doctor_fname" required>
  </div>
    
     <div class="form-group">
    <label for="Doctors_LName">Doctors Last Name</label>
    <input type="text" class="form-control" name="doctor_lname" required>
  </div>
    
    <div class="form-group">
    <label for="Doctors_Field">Doctors Spesilty Field</label>
        <select name="field" required>
            <option></option>
            <option>Allergy and immunology</option><option>
Adolescent medicine	</option><option>
Anesthesiology	</option><option>
Aerospace medicine</option><option>
Bariatrics</option><option>
Cardiology</option><option>
Cardiothoracic surgery</option><option>
Clinical neurophysiology</option><option>
Colorectal surgery	</option><option>
Dermatology</option><option>
Emergency medicine</option><option>
Endocrinology</option><option>
Family Medicine</option><option>
Forensic pathology</option><option>
Forensic psychiatry</option><option>
Gastroenterology</option><option>
General surgery</option><option>
Geriatrics</option><option>
Geriatric psychiatry</option><option>
Gynecologic oncology</option><option>
Hematology</option><option>
Infectious disease	</option><option>
Internal medicine</option><option>
Interventional radiology</option><option>
Intensive care medicine</option><option>
Maternal-fetal medicine</option><option>
Medical biochemistry</option><option>
Medical oncology</option><option>
Neonatology</option><option>
Nephrology</option><option>
Neurology</option><option>
Neuropathology</option><option>
Neurosurgery	</option><option>
Nuclear medicine</option><option>
Obstetrics and gynecology</option><option>
Occupational medicine</option><option>
Ophthalmology</option><option>
Orthopedic surgery</option><option>
Oral and maxillofacial surgery</option><option>
Otorhinolaryngology</option><option>
Palliative care</option><option>
Pathology</option><option>
Pediatrics</option><option>
Pediatric emergency medicine</option><option>
Pediatric surgery</option><option>
Physical medicine and rehabilitation</option><option>
Plastic, reconstructive and aesthetic surgery</option><option>
Psychiatry</option><option>
Public health</option><option>
Radiation oncology</option><option>
Radiology</option><option>
Respiratory medicine</option><option>
Rheumatology</option><option>
Sports medicine</option><option>Multidisciplinary
Thoracic surgery</option><option>
Toxicology</option><option>
Neuroradiology</option><option>
Urology</option><option>
Vascular surgery</option></select>
  </div>
    
    <div class="form-group">
    <label for="state">Doctors State Location</label>
    <select name="state" required>
        <option></option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>				
	
  </div>
    
    <div class="form-group">
    <label for="doctors_tel">Doctors Phone Number</label>
    <input type="text" class="form-control" name="doctor_tel" required>
  </div>
      <div class="form-group">
    <label for="Doctors_Email">Doctors Email Address</label>
    <input type="Email" class="form-control" name="doctor_email" required>
  </div>
    
 <div class="form-group">
    <label for="rate">What rating would you give for this doctor?</label><br>
    <select name="rate" required>
        <option></option>
        <option value="1">1/5 Bad</option>
        <option value="2">2/5 Need improvment</option>
        <option value="3">3/5 Ok</option>
        <option value="4">4/5 Good</option>
        <option value="5">5/5 Excellent</option>
        </select> 
    
     <div class="form-group">
    <label for="user_fname">Based on what did you give this Rating?</label>
    <input type="text" class="form-control" name="review" placeholder="Short Review...">
  </div>
     <hr>
    <h4>Now we need Your info</h4>
    <hr>
    <div class="form-group">
    <label for="user_fname">Your legal First Name</label>
    <input type="text" class="form-control" name="user_fname" required>
  </div>
    
    <div class="form-group">
    <label for="user_lname">Your Legal last Name</label>
    <input type="text" class="form-control" name="user_lname" required>
  </div>

    
    <div class="form-group">
    <label for="user_tel">Your primary Phone Number</label>
    <input type="text" class="form-control" name="user_tel" required>
  </div>
    
    <div class="form-group">
    <label for="user_email">Your primary Email Address</label>
    <input type="Email" class="form-control" name="user_email" required>
  </div>
    <hr>
     <input name="agree" type="checkbox" required>
    <lable for="agree"> I agree that all entered info is correct, and permit to contact me regarding this doctor.</label>
  <input name="submit" type="submit" class="btn btn-primary"></input>
</form>