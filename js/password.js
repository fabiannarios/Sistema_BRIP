let flag = true;
function pass(){
    if(flag){
        document.getElementById("password").type ="password";
        document.getElementById("pass-icon").class ="bxr bx-eye-slash";
        flag = false;
    }else{
        document.getElementById("password").type ="text";
        document.getElementById("pass-icon").class ="bxr bx-eye-alt";
        flag = true;
    }
}