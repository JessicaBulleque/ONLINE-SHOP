
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title> Team Payaman | Dashboard </title>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- aJax jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
</head>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Giyang Clothing', 300],
          ['ViyLine', 100],
          ['Boss Apparel', 150],
          ['Cong Clothing', 175],
          ['WLKJN', 50]
        ]);

        // Set chart options
        var options = {'title':'Team Payaman Brands Ranking',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<body>

    <div class="admin-container">
        <div class="admin-panel">
            <div class="admin-header">
                <h2>Team Payaman</h2><br>
                
            </div>
        
           
           <div class="admin">
               <div class="admin-profile">
                    <img src="../image/user-profile/default-profile.jpg" alt="">
                    <p> Jessica Bulleque </p>
               </div>
                <hr>
                <ul>
                    <li style="background-color: rgba(0, 0, 0, 0.5);" class="dashboard">
                        <img src="../admin/icons/home.png" alt="">
                        <a href="../admin/dashboard.php"> Dashboard </a>
                    </li>
                    <li class="customer">
                        <img src="../admin/icons/customers.png" alt="">
                        <a> Customers </a>
                    </li>
                    <li class="category">
                        <img src="../admin/icons/category.png" alt="">
                        <a> Category </a>
                    </li>
                    <li class="products">
                        <img src="../admin/icons/products.png" alt="">
                        <a> Products </a>
                    </li>
                    <li class="orders">
                        <img src="../admin/icons/orders.png" alt="">
                        <a> Orders </a>
                    </li>
                    <li class="shipment">
                        <img src="../admin/icons/shipment.png" alt="">
                        <a> Shipment </a>
                        
                    </li>
                   
                </ul>
           </div>
           <div class="settings">
                <h3> Settings </h3>
                <ul>
                    <li>
                        <img src="../admin/icons/settings.png" alt="">
                        <a href="#"> Settings </a>
                        
                    </li>
                    <li>
                        <img src="../admin/icons/account.png" alt="">
                        <a href="#"> My Account </a>
                       
                    </li>
                </ul>
           </div>

           
           <div class="admin-footer">
               <p> &copysr; TEAM PAYAMAN &bullet; 2021 </p>
           </div>

        </div>


        <div class="content-container">

            <div class="admin-header">
                
                <div class="title">
                    <h1> DASHBOARD </h1>
                </div>
                <div class="logout">
                <a href="#"><img src="../admin/icons/logout.png" alt=""></a>
                </div>

                

            </div>




            <!-- FOR SUMMARY DASHBOARD -->
            <div class="admin-content">
                
                <div class="content-summary">
                    <div class="summary-box booking">
                        
                        <div class="count-box">
                        <h1> 600 </h1>
                        </div>
                        <div class="label">
                            
                            <h3> Customers </h3>
                        </div>
                    </div>
                    <div class="summary-box customer">
                        
                        <div class="count-box">
                        <h1>500 </h1>
                        </div>
                        <div class="label">
                            
                            <h3> Products</h3>
                        </div>
                    </div>
                    <div class="summary-box movie">
                        
                        <div class="count-box">
                            <h1> 800 </h1>
                        </div>
                        <div class="label">
                            
                            <h3> Orders </h3>
                        </div>
                    </div>
                    <div class="summary-box">
                        <div class="count-box">
                            <h1> 7 </h1>
                        </div>
                        <div class="label">
                            <h3> To Ship </h3>
                        </div>
                    </div>
                    <div class="summary-box">
                        <div class="count-box">
                            <h1> 7 </h1>
                        </div>
                        <div class="label">
                            <h3> Delivered </h3>
                        </div>
                    </div>
                </div>
                
                <div class="content-sales">
                    <div class="sales">
                        <h3> Transaction ID </h3>
                        <h3>Product</h3>
                        <h3>Status</h3>
                    </div>
                    <div class="sales user-feedbacks">
            
                        <!--Div that will hold the pie chart-->
                        <div id="chart_div"></div>
                        
                    </div>

                </div> 
            </div>




            <!-- CUSTOMER -->
            <div class="customer-container">
                 <h1 class="title"> Customer </h1>
                <table border="0">
                    <tr>
                        <th> ID </th>
                        <th> Fullname </th>
                        <th> Email </th>
                        <th> Contact </th>
                        <th> Gender </th>
                        <th> Birthday </th>
                    </tr>
                   
                </table>
            </div>


            <!-- CATEGORY -->
            <div class="category-container">
                 <h1 class="title"> Category </h1>
                <table border="0">
                    <tr>
                        <th> Clothes </th>
                        <th> Cosmetics </th>
                        <th> Caps </th>
                        <th> Bag </th>
                        <th> Purse </th>
                        <th> Sauce </th>
                    </tr>
                   
                </table>
            </div>


            <!-- PRODUCTS -->
            <div class="product-container">
                 <h1 class="title"> Products </h1>
                <table border="0">
                    <tr>
                        <th> Product ID </th>
                        <th> Product Name </th>
                        <th> Product Price </th>
                        <th> Stocks </th>
                        <th> Type </th>
                        <th> Brand </th>
                        <th> Picture </th>
                        <button class="add"><th>Add</th></button>
                        <button class="edit"><th>Edit</th></button>
                        <button class="del"><th>Delete</th></button>
                    </tr>
                   
                </table>
            </div>


            <!-- ORDERS -->
            <div class="orders-container">
                 <h1 class="title"> Orders</h1>
                <table border="0">
                    <tr>
                        <th> Transaction ID </th>
                        <th> Product ID </th>
                        <th> Customer ID </th>
                        <th> Product </th>
                        <th> Price </th>
                        <th> Quantity </th>
                        <th> Total Price </th>
                        <th> Date of Purchase </th>
                        <th> Date of Delivery </th>
                    </tr>
                   
                </table>
            </div>


            <!-- SHIPMENT-->
            <div class="shipment-container">
                 <h1 class="title"> Shipment</h1>
                <table border="0">
                    <tr>
                        <th> Transaction ID </th>
                        <th> Courier ID </th>
                        <th> Product </th>
                        <th> Price </th>
                        <th> Quantity </th>
                        <th> Over all Price </th>
                        <th> Status </th>
                    </tr>
                   
                </table>
            </div>

            

        </div>
    </div>

            
            

<script src="../js/dashboard.js"></script>
</body>
</html>