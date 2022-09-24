  <?php
  include 'db_conn.php';
  $query_l = $conn->query(" select distinct(source) from schedule;");
  // $result=$query_l->fetchAll();
  // echo '<pre>';
  // print_r($result);
  // $query_2=$conn->query("select distinct(to_terminal) from route where ")
  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Let's Go</title>
    <link rel="stylesheet" href="seats.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#source").on("change", function() {
          // console.log("clicked");
          var select = $("#source").val();
          // alert(select);
          // var fdata = {
          //   'name':'Ali',
          //   'roll_no':123
          // };
          if (select != "") {
            $.ajax({
              url: 'after_login_dest.php',
              type: 'POST',
              data: {
                input: select
              },
              success: function(data) {
                //  console.log(data);
                $("#destination").html(data);

              }


            });
          } else {
            $("#destination").html("");
          }










        });
      });
    </script>

  </head>

  <body>
    <form id="login" action="after_submit_login.php" method="post">
      <h1>Book here</h1>
      <div class="">
        <?php
        echo '<select id="source" name="source">'; // Open your drop down box
        // Loop through the query results, outputing the options one by one
        echo '<option value=1>selcet source </option>';
        while ($row = $query_l->fetch(PDO::FETCH_ASSOC)) {
          echo '<option value="' . $row['source'] . '">' . $row['source'] . '</option>';
        }

        echo '</select>'; // Close your drop down box


        ?>
      </div>
      <select id="destination" name="destination">
        <option value="">Select destination</option>
      </select>
      <div typr="textbox">
        <input type="date" id="date-input" name="date-input" required>


      </div>
      <input id="submit" type="submit" value="submit">
    </form>
  </body>

  </html>