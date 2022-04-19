<!DOCTYPE html>
<html>

<head>
   
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        h6 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class=" p-4 container-fluid">
        <h2>Order #{{ $order->id }}</h2>
        <p>{{ $order->created_at }}</p>
<table class="table table-bordered" style="width:50%">         
   <tr>
                <td>Order status</td>
                <td>Pending</td>
            </tr>
            <tr>
                <td>Total amount</td>
                <td>${{ $order->sub_total }}</td>
            </tr>
            <tr>
                <td>Total discount</td>
                <td>$0.0</td>
            </tr>
            <tr>
                <td>Delivery charge</td>
                <td>$0.0</td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>${{ $order->sub_total }}</td>
            </tr>

        </table>



    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        
</body>

</html>