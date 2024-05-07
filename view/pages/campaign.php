<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Campaign</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    <link href="../css/campaign.css" rel="stylesheet">

</head>
<body>
      
     <?php  
     require("C:/xampp/htdocs/INF06/FundWings_Web_App/control/control.php");
 
     ?>
    <script type="text/javascript">
        (function(d, t) {
            var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
            v.onload = function() {
              window.voiceflow.chat.load({
                verify: { projectID: '65e335035671df3be500c724' },
                url: 'https://general-runtime.voiceflow.com',
                versionID: 'production'
              });
            }
            v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
        })(document, 'script');
      </script>
    <nav class="navbar navbar-expand-lg">
        <img src="../image/icon.png" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donation.html">Campaigns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="campaign.php">Initiate a Campaign</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="video-container">
                    <iframe width="560" height="315" src="../image/create2.mp4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <h3>Create Campaign Form</h3>
                <hr>
                <form action="" method="post">
                <div class="form-group">
                        <label class="form-label">Image:</label>
                        <input type="file" class="form-control" name="Image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="Title" placeholder="Enter Title" onkeydown="return /[a-zA-Z\s]/i.test(event.key)" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description:</label>
                        <input type="text" class="form-control" name="Description" placeholder="Enter Description" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Target Fund:</label>
                        <input type="text" class="form-control" name="TargetFund" placeholder="Enter Target Fund" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">End Date:</label>
                        <input type="date" class="form-control" name="EndDate" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Metamask Account:</label>
                        <input type="text" class="form-control" name="MetamaskAccount" placeholder="Enter Metamask Account" required>
                    </div>
                    <div class="form-group">
                    <label class="form-label">category:</label>
                    <br>
                    <input type="radio" id="option1" name="options" value="1">
                    <label for="option1">Sport</label><br>
                    <input type="radio" id="option2" name="options" value="2">
                    <label for="option2">Medcine</label><br>
                    <input type="radio" id="option3" name="options" value="3">
                    <label for="option3">charities</label><br>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Addtional Email:</label>
                        <input type="text" class="form-control" name="addemail" placeholder="Enter the Email Address" required>
                    </div>
                     
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit" value="Save">
                        <a href="homepage.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section id="faq">
        <div class="container">
            <h3 class="text-center text mb-4">Frequently Asked Questions</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ask a question..." id="userQuestion">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="askQuestion()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="answers" class="text"></div>
        </div>
    </section>

     
    <footer class="footer mt-5">
        <div class="container-fluid bg-dark text-light py-3">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    <p>&copy; 2024 Fundwings. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxUH/bIkW4u9l8O9XGuXz4vwjT2E67yMubR8uMhsj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Q+spYE38nnp1U5q4pZmZymPqaaqCSlHLj2OifhVVIPpzfj" crossorigin="anonymous"></script>

    <script>
        function askQuestion() {
            var userQuestion = document.getElementById("userQuestion").value;
            var answersDiv = document.getElementById("answers");
            var answerText = "";

            if (userQuestion.trim() === "") {
                alert("Please enter a valid question.");
                return;
            }

            switch (userQuestion.toLowerCase()) {
                case "how do i create a campaign?":
                    answerText = "To create a campaign, fill out the form on this page and click 'Save'.";
                    break;
                case "what is the target fund?":
                    answerText = "The target fund is the amount of money you aim to raise for your campaign.";
                    break;
                case "how do i set the end date?":
                    answerText = "You can set the end date by selecting a date from the calendar input field.";
                    break;
                default:
                    answerText = "Unfortunately, we don't have an answer for that question at the moment.";
                    break;
            }

            answersDiv.innerHTML = "<p><strong>Your question:</strong> " + userQuestion + "</p>" +
                "<p><strong>Answer:</strong> " + answerText + "</p>";
        }
    </script>
     
</body>
</html>
