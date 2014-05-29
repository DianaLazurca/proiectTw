<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <title>Reservation</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  <script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      minDate: 0,
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
       minDate: 0,
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>


<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["from"].value;
if (x==null || x=="")
  {
  alert("you must enter your check in Date(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["to"].value;
if (y==null || y=="")
  {
  alert("you must enter your check out Date(click the calendar icon)");
  return false;
  }
}
</script>
</head>
<body>
 <h1>RESERVATION</h1>
 
<form method="post" action="selectroom.php" name="index" onsubmit="return validateForm()">
  
    <label style="margin-left: 15px;"><b>Start Date : <b/></label>
      <input type="text" name="from" id="from">
    <br>
	 <label style="margin-left: 15px;"><b>End Date : </b></label>
     	<input type="text" name="to" id="to">
	  <br>
	  <label style="margin-left: 45px;"><b>Adult :</b> </label>
	  <select name="adult" class="ed">
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		  <option>more</option>
		</select><br>
	  
	  <label style="margin-left: 44px;"><b>Child:  </b></label>
		<select name="child" class="ed">
		  <option>0</option>
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		  <option>more</option>
		</select><br>

     <label style="margin-left: 44px;"><b>Amenties:  </b></label>
    <select name="child" class="ed">
      <option>Air Conditioning</option>
      <option>Free Breakfast&Cofee</option>
      <option>City-Wide taxi Service</option>
      <option>more</option>
    </select><br>
	  <input name="" type="submit" value="Check Availability" id="button">
  </form>
    <div id="ceva" ><br />
      <a id="ceva1" rel="facebox" href="modifyindex.php"><b>Modify</b></a> <b>/</b> <a id="ceva2" href="cancelindex.php"><b>Cancel</b></a><b> Reservation</b>   </div>
  </div>
 
</body>
</html>



