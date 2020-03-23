<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- style  -->
    <?= $style ?>


</head>

<body>
    <div class="container-scroller">
        <!-- navbar -->
        <?= $navbar ?>

        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <?= $sidebar ?>
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <?= $this->session->flashdata('notif') ?>
                                    <!-- content -->
                                    <?= $content ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- footer -->
                <?= $footer ?>
            </div>
        </div>
    </div>

    <!-- script -->
    <?= $script ?>
</body>

</html>