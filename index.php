<?php 
$value = 0; 
$message = ""; 

if(isset($_POST['calculate'])){
    $fno = $_POST['fno'];
    $sno = $_POST['sno'];
    $operator = $_POST['operator'];

    $errors = false;

    if(empty($fno) || empty($sno) || empty($operator)){
        echo "<script>
                alert('Please enter values to calculate');
                window.location = 'cal.php';
              </script>";
        $errors = true;
    }

    if(!is_numeric($fno) || !is_numeric($sno)){
        echo "<script>
                alert('Please enter number values');
                window.location = 'cal.php';
              </script>";
        $errors = true;
    }

    // Calculation
    if(!$errors){
        switch($operator){
            case "add":
                $value = $fno + $sno;
                break;
            case "subtract":
                $value = $fno - $sno;
                break;
            case "multiply":
                $value = $fno * $sno;
                break;
            case "divide":
                if($sno != 0){      
                    $value = $fno / $sno;
                } else {
                    $message = "Can't divide by zero";
                }
                break;
            default:
                $message = "Invalid operator selected";          
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Simple Calculator</h2>
    <form method="POST" class="mt-4">
        <?php if($message): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
        <div class="form-group">
            <label for="fistnumber">First Number</label>
            <input type="number" name="fno" class="form-control" placeholder="Enter your first number">
        </div>
        <div class="form-group">
            <label for="operator">Operator</label>
            <select name="operator" class="form-control">
                <option value="">Select</option>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
        </div>
        <div class="form-group">
            <label for="secondnumber">Second Number</label>
            <input type="number" name="sno" class="form-control" placeholder="Enter your second number">
        </div>
        <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
        <?php if($value || $value === 0): ?>
            <div class="alert alert-info mt-3">Result: <?php echo $value; ?></div>
        <?php endif; ?>
    </form>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
