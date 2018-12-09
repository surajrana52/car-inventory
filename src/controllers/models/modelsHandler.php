<?php

require __DIR__ . '/../../classes/validator.php';
require __DIR__ . '/../../classes/models.class.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {

    $carMfg = $_POST['car_mfg'];
    $carModelName = $_POST['car_model_name'];
    $carColor = $_POST['car_color'];
    $carMfgYear = $_POST['car_mfg_year'];
    $count = $_POST['car_count'];
    $carRegNo = $_POST['car_reg_no'];
    $carNote = $_POST['car_note'];
    $carImageOne = $_FILES['car_image_one'];
    $carImageTwo = $_FILES['car_image_two'];


    if ($validator->alphaOnly($carModelName) && $validator->alphaOnly($carColor)) {

        if ($validator->digitOnly($carMfg)) {

            if ($validator->dateYearOnly($carMfgYear)) {

                if ($validator->imageValidation($carImageOne) && $validator->imageValidation($carImageTwo)) {


                    if ($model->addNewModel($carMfg, $carModelName, $count, $carColor, $carMfgYear, $carRegNo, $carNote, $carImageOne, $carImageTwo)) {


                        $returnData = [
                            'error' => false,
                            'message' => 'New Model Created Successfully'
                        ];

                        echo json_encode($returnData);

                    }else{

                        $returnData = [
                            'error' => true,
                            'message' => 'Something went wrong'
                        ];

                        echo json_encode($returnData);

                    }


                } else {

                    $returnData = [
                        'error' => true,
                        'message' => 'Invalid Images'
                    ];

                    echo json_encode($returnData);

                }

            } else {

                $returnData = [
                    'error' => true,
                    'message' => 'Invalid date'
                ];

                echo json_encode($returnData);

            }

        } else {

            $returnData = [
                'error' => true,
                'message' => 'Invalid value for model manufacturer'
            ];

            echo json_encode($returnData);

        }

    } else {

        $returnData = [
            'error' => true,
            'message' => 'Model Name & Model Color can only contain letters'
        ];

        echo json_encode($returnData);

    }


}