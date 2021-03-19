 function validator() {

   
   var emailID = document.getElementById('email');
   var passwordID = document.getElementById('password');

   // fixed bug, if emailID is null I ask for email-edit
   // I avoid id not unique
   if(emailID.value.length < 1){
      var emailID = document.getElementById('email-edit');
      var passwordID = document.getElementById('password-edit');
   }
   

   //Valid email
   atpos = emailID.value.indexOf("@");
   dotpos = emailID.value.lastIndexOf(".");
         
   if (atpos < 1 || ( dotpos - atpos < 2 )) {
      alert("Please enter a valid email address.")
      emailID.focus() ;
      return false;
   }
    //Valid password
   if( passwordID.value.length < 8 ) {       
      alert( "The password must have at least 8 characters." );
      passwordID.focus() ;
      return false;
   }
         
   return( true );

}

