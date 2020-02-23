<?php
require_once '../../../helpers/helpers.php';
$States = ValidateRequestForPageLoad($_POST);
echo CheckLoadedDataFromAjaxCall($States);
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>مدیریت استان ها</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                    <li class="breadcrumb-item ajax"><a href="#" rel="BaseTables/BaseTables.php">جداول پایه</a></li>
                    <li class="breadcrumb-item active">مدیریت استان ها</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">استان ها</h3>
                    <a rel="BaseTables/States/addStates.php" class="btn btn-outline-primary pull-left ajax"><i
                                class="fa fa-plus"></i> افزودن استان</a>
                </div>
                <div class="card-body d-flex flex-wrap table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th class="no-sort" width="50">ردیف</th>
                            <th>نام استان</th>
                            <th class="no-sort" width="200">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($States as $state) {

                            ?>
                            <tr>
                                <td></td>
                                <td><?= $state->state_name; ?></td>

                                <td>
                                    <a rel="BaseTables/States/viewStates.php?state_id=<?= $state->state_id; ?>"
                                       class="btn btn-info ajax" data-toggle="tooltip" title="مشاهده"><i
                                                class="fa fa-eye"></i> </a>
                                    <a rel="BaseTables/States/editStates.php?state_id=<?= $state->state_id; ?>"
                                       class="btn btn-info ajax" data-toggle="tooltip" title="ویرایش"><i
                                                class="fa fa-edit"></i> </a>
                                    <a rel="BaseTables/States/deleteStates.php?state_id=<?= $state->state_id; ?>"
                                       class="btn btn-info ajax" data-toggle="tooltip" title="حذف"><i
                                                class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th width="50">ردیف</th>
                            <th>نام استان</th>
                            <th width="200">عملیات</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ajaxStart(function () {
        Pace.restart();
    });
    $.Ajax();
    // $.count();
    $.table(true);
</script>
