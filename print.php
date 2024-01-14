<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbregister";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the query string
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Fetch data based on the ID
$sql = "SELECT * FROM parkdb WHERE id = $id";
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // HTML for the printable content
    $printableContent = '<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Printable Content</title>
        <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>';

    // Display data in the printable content
    $printableContent .= '<table width="100%" border="1">';
    $printableContent .= '<tr>';
    $printableContent .= '<th align="center">Slot No.</th>';
    $printableContent .= '<th align="center">Car</th>';
    $printableContent .= '<th align="center">Type</th>';
    $printableContent .= '<th align="center">Plate No.</th>';
    $printableContent .= '<th align="center">Status</th>';
    $printableContent .= '<th align="center">Owner</th>';
    $printableContent .= '<th align="center">Amount</th>';
    $printableContent .= '<th align="center">Actions</th>';
    $printableContent .= '</tr>';
    
    $printableContent .= '<tr>';
    $printableContent .= '<td align="center">' . $row["slot"] . '</td>';
    $printableContent .= '<td align="center">' . $row["car"] . '</td>';
    $printableContent .= '<td align="center">' . $row["type"] . '</td>';
    $printableContent .= '<td align="center">' . $row["platenum"] . '</td>';
    $printableContent .= '<td align="center">' . $row["status"] . '</td>';
    $printableContent .= '<td align="center">' . $row["name"] . '</td>';
    $printableContent .= '<td align="center">' . $row["amount"] . '</td>';
    $printableContent .= '<td align="center">';
    $printableContent .= '<a href="b1slot.php?id=' . $row["id"] . '&name=' . $row["name"] . '"><img src="view.png" style="height:20px;width:20px;"></a>';
    $printableContent .= '<a href="print.php?id=' . $row["id"] . '"><img src="printer.png" style="height:20px;width:20px;"></a>';
    $printableContent .= '<a href="b1remove.php?id=' . $row["id"] . '"><img src="bin.png" style="height:20px;width:20px;"></a>';
    $printableContent .= '</td>';
    $printableContent .= '</tr>';

    $printableContent .= '</table>';

    $printableContent .= '<button onclick="printTable()">Print</button>';
    $printableContent .= '<button onclick="saveAsPDF()">Save as PDF</button>';
    $printableContent .= '</table>
    <script>
    function printTable() {
        var printContents = document.getElementsByTagName("table")[0].outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    function saveAsPDF() {
        var element = document.getElementsByTagName("table")[0];
        html2pdf(element);
    }
</script>

    </html>';

    // Output the printable content
    echo $printableContent;
} else {
    echo "No data found for the provided ID.";
}

// Close the database connection
$conn->close();
?>
