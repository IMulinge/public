<?php
require("header.php");
?>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="submit.js"></script>
</head>
<body>
  <form id="myForm" method="post">
     Name:    <input name="name" id="name" type="text" /><br />
     Email:   <input name="email" id="email" type="text" /><br />
     Phone No:<input name="phone" id="phone" type="text" /><br />
     Gender:  <input name="gender" type="radio" value="male">Male
	      <input name="gender" type="radio" value="female">Female<br />


    <input type="button" id="submitFormData" onclick="SubmitFormData();" value="Submit" />
   </form>
   <br/>
   Your data will display below..... <br />
   ==============================<br />
   <div id="results">
   <!-- All data will display here  -->
   </div>
</body>



<?php
require("footer.php");
?>