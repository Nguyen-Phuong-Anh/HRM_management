<?php

class teachingController
{
    public function getTeaching()
    {
        require_once('./Models/TeachingModel.php');
        $teachingModel = new TeachingModel();
        $teachings = $teachingModel->getTeaching();

        require_once('./Views/teaching/teaching.php');
        $teachingView = new teaching();
        $teachingView->showAllTeaching($teachings);
    }
}
?>