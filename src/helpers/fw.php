<?php
function fw_preLoader(){
    return '<div id="fw-preloader" class="fw-preloader">
    <div class="fw-preloader-body">
        <div class="fw-preloader-wrapper fw-big fw-active">
            <div class="fw-spinner-layer fw-spinner-blue">
                <div class="fw-circle-clipper fw-left">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-gap-patch">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-circle-clipper fw-right">
                    <div class="fw-circle"></div>
                </div>
            </div>
            <div class="fw-spinner-layer fw-spinner-red">
                <div class="fw-circle-clipper fw-left">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-gap-patch">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-circle-clipper fw-right">
                    <div class="fw-circle"> </div>
                </div>
            </div>
            <div class="fw-spinner-layer fw-spinner-yellow">
                <div class="fw-circle-clipper fw-left">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-gap-patch">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-circle-clipper fw-right">
                    <div class="fw-circle"></div>
                </div>
            </div>
            <div class="fw-spinner-layer fw-spinner-green">
                <div class="fw-circle-clipper fw-left">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-gap-patch">
                    <div class="fw-circle"></div>
                </div>
                <div class="fw-circle-clipper fw-right">
                    <div class="fw-circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>';
}
function loadStyles(){
    global $DARK_MODE;
    return !$DARK_MODE ? '<link rel="stylesheet" href="dist/css/fw_styles.css">' : '<link rel="stylesheet" href="dist/css/fw_styles_darkMode.css">';
}