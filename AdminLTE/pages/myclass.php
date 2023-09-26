<?php 
 include('constant.php');
class Profile{
        
    function __construct(){

        if(array_key_exists('Login', $_POST)){
            $this-> Login();
        }
        
        elseif(array_key_exists('Signup', $_POST)){
            $this-> SignUp();
        }
        elseif(array_key_exists('RegGuardian', $_POST)){
            $this-> RegGuardian();
        }
        elseif(array_key_exists('CreateClass', $_POST)){
            $this-> CreateClass();
        }
        elseif(array_key_exists('CreateArm', $_POST)){
            $this-> CreateArm();
        }
        elseif(array_key_exists('RegStudent', $_POST)){
            $this-> RegStudent();
        }
        elseif(array_key_exists('AddStaff', $_POST)){
            $this-> AddStaff();
        }
        elseif(array_key_exists('AddSubject', $_POST)){
            $this-> AddSubject();
        }
        elseif(array_key_exists('AddTeacher', $_POST)){
            $this-> AddTeacher();
        }
        elseif(array_key_exists('AddResult', $_POST)){
            $this->AddResult();
        }
    }

    function SignUp(){
         global $con;


         $firstname = $lastname = $email = $password =""; 
         $errors = ['firstname' => '', 'lastname'=> '', 'email'=>'', 'password'=>''];
 
         if(isset($_POST['signup'])){
 
         
           // to validate email address
           if(empty ($_POST['email'])){
               $errors['email'] = "An email address is required";
           } else{
               $email = $_POST['email'];
               if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                   $errors['email'] = "email must be a valid email address";
               }
           }
       }


        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES('$firstname','$lastname','$email', '$password')";
        mysqli_query($con,$sql);

        return;
    
    }
 
        function Login(){
            global $con;

            if($_SERVER['REQUEST_METHOD']=="POST"){
                //something was posted
                $email = $_POST['email'];
                $password = $_POST['password'];

                if(!empty ($email) && !empty($password) && !is_numeric($email)){
                    //save to database
                    $query = "SELECT * FROM users WHERE email ='$email' ";
                    $result = mysqli_query($con, $query);

                    if($result && mysqli_num_rows($result) ==1){

                        $user_data = mysqli_fetch_assoc($result);
                        if($user_data['password'] == $password){
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("location: index.php");
                            exit;
                        }

                    }
                } 
                echo "wrong username and password";
            } else {
                echo "please enter some valid information";
            }
            return;
        }


        function RegGuardian(){
            global $con;
            $name = $_POST['name'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $state = $_POST['state'];
            $lga = $_POST['lga'];

            $sql = "INSERT INTO guardian(name, phonenumber, email, address, state, lga ) VALUES('$name','$phonenumber','$email', '$address', '$state', '$lga')";
            mysqli_query($con,$sql);
    
            return;
        }

        function CreateClass(){
            global $con;
            $category = $_POST['category'];
            
            $sql = "INSERT INTO class(category) VALUES('$category')";
            mysqli_query($con, $sql);
    
            return;
        }

        function CreateArm(){
            global $con;
            $arm = $_POST['arm'];
            
            $sql = "INSERT INTO arm(arm) VALUES('$arm')";
            mysqli_query($con, $sql);
    
            return;
        }

        function RegStudent(){
            global $con;
            $guardian = $_POST['guardian'];
            $arm = $_POST['arm'];
            $class = $_POST['class'];
            $firstname = $_POST['firstname'];
            $lastname= $_POST['lastname'];
            $othername = $_POST['othername'];
            $gender = $_POST['gender'];
            $regnumber = $_POST['regnumber'];

            $sql = "INSERT INTO students(guardian, class, arm, firstname, lastname, othername, gender, regnumber ) VALUES('$guardian', '$class', '$arm', '$firstname', '$lastname', '$othername', '$gender', '$regnumber')";

            mysqli_query($con,$sql);
    
            return;
        }
        function AddStaff(){
            global $con;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            
            $sql = "INSERT INTO staff(name, email, phone, role ) VALUES('$name', '$email', '$phone', '$role')";

            mysqli_query($con,$sql);
    
            return;
        }

        function AddSubject(){
            global $con;
            $subject = $_POST['subject'];

            $sql ="INSERT INTO subject(subject) VALUES ('$subject')";

            mysqli_query($con,$sql);

            return;
        }

        function AddTeacher(){
            global $con;
            $subject = $_POST['subject'];
            $name = $_POST['name'];
            $class =$_POST['class'];

            $sql = "INSERT INTO teachers(subject,name,class) VALUES ('$subject','$name','$class')";

            mysqli_query($con,$sql);

            return;
        }

        function AddResult(){
            global $con;
            $ca1 = $_POST['ca1'];
            $ca2 = $_POST['ca2'];
            $ca3 = $_POST['ca3'];
            $exam = $_POST['exam'];
            $total = $_POST['ca1'] + $_POST['ca2'] + $_POST['ca3'] +$_POST['exam'];
            $remarks=['remark'=>''];
            $grades =['grade'=>''];

            if( $total > 69 && $total <101 ){
                $remarks['remark'] ='Excellent';
                $grades['grade'] ='A';
            } elseif($total > 59 && $total <70){
                $remarks['remark'] ='Very Good';
                $grades['grade'] ='B';
            }elseif($total > 49 && $total <60){
                $remarks['remark'] ='Good';
                $grades['grade']='C';
            }elseif($total > 44 && $total < 50){
                $remarks['remark'] =  'Pass';
                $grades['grade'] = 'D';
            }elseif($total >39 && $total < 45){
                $remarks['remark']='Poor';
                $grades['grade']='E';
            }elseif($total >= 0 && $total < 40){
                $remarks['remark'] ='Fail';
                $grades['grade'] ='F';
            }

            $sql = "INSERT INTO resultsetup(ca1, ca2, ca3, exam ) VALUES('$ca1', '$ca2', '$ca3', '$exam')";

            mysqli_query($con,$sql);
    
        }
        function updatePermission(){
            global $con;
            $staff =$_POST['updatePermission'];
            $p1 = $_POST['p1'] ?? 0;
            $p2 = $_POST['p2'] ?? 0;
            $p3 = $_POST['p3'] ?? 0;
            $p4 = $_POST['p4'] ?? 0;
            $sql = "UPDATE permission SET p1='$p1', p2='$p2', p3='$p3', p4='$p4' WHERE staffid ='$staffid' ";
            mysqli_query($con,$sql);

            return;

        }

        function sqLx($table,$key,$val,$pin){
            global $con;
            $sql = $con->query("SELECT * FROM $table WHERE $key='$val' ");
            $rows = mysqli_fetch_assoc($sql);
            return $rows[$pin];
        }

        function sqLx1(){
            global $con;
            $sql = $con->query("SELECT * FROM $table WHERE $col='$val' ");
            $row = mysqli_fetch_assoc($sql);
            return mysqli_num_rows($sql);
        }
}

$pro = new Profile();
?>