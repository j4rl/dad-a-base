<!DOCTYPE html>
<html lang="en">
<?php
$host="localhost";
$user="root";
$pass="";
$db="dad_a_base";
$conn=mysqli_connect($host, $user, $pass, $db);

if(isset($_POST['btn'])){
    $joketext=$_POST['joketext'];
    $jokeanswer=$_POST['jokeanswer'];
    $sql="INSERT INTO jokes(joketext, jokeanswer) VALUES ('$joketext','$jokeanswer')";
    $result=mysqli_query($conn,$sql);
}

$sql="SELECT * FROM jokes ORDER BY score DESC";
$result=mysqli_query($conn,$sql);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>DAD-A-BASE</h1>
    </header>
    <main>
        <section>
            <form action="index.php" method="POST">
                <label>Pappaskämtet
                    <textarea name="joketext"></textarea>
                </label>
                <label>Svaret på skämtet
                    <input type="text" name="jokeanswer">
                </label>
                <input type="submit" value="Lägg in" name="btn">
            </form>
        </section>
        <section>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <details><summary><?=$row['joketext']?></summary><?=$row['jokeanswer']?></details>
         <?php endwhile  ?>
        </section>
    </main>
    <footer>&copy; All dads forever 2025</footer>
</body>
</html>