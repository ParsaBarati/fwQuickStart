<?php
include '../../../autoload.php';
if (sizeof($_REQUEST) > 0) {
    if (isset($_REQUEST['controller_type'])){
        switch ($_REQUEST['controller_type']){
            case 'fw_autocomplete':
                $res = $conn->query("select * from INFORMATION_SCHEMA.TABLES where `TABLE_TYPE` = 'BASE TABLE'");
                $output = array();
                while ($row = $res->fetchObject()){
                    $output[] = $row->TABLE_NAME;
                }
                echo json_encode($output);
                break;
            case "make":
                $myfile = fopen(__SOURCE__.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.(endsWith($_POST['address'],DIRECTORY_SEPARATOR) ? $_POST['address'] : $_POST['address'].DIRECTORY_SEPARATOR).$_POST['name'].'.php', "w");
                $string = "<?php\nnamespace model;\nuse DATABASE\Model;\n";
                $string .= "class ".$_POST["name"]." extends Model {\n";
                $tblName = $_POST['tblName'];
                $string .= "     const table = "."'$tblName';\n";
                $tbKey = $_POST['tblKey'];
                $string .= "     const key = "."'$tbKey';\n}";
                fwrite($myfile,$string);
                echo htmlspecialchars($string);
                echo showResult($myfile,'مدل','ساختن');
                fclose($myfile);
                break;
        }
    }
}