<!--<p>This is html template: {CUSTOMER_NAME}</p>-->

<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="invoice-header">
        <img src="https://i.ibb.co/7p5hHfn/suiteledger-logo.png">
        <h2>{{COMPANY_NAME}}</h2>
        <p>Invoice for Maintenance Charges</p>
    </div>
    <div class="invoice-details">
        <table style="width: 50%">
            <tr><td><strong>Billed To:</strong></td><td>{{CUSTOMER_NAME}}</td></tr>
            <tr><td><strong>Invoice Date:</strong></td><td>{{INVOICE_DATE}}</td></tr>
            <tr><td><strong>Due Date:</strong></td><td>{{DUE_DATE}}</td></tr>
        </table>

    </div>
    <table>
        <tr>
            <th>Balance BF</th>
            <th>Approved Payments</th>
            <th>Pending Approvals</th>
            <th>This Month Charge</th>
        </tr>
        <tr>
            <td>{{BALANCE_BF}}</td>
            <td>{{APPROVED_PAYMENTS}}</td>
            <td>{{PENDING_APPROVALS}}</td>
            <td>{{THIS_MOTH_CHARGE}}</td>
        </tr>
    </table>
    <div class="total">
        <p><strong>Estimated Total: {{ESTIMATED_TOTAL}}</strong></p>
    </div>

    <div class="footer">
        <p style="text-align: center;">
        <p>Make your payment and click bellow button to upload the payment proof for verification</p>
        <a href="{{PAYMENT_LINK}}"
           style="background-color: #007BFF; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; border-radius: 5px;">
            Upload Payment Proof
        </a>

        <p><small>If you have any questions about this invoice, please contact {{COMPANY_EMAIL}}</small></p>
    </div>
</div>
</body>
</html>
