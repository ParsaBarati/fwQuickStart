<?php
include '../../../autoload.php';
?>
<style>
    .fw-autocomplete {
        position: relative;
        display: inline-block;
    }

    .fw-autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;

        top: 100%;
        left: 0;
        right: 0;
    }

    .fw-autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }


    .fw-autocomplete-items div:hover {
        background-color: #e9e9e9;
    }


    .fw-autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>MODEL GENERATOR</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="../../index.php">خانه</a></li>
                    <li class="breadcrumb-item active">MODEL GENERATOR</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title">MODEL GENERATOR</h3>
                    <div class="card-tools">

                        <a rel="modelGenerator/modelGenerator.fwTools.php"
                           class="btn btn-outline-success pull-left ajax"><i
                                    class="fa fa-refresh"></i> تازه
                            سازی</a>
                    </div>
                </div>
                <form>
                    <?=hiddenInput('make')?>
                    <div class="card-body d-flex flex-wrap table-responsive">
                        <div class="form-group col-md-4">
                            <label for="name">نام مدل</label>
                            <input id="name" class="form-control" dir="ltr" type="text" name="name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tblName">نام جدول</label>
                            <input id="tblName" autocomplete="off" class="form-control" dir="ltr" type="text" name="tblName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tblKey">کلید</label>
                            <input id="tblKey" class="form-control" dir="ltr" type="text" name="tblKey">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">آدرس قراردهی فایل</label>
                            <div class="input-group">
                            <input id="address" class="form-control" dir="ltr" type="text" name="address">
                                <span class="input-group-addon mt-2 mr-2"><?=__SOURCE__.'models/'?></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success pull-left"><i class="fa fa-plus"></i>
                            !Generate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $("#tblName").fw_autocomplete('fwTools/controller/modelGenerator/modelGenerator.php');
    $.submit('fwTools/controller/modelGenerator/modelGenerator.php');
    $.Ajax();
</script>
