<section>
    <h3>Orders</h3>
    <table>
        <tr>
            <th>OrderKey</th>
            <th>Total</th>
            <th>OrderDate</th>
            <th>CustomerKey</th>
            <th>PaymentKey</th>
            <th>Delete</th>
        </tr>
        <?php if (count($orders) > 0): ?>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['OrderKey']) ?></td>
                    <td><?= htmlspecialchars($order['Total']) ?></td>
                    <td><?= htmlspecialchars($order['OrderDate']) ?></td>
                    <td><?= htmlspecialchars($order['CustomerKey']) ?></td>
                    <td><?= htmlspecialchars($order['PaymentKey']) ?></td>
                    <td>
                        <form method="post" action="src/admin/delete_order.php">
                            <input type="submit" value="Delete">
                            <input type="hidden" name="orderKey" value="<?= htmlspecialchars($order['OrderKey']) ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</section>