<?php

	$contentVar = $_POST['contentVar'];
	if($contentVar=="MCQ")
	{
		echo "<p>Choices</p>";
		echo "<table id = \"choices\" style=\"width: 90%\">";
		echo "<colgroup>
	       		<col span=\"1\" style=\"width: 2%;\">
	      		 <col span=\"1\" style=\"width: 98%;\">
	      	</colgroup>";
		echo "<tr>
				    <td>(a)</td>
				    <td> <input type=\"text\" id=\"optionA\" name=\"optionA\" style=\"width: 95%;\"></td>
				  </tr>
				<tr>
				    <td>(b)</td>
				    <td> <input type=\"text\" id=\"optionB\" name=\"optionB\" style=\"width: 95%;\"></td>
				  </tr>
				<tr>
				    <td>(c)</td>
				    <td> <input type=\"text\" id=\"optionC\" name=\"optionC\" style=\"width: 95%;\"></td>
				  </tr>
				<tr>
				    <td>(d)</td>
				    <td> <input type=\"text\" id=\"optionD\" name=\"optionD\" style=\"width: 95%;\"></td>
				  </tr>
			</table>";
		echo "
				<label for=\"correctAns\">Correct Answer:</label>
				<select name=\"correctAns\" id=\"correctAns\">
		 			 <option value=\"A\">A</option>
		  			 <option value=\"B\">B</option>
		 			 <option value=\"C\">C</option>
		 			 <option value=\"D\">D</option>
				</select>
		";
	}
	else if($contentVar=="T/F")
	{
		echo "<p>Choices</p>";
		echo "<table id = \"choices\" style=\"width: 90%\">";
		echo "<colgroup>
	      		 <col span=\"1\" style=\"width: 100%;\">
	      	</colgroup>";
		echo "<tr>
				    <td>True</td>
				  </tr>
				<tr>
				    <td>False</td>
				  </tr>
			</table>";
		echo "
				<label for=\"correctAns\">Correct Answer:</label>
				<select name=\"correctAns\" id=\"correctAns\">
		 			 <option value=\"T\">T</option>
		  			 <option value=\"F\">F</option>
				</select>
		";
	}
	else if($contentVar=="short")
	{
		echo "<label for=\"correctAns\">Correct Answer:</label>";
		echo "<input type=\"text\" id=\"correctAns\" name=\"correctAns\" style=\"width: 95%;\">";
	}


?>