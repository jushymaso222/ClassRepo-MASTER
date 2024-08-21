// JavaScript Document

const fName = document.getElementById('first-name');
const lName = document.getElementById("last-name");
const email = document.getElementById("email");
const emailC = document.getElementById("emailC");
const phone = document.getElementById("phone");

const spanFN = document.getElementById('fn-error');
const spanLN = document.getElementById("ln-error");
const spanE = document.getElementById("email-error");
const spanEC = document.getElementById("emailC-error");
const spanP = document.getElementById("phone-error");

const alpha = /[^A-z|-]/g;
const emailPattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
const phonePattern = /^\d{10}$/;

function keydown(e) {
    e.nextElementSibling.innerHTML = "";
    e.parentElement.classList.remove("error")
}

function validate() {
    let result = true
    if (fName.value.length <= 0) {
        spanFN.innerHTML = "*Required Field";
        spanFN.parentElement.classList.add("error")
        result = false
    } else if (alpha.test(fName.value)) {
        spanFN.innerHTML = "* No Special Characters (Excluding Dashes)";
        spanFN.parentElement.classList.add("error")
        result = false
    }

    if (lName.value.length <= 0) {
        spanLN.innerHTML = "* Required Field";
        spanLN.parentElement.classList.add("error")
        result = false
    }  else if (alpha.test(lName.value)) {
        spanLN.innerHTML = "* No Special Characters (Excluding Dashes)";
        spanLN.parentElement.classList.add("error")
        result = false
    }

    if (email.value.length <= 0) {
        spanE.innerHTML = "* Required Field";
        spanE.parentElement.classList.add("error")
        result = false
    } else if (!emailPattern.test(email.value)) {
        spanE.innerHTML = "* Must Be A Valid Email";
        spanE.parentElement.classList.add("error")
        result = false
    }

    if (emailC.value.length <= 0) {
        spanEC.innerHTML = "* Required Field";
        spanEC.parentElement.classList.add("error")
        result = false
    }  else if (!emailPattern.test(emailC.value)) {
        spanEC.innerHTML = "* Must Be A Valid Email";
        spanEC.parentElement.classList.add("error")
        result = false
    } else if (emailC.value.length > 0 && emailC.value != email.value) {
        spanEC.innerHTML = "* Must Match Previous";
        spanEC.parentElement.classList.add("error")
        result = false
    }

    if (phone.value.length <= 0) {
        spanP.innerHTML = "* Required Field";
        spanP.parentElement.classList.add("error")
        result = false
    } else if (!phonePattern.test(phone.value)) {
        console.log("Email: " + emailPattern.test(email.value))
        spanP.innerHTML = "* Must Be A Valid Phone Number";
        spanP.parentElement.classList.add("error")
        result = false
    }
    return result
}

function btnSubmit_Click(e) {
    if (validate()) {
        document.getElementById("form").style.display = "none"

        let record = {
            fname:fName.value,
            lname:lName.value,
            email:email.value,
            phone:phone.value
        }

        document.getElementById("info").innerHTML = `${record.fname} ${record.lname} <br> ${record.email} <br> (${record.phone.substring(0,3)}) ${record.phone.substring(3,6)}-${record.phone.substring(6)}`
        document.getElementById("confirmation").style.display = "inline-block"
    }
}