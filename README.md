<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <h1>Project Changelog</h1>
        <p>Powered by:</p>
        <ul>
            <li><a href="https://laravel.com" target="_blank">Laravel</a></li>
            <li>REST API</li>
        </ul>
    </div>
    <div class="changelog">
        <div class="version" id="v1.2.2">
            <h2>Last update V1.2.2</h2>
            <p><strong>Framework:</strong> Laravel Framework with RestAPI</p>
            <ul class="features">
                <li>Register user:
                    <ul>
                        <li>with name, mobile and password</li>
                    </ul>
                <li>Login user:
                    <ul>
                        <li>with mobile and password</li>
                        <li>JWT-based User Authentication</li>
                    </ul>
                <li>Add docker and manage by docker</li>
                <li>Add Docker Secret</li>
                <li>Admin can:
                    <ul>
                        <li>Create categories</li>
                        <li>Create products with options for prices</li>
                    </ul>
                </li>
                <li>User can:
                    <ul>
                        <li>Create carts</li>
                        <li>See all carts</li>
                        <li>Delete cart ids</li>
                        <li>Place an Order</li>
                    </ul>
                </li>
                <li>Guest can:
                    <ul>
                        <li>Create carts with own UUID</li>
                        <li>See all carts with own UUID</li>
                        <li>Delete cart ids with own UUID</li>
                    </ul>
                </li>
                <li>Added Seeder for Product Options</li>
                <li>Added List Product to see all Prices</li>
                <li>Added new dynamic DTO</li>
            </ul>
        </div>
    </div>
</body>
</html>
