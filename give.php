<?PHPrequire_once("./include/membersite_config.php");?><html><head>  <meta charset='UTF-8'>  <link href='../stylesheet1.css' rel='stylesheet'>  <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>  <Title>Give a Cup</Title></head><body>    <div id='navBar'><ul><a href='../home'>      <a href='http://www.codex209.com/~prodapp/home.html'>          <li style="padding-right: 40px;"><img src="../cupOfSugarLogo1.jpg" /></li>      </a>        <li><a href="http://www.codex209.com/~prodapp/source/give.php">Give to Organizations</a></li>        <li><a href="http://www.codex209.com/~prodapp/source/login.php">Organization Log-in/Sign-Up</a></li>    </div>    <style>label.thick {font-weight: bold;} form {box-shadow: 10px 10px 5px #888888; padding: 5px;     margin-right:25px; margin-left:25px;} div {margin-top:100px;}    h1 {color: #ff7f50;text-align: center; padding-left: 25px; padding-right: 20px; padding-top: 5px;}     </style>    <div id='Filters'/>        <?PHP           $servername = $fgmembersite->GetDBHost();    $username = $fgmembersite->GetDBUser();    $password = $fgmembersite->GetDBPass();    $dbname = $fgmembersite->GetDB();    $pullType = $_POST['txType'];    $pullOrg = $_Post['txtOrg'];    $pullCity = $_Post['txCity'];    $selOrg = $_Post[''];    // Create connection    $conn = new mysqli($servername, $username, $password, $dbname);        // Check connection    if ($conn->connect_error) {        die('Connection failed: ' . $conn->connect_error);    }     //default pull for initial load of the page. will re-pull as clear/submit buttons are used based on filter criteria    $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,         needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription,         fgusers3.contactName, fgusers3.phoneNumber,        fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode        FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name         ORDER BY id DESC";     $result = $conn->query($sql);          //apply filter criteria to variables and then to the query results of the needs by filter        if (isset($_POST['SubmitApply'])) {      $pullCity = isset($_POST['txCity']) ? $_POST['txCity'] : false;      $pullOrg = isset($_POST['txOrg']) ? $_POST['txOrg'] : false;      $pullType = isset($_POST['txType']) ? $_POST['txType'] : false;             switch (true) {        case $pullType === 'All' && $pullCity === 'All' && $pullOrg === 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               ORDER BY id DESC";           $result = $conn->query($sql);        break;        case $pullType != 'All' && $pullCity === 'All' && $pullOrg === 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND needs.needtype = '$pullType'               ORDER BY id DESC";           $result = $conn->query($sql);        break;        case $pullType != 'All' && $pullCity != 'All' && $pullOrg === 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND needs.needtype = '$pullType' AND fgusers3.orgCity = '$pullCity'              ORDER BY id DESC";           $result = $conn->query($sql);        break;        case $pullType != 'All' && $pullCity != 'All' && $pullOrg != 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND needs.needtype = '$pullType' AND fgusers3.orgCity = '$pullCity' AND fgusers3.name = '$pullOrg'              ORDER BY id DESC";           $result = $conn->query($sql);        break;                            case $pullType === 'All' && $pullCity != 'All' && $pullOrg === 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND fgusers3.orgCity = '$pullCity'              ORDER BY id DESC";           $result = $conn->query($sql);        break;        case $pullType === 'All' && $pullCity != 'All' && $pullOrg != 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND fgusers3.orgCity = '$pullCity' AND fgusers3.name = '$pullOrg'              ORDER BY id DESC";           $result = $conn->query($sql);        break;        case $pullType === 'All' && $pullCity === 'All' && $pullOrg != 'All':          $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,               needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,              fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode              FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name               AND fgusers3.name = '$pullOrg'              ORDER BY id DESC";           $result = $conn->query($sql);        break;                        }    }    //clear filter and query all current needs      if (isset($_POST['ClearApply'])) {      $pullType = 'All';      $pullCity = 'All';      $pullOrg = 'All';      $sql = "SELECT needs.id, needs.organization_name, needs.needtype, needs.needsubtype, needs.description, needs.deadline, needs.starttime,           needs.numhours, needs.contact_firstname, needs.contact_lastname, needs.phone, needs.email, fgusers3.name, fgusers3.orgDescription, fgusers3.contactName, fgusers3.phoneNumber,          fgusers3.email, fgusers3.address1, fgusers3.address2, fgusers3.orgCity, fgusers3.orgState, fgusers3.orgZipCode          FROM needs INNER JOIN fgusers3  ON needs.organization_name=fgusers3.name           ORDER BY id DESC";       $result = $conn->query($sql);    }      $sql_CityList = 'SELECT DISTINCT orgCity FROM fgusers3 ';    $result_CityList = $conn->query($sql_CityList);    $sql_OrgList = 'SELECT DISTINCT name FROM fgusers3 ';    $result_OrgList = $conn->query($sql_OrgList);            echo "</head>        <h3 >Give</h3>     <h6>Meet needs in your Community</h6>    <form name ='form1' METHOD ='POST' ACTION ='give.php' style='background-color:#e5ffff;'>       <label class = 'thick' name='lblType'>Type of Request:</label>      <select name='txType'  style='max-width:10%;'>        <option selected value='All'> -- All -- </option>        <option "; if ($pullType === 'Goods') {          echo "selected ";          }          echo "value='Goods'>Goods</option>        <option "; if ($pullType === 'Services') {          echo "selected ";          }          echo "value='Services'>Services</option>      </select>      &nbsp;      &nbsp;      <label class= 'thick' Name ='lblCity'>City:</label>      &nbsp;      <select name='txCity' style='max-width:10%;'>";        echo "<option selected value='All'> -- All -- </option>";        if ($result_CityList->num_rows > 0) {        // output data of each row - Displays each current request in their own form box, with options to click buttons to see          //more detail          while($row = $result_CityList->fetch_assoc()) {            echo "<option "; if ($pullCity === $row["orgCity"]) {              echo "selected";              }            echo " value='".$row["orgCity"]."'>".$row["orgCity"]."</option>";          }          echo "</select>";        }        else {          echo "<label class= 'thick' Name ='lblCity'>City: No Results</label>";            }        echo "</select>        &nbsp;        &nbsp;        <label class= 'thick' Name ='lblOrg'>Organization:</label>        <select name='txOrg' style='max-width:10%;'>";          echo "<option selected value='All'> -- All -- </option>";          if ($result_OrgList->num_rows > 0) {          // output data of each row - Displays each current request in their own form box, with options to click buttons to see            //more detail            while($row = $result_OrgList->fetch_assoc()) {              echo "<option "; if ($pullOrg === $row["name"]) {                echo "selected";                }              echo " value='".$row["name"]."'>".$row["name"]."</option>";            }            echo "</select>";          }          else {            echo "<label class= 'thick' Name ='lblCity'>City: No Results</label>";              }        echo "</select>      <INPUT TYPE = 'Submit' Name = 'SubmitApply'  VALUE = 'Apply Filter'>      &nbsp;      <INPUT TYPE = 'Submit' Name = 'ClearApply'  VALUE = 'Clear Filters'>    </form>";    if ($result->num_rows > 0) {    // output data of each row - Displays each current request in their own form box, with options to click buttons to see    //more detail      while($row = $result->fetch_assoc()) {        echo "<form name='".$row["needs.id"]."needresults'>          <label class='thick' name='".$row["needs.id"]."orgName'>Organization Name: ".$row["organization_name"]."</label>          <br />          <label name='".$row["needs.id"]."needtype'>Request Type: ".$row["needtype"]."</label>          <label name='".$row["needs.id"]."needsupbtype'> / ".$row["needsubtype"]."</label>          <br />          <label name='".$row["needs.id"]."deadline'>Date / Deadline: ".$row["deadline"]."</label>          <br />          <label name='".$row["needs.id"]."description'>Details: ".$row["description"]."</label>          <br />          <label name='".$row["needs.id"]."firstname'>Contact: ".$row["contact_firstname"]."</label>          <label name='".$row["needs.id"]."lastname'> ".$row["contact_lastname"]."</label>          <br />          <label name='".$row["needs.id"]."email'>E-Mail: ".$row["email"]."</label>          <label name='".$row["needs.id"]."phone'>     Phone: ".$row["phone"]."</label>        </form>";      }  } else {      echo "0 results";  }echo "<p2>**All listed requests are Demonstration Data only</p2>";$conn->close();?></html>