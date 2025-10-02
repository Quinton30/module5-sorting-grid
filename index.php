<?php
include "db.php";

// Default sort
$sort_column = "id";
$sort_order = "ASC";

// Check if sort request was sent
if (isset($_GET['column']) && isset($_GET['order'])) {
    $sort_column = $_GET['column'];
    $sort_order = $_GET['order'] === "ASC" ? "ASC" : "DESC";
}

// Query with sorting
$sql = "SELECT * FROM students ORDER BY $sort_column $sort_order";
$result = mysqli_query($conn, $sql);

// Helper to flip ASC <-> DESC for next click
function nextOrder($current) {
    return $current === "ASC" ? "DESC" : "ASC";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sortable Student Grid</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #eee;
        }
        a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Student List (Sortable Grid)</h2>

<table>
    <tr>
        <th><a href="?column=id&order=<?php echo nextOrder($sort_order); ?>">ID</a></th>
        <th><a href="?column=name&order=<?php echo nextOrder($sort_order); ?>">Name</a></th>
        <th><a href="?column=age&order=<?php echo nextOrder($sort_order); ?>">Age</a></th>
        <th><a href="?column=gpa&order=<?php echo nextOrder($sort_order); ?>">GPA</a></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['gpa']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
