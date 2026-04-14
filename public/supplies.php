<?php
// Kéo dữ liệu và hàm ra
$supplies = require __DIR__ . '/../src/Data/supplies.php';
require __DIR__ . '/../src/Helpers/functions.php';

// Chạy thống kê
$totalItems = count($supplies);
$totalQuantity = getTotalQuantity($supplies);
$availableSupplies = getAvailableSupplies($supplies);
$availableCount = count($availableSupplies);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical Supplies</title>
</head>
<body>
    <h1>Mini Medical Supplies App</h1>

    <h2>Statistics</h2>
    <ul>
        <li>Total items: <?php echo $totalItems; ?></li>
        <li>Total quantity: <?php echo $totalQuantity; ?></li>
        <li>Available items: <?php echo $availableCount; ?></li>
    </ul>

    <h2>Supplies List</h2>
    <?php foreach ($supplies as $item): ?>
        <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #17a2b8;">
            <p><strong>Name:</strong> <?php echo formatSupplyName($item['name']); ?></p>
            <p><strong>Group:</strong> <?php echo $item['group']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $item['quantity']; ?></p>
            <p><strong>Status:</strong> <?php echo getStockStatus($item['quantity']); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>