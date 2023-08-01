<section>
    <h3>Payment</h3>
    <table>
        <tr>
            <th>PaymentKey</th>
            <th>CustomerKey</th>
            <th>CardNum</th>
            <th>CVV</th>
            <th>ExpiryDate</th>
            <th>Delete</th>
        </tr>
        <?php if (count($payments) > 0): ?>
            <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= htmlspecialchars($payment['PaymentKey']) ?></td>
                    <td><?= htmlspecialchars($payment['CustomerKey']) ?></td>
                    <td><?= htmlspecialchars($payment['CardNum']) ?></td>
                    <td><?= htmlspecialchars($payment['CVV']) ?></td>
                    <td><?= htmlspecialchars($payment['ExpiryDate']) ?></td>
                    <td>
                        <form method="post" action="src/admin/delete_payment.php">
                            <input type="submit" name="DeletePayment" value="Delete">
                            <input type="hidden" name="PaymentKey" value="<?= htmlspecialchars($payment['PaymentKey']) ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</section>