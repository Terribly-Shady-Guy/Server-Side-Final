<section>
    <h3>OrderDetails</h3>
    <table>
        <tr>
            <th>OrderKey</th>
            <th>ProductKey</th>
            <th>OrderQty</th>
            <th>Delete</th>
        </tr>
        <?php if (count($orderDetails) > 0): ?>
            <?php foreach ($orderDetails as $orderDetail): ?>
                <tr>
                    <td><?= htmlspecialchars($orderDetail['OrderKey']) ?></td>
                    <td><?= htmlspecialchars($orderDetail['ProductKey']) ?></td>
                    <td><?= htmlspecialchars($orderDetail['OrderQty']) ?></td>
                    <td>
                        <form method="post" action="src/admin/delete_orderdetails.php">
                            <input type="submit" value="Delete">
                            <input type="hidden" name="OrderKey" value="<?= htmlspecialchars($orderDetail['OrderKey']) ?>">
                            <input type="hidden" name="ProductKey" value="<?= htmlspecialchars($orderDetail['ProductKey']) ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</section>