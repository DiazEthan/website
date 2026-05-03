<?php
require_once("../classes/Database.php");

$db = new Database();
$db->connect();

$message = "";

// BOOKS CRUD
if (isset($_POST['add_book'])) {
    $data = ["title" => $_POST['title'], "author" => $_POST['author'], "genre" => $_POST['genre'], "year" => $_POST['year']];
    $message = $db->insert("books", $data) ? "Book added!" : "Failed to add book.";
}
if (isset($_POST['update_book'])) {
    $data = ["title" => $_POST['title'], "author" => $_POST['author'], "genre" => $_POST['genre'], "year" => $_POST['year']];
    $message = $db->update("books", $_POST['id'], $data) ? "Book updated!" : "Failed to update book.";
}
if (isset($_POST['delete_book'])) {
    $message = $db->delete("books", $_POST['id']) ? "Book deleted!" : "Failed to delete book.";
}

// MEMBERS CRUD
if (isset($_POST['add_member'])) {
    $data = ["name" => $_POST['name'], "email" => $_POST['email'], "phone" => $_POST['phone'], "join_date" => $_POST['join_date']];
    $message = $db->insert("members", $data) ? "Member added!" : "Failed to add member.";
}
if (isset($_POST['update_member'])) {
    $data = ["name" => $_POST['name'], "email" => $_POST['email'], "phone" => $_POST['phone'], "join_date" => $_POST['join_date']];
    $message = $db->update("members", $_POST['id'], $data) ? "Member updated!" : "Failed to update member.";
}
if (isset($_POST['delete_member'])) {
    $message = $db->delete("members", $_POST['id']) ? "Member deleted!" : "Failed to delete member.";
}

// LOANS CRUD
if (isset($_POST['add_loan'])) {
    $data = ["book_id" => $_POST['book_id'], "member_id" => $_POST['member_id'], "loan_date" => $_POST['loan_date'], "return_date" => $_POST['return_date']];
    $message = $db->insert("loans", $data) ? "Loan added!" : "Failed to add loan.";
}
if (isset($_POST['update_loan'])) {
    $data = ["book_id" => $_POST['book_id'], "member_id" => $_POST['member_id'], "loan_date" => $_POST['loan_date'], "return_date" => $_POST['return_date']];
    $message = $db->update("loans", $_POST['id'], $data) ? "Loan updated!" : "Failed to update loan.";
}
if (isset($_POST['delete_loan'])) {
    $message = $db->delete("loans", $_POST['id']) ? "Loan deleted!" : "Failed to delete loan.";
}

$books   = $db->getAll("books");
$members = $db->getAll("members");
$loans   = $db->getAll("loans");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Tester</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 90%; margin-bottom: 30px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background: #ddd; }
        input { margin: 5px; padding: 5px; }
        h2 { color: #1B4332; }
        .message { color: green; font-weight: bold; }
        .json-section { background: #f4f4f4; padding: 15px; margin-bottom: 20px; border-left: 4px solid #1B4332; }
        pre { background: #222; color: #0f0; padding: 10px; overflow-x: auto; }
    </style>
</head>
<body>
<h1>Library Tester - Scrum3_Team_X</h1>
<?php if ($message): ?><p class="message"><?php echo $message; ?></p><?php endif; ?>

<h2>API JSON Output Tester</h2>

<div class="json-section">
    <h3>Books - getAll JSON Response:</h3>
    <?php
        $apiURL = "http://cis266/Scrum3_Team_X/Provider_X/API_X/API_X.php?action=getAll&table=books";
        $jsonResponse = file_get_contents($apiURL);
        echo "<h4>Raw JSON:</h4>";
        echo "<pre>" . $jsonResponse . "</pre>";
        echo "<h4>Decoded Response:</h4>";
        $decoded = json_decode($jsonResponse, true);
        foreach ($decoded as $row) {
            echo "<p><strong>ID:</strong> " . $row['id'] . " | ";
            echo "<strong>Title:</strong> " . $row['title'] . " | ";
            echo "<strong>Author:</strong> " . $row['author'] . " | ";
            echo "<strong>Genre:</strong> " . $row['genre'] . " | ";
            echo "<strong>Year:</strong> " . $row['year'] . "</p>";
        }
    ?>
</div>

<div class="json-section">
    <h3>Members - getAll JSON Response:</h3>
    <?php
        $apiURL = "http://cis266/Scrum3_Team_X/Provider_X/API_X/API_X.php?action=getAll&table=members";
        $jsonResponse = file_get_contents($apiURL);
        echo "<h4>Raw JSON:</h4>";
        echo "<pre>" . $jsonResponse . "</pre>";
        echo "<h4>Decoded Response:</h4>";
        $decoded = json_decode($jsonResponse, true);
        foreach ($decoded as $row) {
            echo "<p><strong>ID:</strong> " . $row['id'] . " | ";
            echo "<strong>Name:</strong> " . $row['name'] . " | ";
            echo "<strong>Email:</strong> " . $row['email'] . " | ";
            echo "<strong>Phone:</strong> " . $row['phone'] . " | ";
            echo "<strong>Join Date:</strong> " . $row['join_date'] . "</p>";
        }
    ?>
</div>

<div class="json-section">
    <h3>Loans - getAll JSON Response:</h3>
    <?php
        $apiURL = "http://cis266/Scrum3_Team_X/Provider_X/API_X/API_X.php?action=getAll&table=loans";
        $jsonResponse = file_get_contents($apiURL);
        echo "<h4>Raw JSON:</h4>";
        echo "<pre>" . $jsonResponse . "</pre>";
        echo "<h4>Decoded Response:</h4>";
        $decoded = json_decode($jsonResponse, true);
        foreach ($decoded as $row) {
            echo "<p><strong>ID:</strong> " . $row['id'] . " | ";
            echo "<strong>Book ID:</strong> " . $row['book_id'] . " | ";
            echo "<strong>Member ID:</strong> " . $row['member_id'] . " | ";
            echo "<strong>Loan Date:</strong> " . $row['loan_date'] . " | ";
            echo "<strong>Return Date:</strong> " . $row['return_date'] . "</p>";
        }
    ?>
</div>

<h2>Books</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <input type="number" name="year" placeholder="Year" required>
    <button type="submit" name="add_book">Add Book</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Book ID" required>
    <input type="text" name="title" placeholder="New Title" required>
    <input type="text" name="author" placeholder="New Author" required>
    <input type="text" name="genre" placeholder="New Genre" required>
    <input type="number" name="year" placeholder="New Year" required>
    <button type="submit" name="update_book">Update Book</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Book ID" required>
    <button type="submit" name="delete_book">Delete Book</button>
</form>
<table>
    <tr><th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th></tr>
    <?php foreach ($books as $b): ?>
    <tr><td><?=$b['id']?></td><td><?=$b['title']?></td><td><?=$b['author']?></td><td><?=$b['genre']?></td><td><?=$b['year']?></td></tr>
    <?php endforeach; ?>
</table>

<h2>Members</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="date" name="join_date" required>
    <button type="submit" name="add_member">Add Member</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Member ID" required>
    <input type="text" name="name" placeholder="New Name" required>
    <input type="email" name="email" placeholder="New Email" required>
    <input type="text" name="phone" placeholder="New Phone" required>
    <input type="date" name="join_date" required>
    <button type="submit" name="update_member">Update Member</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Member ID" required>
    <button type="submit" name="delete_member">Delete Member</button>
</form>
<table>
    <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Join Date</th></tr>
    <?php foreach ($members as $m): ?>
    <tr><td><?=$m['id']?></td><td><?=$m['name']?></td><td><?=$m['email']?></td><td><?=$m['phone']?></td><td><?=$m['join_date']?></td></tr>
    <?php endforeach; ?>
</table>

<h2>Loans</h2>
<form method="POST">
    <input type="number" name="book_id" placeholder="Book ID" required>
    <input type="number" name="member_id" placeholder="Member ID" required>
    <input type="date" name="loan_date" required>
    <input type="date" name="return_date" required>
    <button type="submit" name="add_loan">Add Loan</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Loan ID" required>
    <input type="number" name="book_id" placeholder="Book ID" required>
    <input type="number" name="member_id" placeholder="Member ID" required>
    <input type="date" name="loan_date" required>
    <input type="date" name="return_date" required>
    <button type="submit" name="update_loan">Update Loan</button>
</form>
<form method="POST">
    <input type="number" name="id" placeholder="Loan ID" required>
    <button type="submit" name="delete_loan">Delete Loan</button>
</form>
<table>
    <tr><th>ID</th><th>Book ID</th><th>Member ID</th><th>Loan Date</th><th>Return Date</th></tr>
    <?php foreach ($loans as $l): ?>
    <tr><td><?=$l['id']?></td><td><?=$l['book_id']?></td><td><?=$l['member_id']?></td><td><?=$l['loan_date']?></td><td><?=$l['return_date']?></td></tr>
    <?php endforeach; ?>
</table>

</body>
</html>