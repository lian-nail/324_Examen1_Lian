<h1 class="nombre-pagina">Administrador Director</h1>

<?php include_once __DIR__ . '/../templates/barra.php' ?>

<h2>Montos</h2>
<?php if( !empty($montos) ): ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">La Paz</th>
                <th scope="col" class="table__th">Tarija</th>
                <th scope="col" class="table__th">Pando</th>
                <th scope="col" class="table__th">Cochabamba</th>
                <th scope="col" class="table__th">Santa Cruz</th>
                <th scope="col" class="table__th">Chuquisaca</th>
                <th scope="col" class="table__th">Oruro</th>
                <th scope="col" class="table__th">Beni</th>
                <th scope="col" class="table__th">Potosi</th>
            </tr>
        </thead>
        <tbody class="table__tbody">
            <tr class="table__tr">
                <?php foreach( $montos as $monto ): ?>
                <td class="table__td">
                    <?php echo $monto->total_lapaz;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_tarija;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_pando;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_cochabamba;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_santacruz;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_chuquisaca;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_oruro;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_beni;?>
                </td>
                <td class="table__td">
                    <?php echo $monto->total_potosi;?>
                </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
<?php else :?>
    <p class="text-center">No existen Montos...</p>
<?php endif; ?>
