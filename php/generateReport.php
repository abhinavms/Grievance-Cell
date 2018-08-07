<?php 
    include('../php/credentials.php');
    $db = mysqli_connect($host, $access_username, $access_password, $database_grievance);

    if(mysqli_connect_error()){
            die ("Error Connecting.");
    }           
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
<style>

            th, td {
                text-align: left;
                padding: 10px;
                padding-left:20px;
                width: 20%;
            }

            tr:nth-child(even) {background-color: #f2f2f2;}
            tr:nth-child(odd) {background-color: white;}
</style>
<page >
    <!--<page_header>-->
    <br><br>
    <H1 style="text-align: center"><?php echo $mon ?> Grievance Report</H1>
    <!--   </page_header>
     <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left;    width: 50%"></td>
                <td style="text-align: right;    width: 50%"></td>
            </tr>
        </table>
    </page_footer>
    -->
    <br>
    <br><br>
    <table style="width: 100%;" align="center">
            <tr style="background: #cccccc">
                <th>Submission Date</th>
                <th>Submitted By</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Reply</th>
            </tr>

        <?php while($row = mysqli_fetch_array($results)): ?>

            <tr style="background: #f2f2f2">
                <td> <?php echo $row['datetime']; ?></td>
                <td> <?php echo $row['username']; ?></td>
                <td> <?php echo $row['sub']; ?></td>
                <td> <?php echo $row['description']; ?></td>
                <td>                      
                        <?php 
                                if($row['done']==1)
                                    echo $row['reply'];
                                else
                                    echo "Not replied";
                        ?>
                </td>
            </tr>

        <?php endwhile; ?>

    </table>
    <br>
</page>