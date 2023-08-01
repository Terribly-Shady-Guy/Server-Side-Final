<section>
    <h3>Customers</h3>
    <table>
        <tr>
            <th>CustomerKey</th>
            <th>CustFirstName</th>
            <th>CustLastName</th>
            <th>CustStreetAddress</th>
            <th>CustCity</th>
            <th>CustState</th>
            <th>CustZip</th>
            <th>Delete</th>
        </tr>
        <?php if (count($customers) > 0): ?>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['CustomerKey']) ?></td>
                    <td><?= htmlspecialchars($customer['CustFirstName']) ?></td>
                    <td><?= htmlspecialchars($customer['CustLastName']) ?></td>
                    <td><?= htmlspecialchars($customer['CustStreetAddress']) ?></td>
                    <td><?= htmlspecialchars($customer['CustCity']) ?></td>
                    <td><?= htmlspecialchars($customer['CustState']) ?></td>
                    <td><?= htmlspecialchars($customer['CustZip']) ?></td>
                    <td>
                        <form method="post" action="src/admin/delete_customer.php">
                            <input type="submit" name="deleteCustomer" value="Delete">
                            <input type="hidden" name="CustomerKey" value="<?= htmlspecialchars($customer['CustomerKey']) ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</section>