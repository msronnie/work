<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
     
    $servername="localhost";
     $username="root";
     $password="";
     $database_name="cal_user_access";

     $conn=mysqli_connect($servername,$username,$password,$database_name);

     // check connection
    if(mysqli_connect_errno()){

        echo "Error";
    } 

    
    $dept_name=filter_input(INPUT_POST,"dept_name",FILTER_SANITIZE_SPECIAL_CHARS);
    $date=filter_input(INPUT_POST,"date",FILTER_SANITIZE_SPECIAL_CHARS);
    $surname=filter_input(INPUT_POST,"surname",FILTER_SANITIZE_SPECIAL_CHARS);
    $other_name=filter_input(INPUT_POST,"other_name",FILTER_SANITIZE_SPECIAL_CHARS);
    $staff_status=filter_input(INPUT_POST,"status",FILTER_SANITIZE_SPECIAL_CHARS);
    $pro_date=filter_input(INPUT_POST,"ped",FILTER_SANITIZE_SPECIAL_CHARS);
    $exp_date=filter_input(INPUT_POST,"ced",FILTER_SANITIZE_SPECIAL_CHARS);
    $train_confirm=filter_input(INPUT_POST,"conf",FILTER_SANITIZE_SPECIAL_CHARS);
    $access_type=filter_input(INPUT_POST,"access_type",FILTER_SANITIZE_SPECIAL_CHARS);
    $role=filter_input(INPUT_POST,"role",FILTER_SANITIZE_SPECIAL_CHARS);
    $head_approval=filter_input(INPUT_POST,"head_approval",FILTER_SANITIZE_SPECIAL_CHARS);
    $h_date=filter_input(INPUT_POST,"h_date",FILTER_SANITIZE_SPECIAL_CHARS);
    $ic_approval=filter_input(INPUT_POST,"ic_approval",FILTER_SANITIZE_SPECIAL_CHARS);
    $ic_date=filter_input(INPUT_POST,"ic_date",FILTER_SANITIZE_SPECIAL_CHARS);
    $sm_approval=filter_input(INPUT_POST,"sm_approval",FILTER_SANITIZE_SPECIAL_CHARS);
    $sm_date=filter_input(INPUT_POST,"sm_date",FILTER_SANITIZE_SPECIAL_CHARS);
    $mis_approval=filter_input(INPUT_POST,"mis_approval",FILTER_SANITIZE_SPECIAL_CHARS);
    $mis_date=filter_input(INPUT_POST,"mis_date",FILTER_SANITIZE_SPECIAL_CHARS);
    $s_assigned=filter_input(INPUT_POST,"s_assigned",FILTER_SANITIZE_SPECIAL_CHARS);
    $mid=filter_input(INPUT_POST,"mid",FILTER_SANITIZE_SPECIAL_CHARS);
    $nid=filter_input(INPUT_POST,"nid",FILTER_SANITIZE_SPECIAL_CHARS);
    $eid=filter_input(INPUT_POST,"eid",FILTER_SANITIZE_SPECIAL_CHARS);
    $cert_by=filter_input(INPUT_POST,"cert_by",FILTER_SANITIZE_SPECIAL_CHARS);
    $sign_off=filter_input(INPUT_POST,"sign_off",FILTER_SANITIZE_SPECIAL_CHARS);
    $sign_date=filter_input(INPUT_POST,"sign_date",FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "INSERT INTO user_request(dept_name,date,surname,other_name,staff_status,pro_date,exp_date,train_confirm,access_type,role,head_approval,h_date,ic_approval,ic_date,sm_approval,sm_date,mis_approval,mis_date,s_assigned,mid,nid,eid,cert_by,sign_off,sign_date) 
    VALUES ('".$dept_name."','".$date."','".$surname."','".$other_name."','".$staff_status."','".$pro_date."','".$exp_date."','".$train_confirm."','".$access_type."','".$role."','".$head_approval."','".$h_date."','".$ic_approval."','".$ic_date."','".$sm_approval."','".$sm_date."','".$mis_approval."','".$mis_date."','".$s_assigned."','".$mid."','".$nid."','".$eid."','".$cert_by."','".$sign_off."','".$sign_date."')";

    $result = mysqli_query($conn, $sql);

    if($result){
        
        echo("<script>
        alert('Your access request was successfully');
        </script>");
    }else{
        echo("<script>
        alert('Oops! Something went wrong. Kindly try again or contact administrator');
        </script>"); 
    }


 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Access Request Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: Nunito;
        }
        .wrapper{
            width: 90%;
            margin:0px auto;
        }
        .ce{
            text-align: center;
        }

        table{
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        td{
            padding: 8px;
            border: 1px solid #ddd;
        }
        .sb{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .main{
            background: gray;
            color: white;
            padding:10px
        }
        .fbold{
            width: 40%;
            font-weight: bold;
            margin: 10px;
        }
        .sbold{
            font-weight: bold;
            padding: 15px;
        }
      
    </style>
</head>
<body>
    <form action="index.php" method="POST">
    <div class="wrapper">
        <h2 class="ce">USER ACCESS REQUEST FORM</h2>
        <table>
            <tr>
                <td colspan="6" class="main">DEPARTMENT DETAILS</td>
            </tr>
            <tr>
                <td colspan="4"> Name of Department/Unit Branch: <input type="text" name="dept_name" id="dept_name"></td>
                <td colspan="2"> Date: <input type="date" name="date" id="date"></td>
            </tr>
            <tr>
                <td colspan="6">Requesting Staff Name(Same as Official name with HR)/Designation:<br/><br/>
                    <div class="sb">
                        <div> <input type="text" name="surname" id="surname"><br/>(Surname)</div>
                        <div> <input type="text" name="other_name" id="other_name"> <br/>(Other names)</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    Staff Status &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="staff_status" id="permanent">&nbsp;Permanent
                    <input type="radio" name="staff_status" id="contract">&nbsp;Contract
                    <input type="radio" name="staff_status" id="national_service">&nbsp;National Service
                    <input type="radio" name="staff_status" id="intern">&nbsp;Intern
                    <input type="radio" name="staff_status" id="consultant">&nbsp;Consultant
                </td>
            </tr>
            <tr>
                <td colspan="3">Profile Expiry Date: <input type="date" name="pro_date" id="pro_date"></td>
                <td colspan="3"> HR/MIS/CARDS Confirmation Of Expiry Date: <input type="date" name="exp_date" id="exp_date"></td>
            </tr>
            <tr>
                <td colspan="6">HR T24 training Confirmation: <input type="radio" name="train_confirm" id="train_confirm" >&nbsp;Yes
                    <input type="radio" name="train_confirm" id="train_confirm" >&nbsp;No </td>
            </tr>
            <tr>
                <td colspan="6" class="main">REQUEST TYPE</td>
            </tr>
            <tr>
                <td colspan="6">
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;T24 Access
                    &nbsp;&nbsp;&nbsp;&nbsp; Hold On
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    Mandate Access&emsp;
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Read
                    &emsp;&emsp;&emsp;
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Write
                    &emsp;&emsp;&emsp;
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Delete
                </td>
            </tr>
            <tr>
                <td colspan="6"> 
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Access to Domain Controller (network)
                    <input type="checkbox"name="access_type"/>&nbsp;&nbsp;Email
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Moodys
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Laserfiche
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;SWIFT
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;AML
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;OPAY
                    <input type="checkbox" name="access_type"/>&nbsp;&nbsp;Custody System
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    HR Software&emsp;
                    <input type="checkbox"/>&nbsp;&nbsp;Human Resource (15,17,18,20)
                    &emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="checkbox"/>&nbsp;&nbsp;Payroll(15,17,18,20)
                    &emsp;&emsp;&emsp;
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    Role\Description (Type of Profile): <br/><textarea name="role" id="role" cols="50" rows="1 "></textarea><br/>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <br/>
                    <div class="sb">
                        <div>Head's Approval: <input type="text" name="head_approval" id="head_approval"></div>
                        <div>Date:  <input type="date" name="h_date" id="h_date"></div>
                    </div>
                    <br/><br/>
                    <div class="sb">
                        <div>Internal Control Approval: <input type="text" name="ic_approval" id="ic_approval"></div>
                        <div>Date: <input type="date" name="ic_date" id="ic_date"></div>
                    </div>
                    <br/><br/>
                    <div class="sb">
                        <div>Senior Management Approval: <input type="text" name="sm_approval" id="sm_approval"></div>
                        <div>Date: <input type="date" name="sm_date" id="sm_date"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="main">MIS USE - Access to Domain Server</td>
            </tr>
            <tr>
                <td colspan="6">
                    <br/>
                    <div class="sb">
                        <div>Head's Approval: <input type="text" name="mis_approval" id="mis_approval"></div>
                        <div>Date: <input type="date" name="mis_date" id="mis_date"></div>
                    </div>
                    <br/>
                    <div class="sb">
                        <div>Staff Assigned: <input type="text" name="s_assigned" id="s_assigned"></div>
                        <div>Moody's ID: <input type="text" name="mid" id="mid"></div>
                    </div>
                    <br/>
                    <div class="sb">
                        <div>Network ID: <input type="text" name="nid" id="nid"></div>
                        <div>E-mail ID: <input type="text" name="eid" id="eid"></div>
                    </div>
                    <br/>
                    <div>(Contact MIS for your password)</div>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="main">CERTIFICATION BY USER</td>
            </tr>
            <tr>
                <td colspan="6">
                    <br/>
                    <div class="sb">
                        <div>Date Tested & Certified By: <input type="text" name="cert_by" id="cert_by"></div>
                    </div>
                    <br/>
                    <div class="sb">
                        <div>Head of Dept's Sign Off:<input type="radio" name="signoff" id="signoff" >&nbsp;Yes
                            <input type="radio" name="signoff" id="signoff" >&nbsp;No </div>
                        <div>Date: <input type="date" name="sign_date" id="sign_date"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="sbold"> Consultant </td>
                <td colspan="3" class="sbold"> Senior Management  Approval Required</td>
            </tr>
            <tr>
                <td colspan="3" class="sbold"> Intern </td>
                <td colspan="3" class="sbold"> Senior Management  Approval Required</td>
            </tr>
            <tr>
                <td colspan="3" class="sbold"> National Service </td>
                <td colspan="3" class="sbold"> Senior Management  Approval Required</td>
            </tr>
            
            
                
            
            
        </table><br><br>
        <center>
            <button class="btn" type="submit">Submit Request</button>
        </center>
        <br><br>
    </div>
    </form>
</body>
</html>
