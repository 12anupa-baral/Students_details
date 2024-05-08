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
