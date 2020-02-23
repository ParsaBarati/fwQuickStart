<?php
require_once '../../../autoload.php';
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
                    <h3 class="card-title"> افزودن استان</h3>
                    <a rel="BaseTables/States/States.php" class="btn btn-outline-primary pull-left ajax"><i
                                class="fa fa-chevron-left"></i> بازگشت</a>
                    <a rel="BaseTables/States/addStates.php" class="btn btn-outline-primary pull-left ajax"><i
                                class="fa fa-refresh"></i> تازه
                        سازی</a>
                </div>

                <form id="idForm" method="post" action="">
                    <?= csrf_field('states') ?>
                    <?= hiddenInput() ?>
                    <div class="card-body d-flex flex-wrap table-responsive">

                        <div class="form-group col-md-6">
                            <label for="state_name">نام استان </label>
                            <input class="form-control" name="state_name" id="state_name"
                                   autocomplete="off" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary pull-left"><i class="fa fa-plus"></i>
                            افزودن استان
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<script>
    $.submit('controllers/BaseTables/States/States.php');
    $('.tooltip').hide();
    $(document).ajaxStart(function () {
        Pace.restart();
    });
    $.Ajax();
</script>


