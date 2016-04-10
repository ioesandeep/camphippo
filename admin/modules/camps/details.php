<?php
$id = get_id();
if (false == $id) {
    echo 'User not selected.';
    exit;
}

$user = table_fetch_row('camp_registration', sprintf('id="%d"', $id));
if (false == $user) {
    echo 'User does not exist.';
    exit;
}

$camp = table_fetch_row('camps', sprintf('id="%d"', $user['camp']));
$payment = table_fetch_row('camp_payments', sprintf('user="%d"', $id));

?>
<style type="text/css">
    table {
        border: 1px solid #ddd;
        border-collapse: collapse;
        width: 100%;
        margin: 20px auto;
    }

    table tbody tr th {
        border-right: 1px solid #ddd;
    }

    table tbody tr th,
    table tbody tr td {
        width: 50%;
    }

    table tbody tr:not(:last-child) th,
    table tbody tr:not(:last-child) td {
        border-bottom: 1px solid #ddd;
    }
</style>
<a href="?module=camps&action=registrations">Go Back</a>
<table>
    <caption><h2>User Information</h2></caption>
    <tbody>
    <tr>
        <th>ID</th>
        <td><?php echo $id; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $user['name']; ?></td>
    </tr>
    <tr>
        <th>Wished name</th>
        <td><?php echo $user['wished_name']; ?></td>
    </tr>
    <tr>
        <th>Contact name</th>
        <td><?php echo $user['contact_name']; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?php echo $user['address']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $user['email']; ?></td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td><?php echo $user['mobile']; ?></td>
    </tr>
    <tr>
        <th>Landline</th>
        <td><?php echo $user['landline']; ?></td>
    </tr>
    <tr>
        <th>School</th>
        <td><?php echo $user['school']; ?></td>
    </tr>
    <tr>
        <th>Year group</th>
        <td><?php echo $user['year_group']; ?></td>
    </tr>
    <tr>
        <th>Registration date</th>
        <td><?php echo date('m/d/Y', strtotime($user['date_added'])); ?></td>
    </tr>
    </tbody>
</table>
<table>
    <caption><h2>Camp Information</h2></caption>
    <tbody>
    <tr>
        <th>Title</th>
        <td><?php echo $camp['title']; ?></td>
    </tr>
    <tr valign="top">
        <th>Description</th>
        <td><?php echo $camp['description']; ?></td>
    </tr>
    <tr>
        <th>Start date</th>
        <td><?php echo date('m/d/Y', strtotime($camp['start_date'])); ?></td>
    </tr>
    <tr>
        <th>End date</th>
        <td><?php echo date('m/d/Y', strtotime($camp['end_date'])); ?></td>
    </tr>
    <tr>
        <th>Venue</th>
        <td><?php echo $camp['venue']; ?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td>&pound; <?php echo number_format($camp['price'], 2); ?></td>
    </tr>
    <tr>
        <th>Consent form</th>
        <td><?php echo $camp['enable_consent_form'] ? 'Enabled' : 'Disblaed'; ?></td>
    </tr>
    </tbody>
</table>
<?php if (false != $payment) { ?>
    <table>
        <caption><h2>Payment Information</h2></caption>
        <tbody>
        <tr>
            <th>Security method</th>
            <td><?php echo $payment['security_method']; ?></td>
        </tr>
        <tr>
            <th>Stripe payment ID</th>
            <td><?php echo $payment['security_id']; ?></td>
        </tr>
        <tr>
            <th>Payment Amount</th>
            <td>&pound; <?php echo number_format($payment['price'], 2); ?></td>
        </tr>
        <tr>
            <th>Payment Email</th>
            <td><?php echo $payment['email']; ?></td>
        </tr>
        <tr>
            <th>Payment Type</th>
            <td><?php echo $payment['payment_type']; ?></td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td><?php echo date('m/d/Y', strtotime($payment['payment_date'])); ?></td>
        </tr>
        </tbody>
    </table>
<?php } ?>