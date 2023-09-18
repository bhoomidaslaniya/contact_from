function validateForm() {
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var issue = document.getElementById("issue").value;
	var comment = document.getElementById("comment").value;

	// Define a regular expression for email validation
	var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

	// Reset error messages
	document.getElementById("nameError").textContent = "";
	document.getElementById("emailError").textContent = "";
	document.getElementById("issueError").textContent = "";
	document.getElementById("commentError").textContent = "";

	var isValid = true;

	// Validate Name
	if (name.trim() === "") {
		document.getElementById("nameError").textContent = "Name is required.";
		isValid = false;
	}

	// Validate Email
	if (!emailRegex.test(email)) {
		document.getElementById("emailError").textContent =
			"Invalid email address.";
		isValid = false;
	}

	// Validate Issue
	if (issue === "") {
		document.getElementById("issueError").textContent =
			"Please select an issue.";
		isValid = false;
	}

	// Validate Comment
	if (comment.trim() === "") {
		document.getElementById("commentError").textContent =
			"Comment is required.";
		isValid = false;
	}

	return isValid;
}