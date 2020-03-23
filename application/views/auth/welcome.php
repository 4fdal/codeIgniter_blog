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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <?= $this->session->flashdata('notif') ?>
            <?= $content ?>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
  </div>

  <!-- script -->
  <?= $script ?>

</body>

</html>