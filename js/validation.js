function validateForm() {
    var cost = document.forms["form"]["ecost"].value;

    if(cost <= 0){
        alert("Enter valid amount");
        return false;
    }
}