<?php
    require_once("connect2.php");
    if ((isset($_GET["o"])) || isset($_POST["action"])) {
        if (isset($_GET["o"])) {
            $operation = $_GET["o"];
            switch($operation) {
                case "test":
                    echo "Test";
                    break;
                default:
                    echo "400 - Bad Request";
                    break;
            }
        }
    
        if (isset($_POST["action"])) {
            $action = $_POST["action"];
            switch($action) {
                case "newIrrigation":
                    $ph = $_POST["ph"];
                    $ce = $_POST["ce"];
                    $volume1 = $_POST["v1"];
                    $volume2 = $_POST["v2"];
                    $type = $_POST["t"];
                    $form = $_POST["f"];
                    $irrigationId = $dbConnection->Insert(
                        "INSERT INTO irrigationsdrains(ph, ce, volume1, volume2, type, form) values(?, ?, ?, ?, ?, ?)",
                        [
                            "ssssii", $ph, $ce, $volume1, $volume2, $type, $form
                        ]
                    );
                    $irrigation = new stdClass();
                    $irrigation->Id = $irrigationId;
                    echo json_encode($irrigation);
                    break;
                case "getIrrigationData":
                    $start = isset($_POST["start"]) ? $_POST["start"] : 0;
                    $length = isset($_POST["length"]) ? $_POST["length"] : 10;
                    $recordsTotal = $dbConnection->Select("SELECT COUNT(*) AS 'recordsTotal' FROM irrigationsdrains")[0]["recordsTotal"];
                    $data = $dbConnection->Select("SELECT * FROM irrigationsdrains i ORDER BY i.id LIMIT ".$start.",".$length);
                    $response = new stdClass();
                    $response->draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
                    $response->recordsTotal = isset($_POST["length"]) ? $_POST["length"] : 1;
                    $response->recordsFiltered = intval($recordsTotal);
                    $response->data = $data;
                    echo json_encode($response);
                    break;
                default:
                    echo "400 - Bad Request";
                    break;
            }
        }
    } else {
        die("401 - Unauthorized");
    }
?>