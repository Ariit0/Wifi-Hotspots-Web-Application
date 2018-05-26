<form action="write_review.php" method="post" onsubmit="return ValidateReviewForm_Client(this);">
	<p>
        Rating*<br>
        <select name="rating" class= 'ratingfilter'>
        	<option value="1">1&nbsp;&#xf005;</option><br>
        	<option value="2">2&nbsp;&#xf005;</option><br>
        	<option value="3">3&nbsp;&#xf005;</option><br>
        	<option value="4">4&nbsp;&#xf005;</option><br>
        	<option value="5">5&nbsp;&#xf005;</option><br>
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