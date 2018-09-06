<?php 
    
    session_start(); 
        if (!isset($_SESSION['userid'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.html');
    }
    if ($_SESSION['Category']==1 OR $_SESSION['Category']==2) {
        $_SESSION['msg'] = "You dont have access";
        header('location: ../index.html');
    }
    if (isset($_GET['logout'])) {
        unset($_SESSION['userid']);     
        session_destroy();
        header("location: ../index.html");
    }
    include('../php/credentials.php');
    $db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

    if(mysqli_connect_error()){
            die ("Error Connecting.");
    }      
    $flag = 0;   
    $month = $_GET['month'];
    $year = $_GET['year'];
    $query = "SELECT * FROM `grv` WHERE month(datetime)=$month AND year(datetime) = $year";
    $results = mysqli_query($db,$query);
    switch ($month) {
                            case 1:
                                    $mon =  "January";
                                    break;
                            case 2:
                                    $mon = "February";
                                    break;
                            case 3:
                                    $mon = "March";
                                    break;
                            case 4:
                                    $mon = "April";
                                    break;
                            case 5:
                                    $mon = "May";
                                    break;
                            case 6:
                                    $mon = "June";
                                    break;
                            case 7:
                                    $mon = "July";
                                    break;
                            case 8:
                                    $mon = "August";
                                    break;
                            case 9:
                                    $mon = "September";
                                    break;
                            case 10:
                                    $mon = "October";
                                    break;
                            case 11:
                                    $mon = "November";
                                    break;
                            case 12:
                                    $mon = "December";
                                    break;
                            default:
                                    break;
                    }
?>
<style type="text/css">
h1 { padding: 0; margin-top: 20mm; color: #3E0682; font-size: 6mm; font-weight: bold; }
h3 { padding: 0; margin: 0;  color: grey; font-size: 5mm; }
	th,td{
		 text-align: left;
		 padding: 1mm;
		 width: 16%;
		 border : solid .2mm black
	}
	table{
		border-collapse: collapse;
		
	}
    table.page_footer {
    	width: 100%; 
    	border: none; 
    	background-color: #cccccc;
    	border-top: solid 1mm black; 
    	padding: 1mm}
</style>

<page backtop="45mm" backbottom="14mm" style="font-family: helvetica;">
    <page_footer >
    	<table class="page_footer">
            <tr>
                <td style="border: none; width: 50%; text-align: left">
                    <?php echo date("d/m/Y"); ?>
                </td>
                <td style="border: none; width: 50%; text-align: right">
                   Page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table> 
    </page_footer>
    <page_header style="font-family: helvetica; ">
    <div style="text-align: center; color: #2A3375">
		<h1>SREE CHITRA THIRUNAL COLLEGE OF ENGINEERING</h1>
	</div>
    <div style="text-align: center; color: grey">
		<H3><?php echo ($mon." ".$year) ?> Grievance Report</H3>
	</div>
	</page_header>
	<!-- table -->
    <table style="width: 90%; margin-top:10mm ;" align="center">
    	<thead>
            <tr style="background: #cccccc">
            	<th class = "data">SL NO</th>
                <th class = "data">Submission <BR> Date</th>
                <th class = "data">Submitted By</th>
                <th class = "data">Complaint About</th>
                <th class = "data">Description</th>
                <th class = "data">Status</th>
            </tr>
        </thead>
        <?php $i = 1 ; while($row = mysqli_fetch_array($results)): ?>
        <tbody>
            <tr>
            	<td class = "data"> <?php echo $i ?> </td>
                <td class = "data"> <?php echo $row['datetime']; ?></td>
                <td class = "data"> <?php echo $row['username'].', '.$row['semester'].', '.$row['dept']; ?></td>
                <td class = "data"> <?php echo $row['sub']; ?></td>
                <td class = "data"> <?php echo $row['description']; ?></td>
                <td class = "data">                      
                        <?php 
                                if($row['done']==1)
                                    echo $row['reply'];
                                else
                                    echo "Not replied";
                        ?>
                </td>
            </tr>
        </tbody>
        <?php 
                $flag = 1;
                $i++; 
            endwhile; ?>
    </table>
    <?php if(!$flag): ?>
            <div style="text-align: center;">
               <H2 style = "color: black;"> No entry this month. </H2>
            </div>
    <?php endif; ?>
</page>