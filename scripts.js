function sign()
            {
        var x = document.getElementById("signup");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
            }
            function closesign()
            {
              document.getElementById("signup").style.display = "none"; 
            }
            function closelogin()
            {
              document.getElementById("login").style.display = "none"; 
            }
            
            function register_open()
            {
                var x= document.getElementById("signup");
                var y= document.getElementById("login");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    y.style.display = "none";
                  } else {
                    x.style.display = "none";
                  }
                }
                  function login_open()
                  {
                var x= document.getElementById("login");
                var y= document.getElementById("signup");
                if (x.style.display === "none") {
                    x.style.display = "block";
                    y.style.display = "none";
                  } else {
                    x.style.display = "none";
                  }
                }
                function backhomepage()
                {
                  if (window.confirm('If you click "ok" you would be redirected . Cancel will load this website ')) 
                  {
                  window.location.href='https://www.google.com/chrome/browser/index.html';
                  };
                }