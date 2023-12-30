<?php
    class ContractController {
        public function handleGetContract() {
            require_once('./Models/ContractModel.php');
            $model = new ContractModel();
            $result = $model->getContract();
            return $result;
        }
    }
?>