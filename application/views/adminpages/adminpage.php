<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row mx-4">

<div class="container">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Kelas</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Cover</th>
                <th>images</th>
                

            </tr>
        </thead>
        <tbody id="table-body">
            <?php foreach ($lkses as $item) : ?>
                <tr>
                    <td><?= $item['id']; ?></td>
                    <td>

                        <img src="<?= $item['image_link']; ?>" alt="<?= $item['title'] ?>" class="img-thumbnail">

                    </td>
                    <td><?= $item['jpn#']; ?></td>
                    <td><?= $item['title']; ?></td>
                    <td><?= $item['original_air_date']; ?></td>
                    <td><?= $item['broadcast_rating']; ?></td>
                    <td><?= $item['season']; ?></td>
                    <td>
                        <?php foreach ($item['plot_logos'] as $plot): ?>
                            <img src="<?= base_url($plot) ?>" alt="Plot Logo" class="me-2" style="height: 30px;">
                        <?php endforeach; ?>
                    </td>
                    <td><?= $item['source']; ?></td>
                    <td>
                        <div class="casts-wrapper">
                            <?php foreach ($item['casts'] as $cast): ?>
                                <div class="text-center">
                                    <img src="<?= $cast['image_link']; ?>" alt="<?= $cast['name']; ?>" class="rounded-circle mb-1">
                                    <div style="font-size: 0.75rem;"><?= $cast['name']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-4">
        <?= $pagination ?>
    </div>
</div>
</div>