<?php 

#---- validating cases
function validate($input,$flag){
$status = true;

 switch ($flag) {
     case 1:
         # code...
         if(empty($input)){
           $status = false;
         }
         break;

    case 2: 
        if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
            $status = false;
        }
       break;

    case 3: 
        # code 
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            $status = false;
        } 
        break; 


    case 4: 
        $allowedExt = ['pdf'];

        $extArray = explode('/',$input);
    
        if(!in_array($extArray[1],$allowedExt)){
            $status = false;
        }

      break;

    case 5:
        if (filter_var($input, FILTER_VALIDATE_URL) === false) {
            # code...
            $status = false;

        }


   }
  
    return $status;

}




#------- string clean method
function cleanInputs($input){
  
    $input = trim($input);
    $input = stripcslashes($input);
    $input = htmlspecialchars($input);

     return $input;
}





?>