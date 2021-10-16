         function validation(){
         var name=document.forms['reg']['username'].value;
         var password=document.forms['reg']['password'].value;
         var repassword=document.forms['reg']['repassword'].value;
         var email=document.forms['reg']['email'].value;
         var gender=document.querySelector('input[name="gender"]:checked');
         if(name.length<3){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="name must be at least 3 characters long";
            return false;
         }
         if(password!==repassword)
         {
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="password not matched";
             return false;
         }else if(password.length<6){  
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Password must be at least 6 characters long";
            return false;  
         }
         var atposition=email.indexOf("@");  
         var dotposition=email.lastIndexOf(".");
	    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="Please enter a valid e-mail address";  
            return false;  
        }
        
        if(gender==null){
            document.getElementById('alert').style.visibility='visible';
            document.getElementById('alert').innerText="select your gender";
            return false;
        } 
    }
    /*    document.getElementById("submit").addEventListener('click',sure);
        
        function sure(){
            var msg=confirm("do you want to submit!!");
            if(msg==true ){
                document.reg.submit();
                alert("data submitted successfully");
            }else{
                document.getElementById("reg").action="";
                alert("you canceled form submission");
            }
        }
        console.log(document.reg);
        console.log(document.reg.email);
        console.log(document.getElementById("reg"));*/