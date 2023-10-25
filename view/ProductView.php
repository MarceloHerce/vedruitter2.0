<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Artículos</title>
</head>
<body>
    <h1>Listado de Artículos</h1>
    <table>
        <tr><th>Producto</th><th>Precio</th><th>Stock</th></tr>
            <?php foreach ($results as $i):?>
                <tr>
                    <td><?= $i->productName;?></td>
                    <td><?= $i->unitPrice;?></td>
                    <td><?= $i->unitsInStock;?></td>
                </tr>
            <?php endforeach;?>
    </table>
</body>
</html>