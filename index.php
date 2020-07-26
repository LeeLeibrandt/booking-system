<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Hotel</title>
</head>
<body>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" >
        <div class="inputs">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" id="firstname" required >
        </div>
        <div class="inputs">
            <label for="Lastname">Last Name:</label>
            <input type="text" name="Lastname" id="Lastname" required >
        </div>
        <div class="inputs">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required >
        </div>
        <div class="inputs">
            <label for="start">Start data:</label>
            <input type="date" name="indate" id="start"  min="2020-01-01" max="2023-12-31" required >
        </div>
        <div class="inputs">
            <label for="end">End date:</label>
            <input type="date" name="outdate" id="end"  min="2020-01-01" max="2023-12-31" required >
        </div>
        <select name="hotel1" required>
            <option value="Raddison">Raddison</option>
            <option value="Mount Nelson">Mount Nelson</option>
            <option value="Holiday Inn">Holiday Inn</option>
            <option value="Sun International">Sun International</option>
        </select> 
        <select name="hotel2" required>
            <option value="Raddison">Raddison</option>
            <option value="Mount Nelson">Mount Nelson</option>
            <option value="Holiday Inn">Holiday Inn</option>
            <option value="Sun International">Sun International</option>
        </select>
        <button type="submit" name="submit">Compare</button>
    </form>
</body>
</html>