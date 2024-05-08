<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Contact Form</title>
</head>
<body>

<div class="container">
    <h2>Application Form</h2>
    <form action="submit_form.php" method="post">

        <!-- Student details -->
        <div class="Sdetails">
            <div class="Sinfo">
                <div class="form-group">
                    <label for="FormNo">Your IOE Form No:</label>
                    <input type="number" id="FormNoInput" placeholder="Enter FormNo" onkeypress="handleKeyPress(event)"/>
                </div>
                <div class="form-group">
                    <label for="Sname">Student Name:</label>
                    <input type="text" id="Sname" name="Sname" required>
                </div>
            </div>

            <div class="Sinfo">
                <div class="form-group">
                    <label for="rank">IOE Rank:</label>
                    <input type="number" id="rank" name="rank" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div class="Sinfo">
                <div class="form-group">
                    <label for="score">IOE Score:</label>
                    <input type="number" id="score" name="score" required>
                </div>
                <div class="form-group">
                    <label for="school">School:</label>
                    <input type="text" id="school" name="school" required>
                </div>
            </div>
        </div>

        <!-- Address -->
        <h2>Address</h2>
        <div class="Sdetails">
            <div class="Sinfo">
                <div class="form-group">
                    <label for="district">District:</label>
                    <input type="text" id="district" name="district" required>
                </div>
                <div class="form-group">
                    <label for="vdc">VDC/Municipality:</label>
                    <input type="text" id="vdc" name="vdc" required>
                </div>
            </div>

            <div class="Sinfo">
                <div class="form-group">
                    <label for="ward">Ward No:</label>
                    <input type="number" id="ward" name="ward" required>
                </div>
                <div class="form-group">
                    <label for="tole">Tole:</label>
                    <input type="text" id="tole" name="tole">
                </div>
            </div>
        </div>
        
        <!-- Contact info -->
        <h2>Contact Info</h2>
        <div class="Sdetails">
            <div class="Sinfo">
                <div class="form-group">
                    <label for="mobileNo">Mobile No:</label>
                    <input type="tel" id="mobileNo" name="mobileNo" required>
                </div>
                <div class="form-group">
                    <label for="TelNo">Telephone No:</label>
                    <input type="tel" id="TelNo" name="TelNo">
                </div>
            </div>

            <div class="Sinfo">
                <div class="form-group">
                    <label for="email">Email id:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="guardian">Guardian:</label>
                    <input type="text" id="guardian" name="guardian" required>
                </div>
            </div>
        </div>
   
        <!-- Program -->
        <h2>Program</h2>
        <div class="ProgramDetails">
            <div class="programs">
                <div class="form-group">
                    <label for="priority1">Priority 1:</label>
                    <select id="priority1" name="priority1" required>
                        <option>choose1</option>
                        <option>choose2</option> 
                        <option>choose3</option>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="priority2">Priority 2:</label>
                    <select id="priority2" name="priority2" required>
                        <option value="choose1">choose1</option>
                        <option value="choose2">choose2</option> 
                        <option value="choose3">choose3</option>
                    </select>
                </div> 
                <div class="form-group">
                    <label for="priority3">Priority 3:</label>
                    <select id="priority3" name="priority3" required>
                        <option value="choose1">choose1</option>
                        <option value="choose2">choose2</option> 
                        <option value="choose3">choose3</option>
                    </select>
                </div>  

                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
    function handleKeyPress(event) {
    if (event.key === 'Enter') {
        const formNo = document.getElementById('FormNoInput').value;
        fetchFormData(formNo);
    }
}

function fetchFormData(formNo) {
    fetch('getFormData.php?formNo=' + formNo)
        .then(response => response.json())
        .then(data => {
            document.getElementById('Sname').value = data.Sname;
            document.getElementById('rank').value = data.rank;
            document.getElementById('gender').value = data.gender;
            document.getElementById('score').value = data.score;
            document.getElementById('school').value = data.school;
            document.getElementById('district').value = data.district;
            document.getElementById('vdc').value = data.vdc;
            document.getElementById('ward').value = data.ward;
            document.getElementById('tole').value = data.tole;
            document.getElementById('mobileNo').value = data.mobileNo;
            document.getElementById('TelNo').value = data.TelNo;
            document.getElementById('email').value = data.email;
            document.getElementById('guardian').value = data.guardian;
            document.getElementById('priority1').value = data.priority1;
            document.getElementById('priority2').value = data.priority2;
            document.getElementById('priority3').value = data.priority3;
        })
        .catch(error => console.error('Error:', error));
}

function error(){
    console.log("js is connected");
}

</script>
</body>
</html>
