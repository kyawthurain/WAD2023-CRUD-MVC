<?php require_once ViewDir."/template/header.php"; ?>


    <h3>Create Informations</h3>
    <div class=" d-flex justify-content-between">
    <a href="<?= url("list") ?>" class=" btn btn-outline-primary mb-3">View all infos</a>

    </div>
    <div>
        <form action="<?= route("list-store") ?>" method="post">
            <div>
                <label for="" class=" form-label">Name</label>
                <input type="text" class=" form-control" name="name" required>
            </div>
            <div>
                <label for="" class=" form-label">Money</label>
                <input type="number" class=" form-control" name="money" required>
            </div>
            <div>
                <button class=" btn btn-primary mt-3">Create</button>
            </div>
        </form>
    </div>

<?php require_once ViewDir."/template/footer.php"; ?>