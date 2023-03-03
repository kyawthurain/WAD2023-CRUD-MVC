<?php require_once ViewDir."/template/header.php"; ?>


    <h3>View Informations</h3>
    <div class=" d-flex justify-content-between align-items-center">
    <a href="<?= url("list-create") ?>" class=" btn btn-outline-primary mb-3">Create new</a>
    <form action="<?= route("list") ?>">
        <div class=" input-group">
        <input type="text" class=" form-control" name="q" value="<?php if(isset($_GET["q"])): ?>
            <?= $_GET["q"] ?>
            <?php endif;?>">
        <?php if(isset($_GET["q"])): ?>

        <a href="<?= route("list") ?>" class=" btn btn-outline-secondary">clear</a>

        <?php endif; ?>    
        <button class=" btn btn-primary">search</button>
        </div>
    </form>
    </div>
    <div>
        <table class=" table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Money</th>
                    <th>Actions</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lists as $data): ?>
                    <tr>
                        <td>
                            <?= $data["id"] ?>
                        </td> 
                        <td>
                            <?= $data["name"] ?>
                        </td>
                        <td>
                            <?= $data["money"] ?>
                        </td>
                        <td>
                            <a href="<?= route("list-edit",["id" => $data["id"]]) ?>" class=" btn btn-sm btn-secondary">Edit</a>
                            <form class=" d-inline-block" action="<?= route("list-delete") ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="id" value="<?=  $data["id"] ?>">
                                <button class=" btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        <td>
                            <?= $data["created_at"] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once ViewDir."/template/footer.php"; ?>