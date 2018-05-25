<form action="write_review.php" method="post" onsubmit="return ValidateReviewForm_Client(this);">
	<h2>(Name of Wifi Hotspot here)</h2>

	<p>
        Rating*<br>
        <select name="rating">
        	<option value="1">1</option><br>
        	<option value="2">2</option><br>
        	<option value="3">3</option><br>
        	<option value="4">4</option><br>
        	<option value="5">5</option><br>
        </select><br><br>
	</p>

	<p>
        Description* <br>
        <textarea id="description" name="description" rows="6" cols="30" onchange="OnChangeElement('descriptionError')";" onkeypress="OnChangeElement('descriptionError')";"></textarea>
        <span id="descriptionError" class="error-message"> Description error goes here.</span><br>
	</p>

	<br>

    <input type="submit" name="Submit" value="Submit Review">
</form>