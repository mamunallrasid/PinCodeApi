<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>API Integration</title>
    <style>
        .card-body{
            font-size:20px;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info">
                  <h2 style="color:white;"> Fetching Pincode Detalis </h2>
                </div>
                <div class="card-body">
                     <form id="pin_data" action="alldata.php" method="POST">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Enter Your Name</label>
                              <input type="name" name="Name" class="form-control" id="Name" aria-describedby="emailHelp" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">DOB</label>
                              <input type="date" name="DOB" class="form-control" id="DOB" aria-describedby="emailHelp" required onblur="calculateAge()">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Your Age</label>
                              <input type="text" name="Age" class="form-control" id="yourage" aria-describedby="emailHelp"  readonly>
                          </div>
                        </div>
                       <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Village Name</label>
                              <input type="text" name="village" class="form-control" id="village" aria-describedby="emailHelp" required >
                          </div>
                        </div>

                        <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Enter Pin No:</label>
                            <input type="number" name="pin" class="form-control" id="pin" aria-describedby="emailHelp" onblur='checquepin(this.value)' required >
                            <span id="msg"></span>
                         </div>
                        </div>

                        <div class="col-md-4">
                        <label for="exampleInputEmail1">Select Your GP</label>
                        <div class="form-group">
                            <select class="form-select" aria-label="Default select example" id="totalgp" name="GP">
                            <option selected>Select Your Grampanchayet</option>
                          </select>
                        </div>
                        </div>

                        <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Block</label> 
                            <input type="text" name="Block" class="form-control" id="Block" aria-describedby="emailHelp" readonly>
                         </div>
                        </div>

                        <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputEmail1">District</label>
                            <input type="text" name="District" class="form-control" id="District" aria-describedby="emailHelp" readonly>
                         </div>
                        </div>
                        <div class="col-md-12">
                        <div class="col-md-4" style="margin-top:37px;">
                        <input  type="submit" name="Submit"  id="submit" class="btn btn-primary">
                        </div>
                       </div>
                      </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    $(document).ready()
    {
       function checquepin(pin)
       {
        $("#msg").html("Plaease Wait...");
        $("#pin").attr('disabled',true)
        let pinno=pin;
        alert(pinno);
        $.ajax({
            url:"detalis.php",
            type:"post",
            dataType:"json",
            data:{pincode:pinno,action:"find"},
            success:function(response){
            $("#totalgp").html(response.Grampanchayet);
            $("#Block").val(response.Block);
            $("#District").val(response.District);
            $("#msg").html("");
            $("#pin").attr('disabled',false);
            }
        });
       }
          
    };
</script>
<script>  
  
  function calculateAge() {
  const birthdate = new Date(document.getElementById("DOB").value);
  const today = new Date();

  const diffInMilliseconds = today - birthdate;
  const diffInYears = diffInMilliseconds / (1000 * 60 * 60 * 24 * 365.25);
  const years = Math.floor(diffInYears);
  
  const diffInMonths = (diffInYears - years) * 12;
  const months = Math.floor(diffInMonths);
  
  const diffInDays = (diffInMonths - months) * (365.25 / 12);
  const days = Math.floor(diffInDays);

  document.getElementById("yourage").value = years + " years, " + months + " months, " + days + " days";
}


</script>  