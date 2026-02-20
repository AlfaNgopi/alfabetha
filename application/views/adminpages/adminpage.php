<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>




<div class="container mb-5">


    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Add Item
        </button>
    </div>

    <div class="row ">

        <?php foreach ($lkses as $item) : ?>

            <div class="card mb-3 product-card" style="max-width: 700px;">
                <div class="row g-0">
                    <div class="col-lg-4 product-img-container">
                        <img src="<?= $item['cover']['url']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item['name']; ?></h5>
                            <p class="card-text">Kelas : <?= $item['kelas']; ?></p>
                            <p class="card-text">Harga : <?= $item['price']; ?></p>
                            <p class="card-text">Stok : <?= $item['stock']; ?></p>
                            <p class="card-text"><?= $item['description']; ?></p>

                        </div>
                        <div class="card-footer bg-white">
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $item['id']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $item['id']; ?>">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>


    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('adminpage/create'); ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-3"><label>Kelas</label><input type="text" name="kelas" class="form-control" required></div>
                    <div class="mb-3"><label>Price</label><input type="number" name="price" class="form-control" required></div>
                    <div class="mb-3"><label>Stock</label><input type="number" name="stock" class="form-control" required></div>
                    <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"></textarea></div>
                    <div class="mb-3"><label>Cover</label><input type="file" name="cover"  class="form-control"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Item</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php foreach ($lkses as $item) : ?>
    <div class="modal fade" id="editModal<?= $item['id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url('adminpage/edit/' . $item['id']); ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit: <?= $item['name']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><label>Name</label><input type="text" name="name" value="<?= $item['name']; ?>" class="form-control" required></div>
                        <div class="mb-3"><label>Kelas</label><input type="text" name="kelas" value="<?= $item['kelas']; ?>" class="form-control" required></div>
                        <div class="mb-3"><label>Price</label><input type="number" name="price" value="<?= $item['price']; ?>" class="form-control" required></div>
                        <div class="mb-3"><label>Stock</label><input type="number" name="stock" value="<?= $item['stock']; ?>" class="form-control" required></div>
                        <div class="mb-3"><label>Description</label><textarea name="description" class="form-control"><?= $item['description']; ?></textarea></div>
                        <div class="mb-3"><label>Cover</label><input type="file" name="cover" class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Update Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="deleteModal<?= $item['id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content border-danger">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Are you sure?</h5>
                </div>
                <div class="modal-body text-center">
                    <p>You are about to delete <strong><?= $item['name']; ?></strong>. This cannot be undone!</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('adminpage/delete/' . $item['id']); ?>" class="btn btn-danger">Yes, Delete It!</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>