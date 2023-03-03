<?php require_once ViewDir."/template/header.php"; ?>


    <h3>Edit Informations</h3>
    <div class=" d-flex justify-content-between">
    <a href="<?= url("list") ?>" class=" btn btn-outline-success mb-3">View all infos</a>

    </div>
    <div>
        <form action="<?= route("list-update") ?>" method="post">
            <input type="hidden" name="id" value="<?= $lists["id"] ?>">
            <input type="hidden" name="_method" value="put">
            <div>
                <label for="" class=" form-label">Name</label>
                <input type="text" class=" form-control" name="name" value="<?= $lists["name"] ?>" required>
            </div>
            <div>
                <label for="" class=" form-label">Money</label>
                <input type="number" class=" form-control" name="money" value="<?= $lists["money"] ?>" required>
            </div>
            <div>
                <button class=" btn btn-success mt-3">Update</button>
            </div>
        </form>
    </div>

<?php require_once ViewDir."/template/footer.php"; ?>