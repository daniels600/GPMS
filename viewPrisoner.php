<?php

require_once('config/db_conn.php');

if (isset($_GET['id'])) {
  $prisonerId = $_GET['id'];



  $sql1 = "SELECT * from prisoner where Prisoner_id = '$prisonerId'";
  $sql2 = "SELECT * from Prisoner_case where Prisoner_id = '$prisonerId'";


  $result = mysqli_query($conn, $sql1);
  $record =  mysqli_query($conn, $sql2);

  if (isset($result)) {
    $n = mysqli_fetch_assoc($result);
    $fname = $n['Prisoner_fname'];
    $lname = $n['Prisoner_lname'];
    $prison_name = $n['Prison_name'];
    $pComplexion = $n['P_complexion'];
    $dob = $n['DOB'];
    $Marital_Status = $n['Marital_Status'];
    $Height_feets = $n['Height_feets'];
    $Weight_kg = $n['Weight_kg'];
    $Sex = $n['Sex'];
    $cell_block = $n['cell_block'];
    $Nationality = $n['Nationality'];
    $Prisoner_tel = $n['Prisoner_tel'];
    $Next_of_Kin_fname = $n['Next_of_Kin_fname'];
    $Next_of_Kin_lname = $n['Next_of_Kin_lname'];
    $Next_of_Kin_Rel = $n['Next_of_Kin_Rel'];
    $Eye_color = $n['Eye_color'];
    $Prisoner_status = $n['Prisoner_status'];
    $address_street = $n['address_street'];
    $address_city = $n['address_city'];
    $address_region = $n['address_region'];
    $address_postal_code = $n['address_postal_code'];
    $image = $n['image'];
    $imageSrc = '.'  . '/' . $image;
    $policeID = $n['P_Officer_Id'];
  }
}
if (isset($record)) {
  $row = mysqli_fetch_assoc($record);
  $Latest_Possible_Date = $row['Latest_Possible_Date'];
  $caseId = $row['Case_id'];
}

$sql3 = "SELECT * from Cases where Case_id = '$caseId'";
$case_record =  mysqli_query($conn, $sql3);

if (mysqli_num_rows($case_record) > 0) {
  $m = mysqli_fetch_assoc($case_record);
  $magFname = $m['Magistrate_fname'];
  $magLname = $m['Magistrate_lname'];
  $court = $m['Court_of_commital'];
  $crime = $m['crime_committed'];
  $catOffence = $m['Category_of_Offence'];
  $caseStartDate = $m['case_start_date'];
  $caseEndDate =  $m['case_end_date'];
  $crimeTime =  $m['Crime_time'];
  $dateCrime = $m['Crime_date'];
  $sentence = $m['sentence_length_Years'];
}

$sql4 = "SELECT * from Police_Officer where P_Officer_Id = '$policeID'";
$officerRecords = mysqli_query($conn,$sql4);

if(mysqli_num_rows($officerRecords) > 0){
  $x = mysqli_fetch_assoc($officerRecords);
  $officerFname = $x['P_fname'];
  $officerLname = $x['P_lname'];
  $serviceId = $x['Service_ID'];
  $officerContact = $x['Officer_contact'];
  $stationContact = $x['Station_Tel'];
  $ranks = $x['Ranks'];
  $stationName = $x['Police_Station'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="styles.css">
  <title>View Details</title>
  <link rel="icon" href="images/imageedit_28_3939584200.png" type="image/png">
</head>

<body>
  <br />
  <div class="container emp-profile">
    <div class="row">
      <div class="col-md-4">
        <div class="profile-img">
            <img src="<?php echo $imageSrc; ?>" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="profile-head">
          <h3>
            <?php echo 'Name: '.$fname . ' ' . $lname; ?>
          </h3>
          <h3>
            <p>Inmate Status: <?php echo $Prisoner_status; ?></p>
          </h3>
          <h3>
            <p>Accused Crime: <?php echo $crime; ?></p>
          </h3>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Case Details</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary" href="prisoner.php" role="button">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">

      </div>
    </div>
    <div class="col-md-8">
      <div class="tab-content profile-tab" id="myTabContent" style='padding-left:40%; text-align:center;font-size:large'>
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-md-6">
              <label><strong>Nationality</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Nationality; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Gender</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php if($Sex== 'M'){echo 'Male';}else{echo 'Female';} ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Date of Birth</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $dob; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Marital Status</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Marital_Status; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Contact</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Prisoner_tel; ?></p>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <label><strong>Height</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Height_feets.' feet'; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Weight</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Weight_kg.' pounds'; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Kin's Name</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Next_of_Kin_fname.' '.$Next_of_Kin_lname; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Kin's Relation</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $Next_of_Kin_Rel; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Address</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $address_street.' '.$address_city.' '.$address_region.' '.$address_postal_code; ?></p>
            </div>
          </div>
          <hr/>
        </div>
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" style='padding-left:40%; text-align:center'>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Magistrate Name</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $magFname.' '.$magLname; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Court of Committal</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $court; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Category of Offence</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $catOffence; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Date of Crime</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $dateCrime; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Time of Crime</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $crimeTime; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Case start date</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $caseStartDate; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong> end date</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $caseEndDate; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Sentence Period</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $sentence.' Months'; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Officer Name</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo  $officerFname.' '. $officerLname; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Officer's Rank</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $ranks; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Service ID</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $serviceId; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Station Contact</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $stationContact; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Officer Contact</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $officerContact; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label><strong>Police Station Name</strong></label>
            </div>
            <div class="col-md-6">
              <p><?php echo $stationName; ?></p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  </div>
</body>

</html>