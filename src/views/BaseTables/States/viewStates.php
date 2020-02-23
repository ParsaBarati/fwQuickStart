<?php
include_once '../../../autoload.php';
$state = ValidateRequestForPageLoad($_POST);
echo CheckLoadedDataFromAjaxCall($state);
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
                <div class="card-header with-border">
                    <h3 class="card-title"> مشاهده استان</h3>
                    <a rel="BaseTables/States/States.php" class="btn btn-outline-primary pull-left ajax"><i
                                class="fa fa-chevron-left"></i> بازگشت</a>
                    <a rel="BaseTables/States/viewStates.php?state_id=<?= $state->state_id; ?>"
                       class="btn btn-outline-primary pull-left ajax"><i
                                class="fa fa-refresh"></i> تازه
                        سازی</a>
                </div>

                <form id="idForm" method="post" action="">
                    <div class="card-body d-flex flex-wrap table-responsive">
                        <div class="form-group col-md-6">
                            <label for="state_name">نام استان </label>
                            <input type="text" class="form-control" disabled name="state_name" id="state_name" autocomplete="off"
                                   required value="<?= $state->state_name; ?>">
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<script>
    $('.tooltip').hide();
    $(document).ajaxStart(function () {
        Pace.restart();
    });
    $.Ajax();
</script>

